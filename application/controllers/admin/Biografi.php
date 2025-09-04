<?php
class Biografi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error_message', 'Anda tidak diizinkan untuk mengakses halaman ini.');
            redirect('auth/login');
        }
        $this->load->model('Biografi_model');
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['buku']   = $this->Biografi_model->get_all_buku_with_kategori();
        $this->load->view('admin/biografi', $data);
    }

    public function form_buku()
    {
        $data['kategori_list']  = $this->Kategori_model->get();
        $this->load->view('admin/formAdd_buku', $data);
    }

    public function create_buku()
    {
        try {
            $this->form_validation->set_rules('judul', 'Judul', 'required|min_length[6]|max_length[150]');
            $this->form_validation->set_rules('penulis', 'Penulis', 'required|min_length[4]|max_length[100]');
            $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|min_length[4]|max_length[100]');
            $this->form_validation->set_rules('tahun_terbit', 'Tahun terbit', 'required|date');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', 'Gagal menambahkan buku');
                redirect('admin/biografi/index');
            }
            $config['upload_path']      = './uploads/';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = 4080;
            $config['file_name']        = 'cover_' . time();

            $this->load->library('upload', $config);

            $data_buku = [
                'judul'            => $this->input->post('judul'),
                'penulis'          => $this->input->post('penulis'),
                'penerbit'         => $this->input->post('penerbit'),
                'tahun_terbit'     => $this->input->post('tahun_terbit'),
                'deskripsi'        => $this->input->post('deskripsi')
            ];

            if ($this->upload->do_upload('cover')) {
                $upload_data = $this->upload->data();
                $data_buku['cover'] = $upload_data['file_name'];

                $kategori_ids = $this->input->post('kategori');
                $buku_id = $this->Biografi_model->insert_buku($data_buku);

                if (!empty($kategori_ids)) {
                    foreach ($kategori_ids as $kategori_id) {
                        $data_relasi = array(
                            'buku_id' => $buku_id,
                            'kategori_id' => $kategori_id
                        );
                        $this->Biografi_model->insert_buku_kategori($data_relasi);
                    }
                }

                $this->session->set_flashdata('success', 'Buku berhasil ditambahkan!');
                redirect('admin/biografi/index');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('admin/biografi/form_buku');
            }
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            $this->session->set_flashdata('error', $error_message);
            return redirect('admin/biografi/index');
        }
    }

    public function form_edit($id)
    {
        $data['buku']           = $this->Biografi_model->get_buku_by_id($id);
        $data['kategori_list']  = $this->Kategori_model->get();
        $this->load->view('admin/formEdit_buku', $data);
    }

    public function update_buku($id)
    {
        try {
            $this->form_validation->set_rules('judul', 'Judul', 'required|min_length[6]|max_length[150]');
            $this->form_validation->set_rules('penulis', 'Penulis', 'required|min_length[4]|max_length[100]');
            $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|min_length[4]|max_length[100]');
            $this->form_validation->set_rules('tahun_terbit', 'Tahun terbit', 'required|date|exact_length[4]');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->flashdata('error', 'Update buku gagal');
                redirect('admin/biografi/index');
            }

            $config['upload_path']      = './uploads/';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = 4080;
            $config['file_name']        = 'cover_' . time();

            $this->load->library('upload', $config);

            $data_buku = [
                'judul'            => $this->input->post('judul'),
                'penulis'          => $this->input->post('penulis'),
                'penerbit'         => $this->input->post('penerbit'),
                'tahun_terbit'     => $this->input->post('tahun_terbit'),
                'deskripsi'        => $this->input->post('deskripsi')
            ];

            if (!empty($_FILES['cover']['name'])) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('cover')) {
                    $this->session->set_flashdata('error', 'Gagal update buku');
                    redirect('admin/biografi/index');
                    return;
                } else {
                    $upload_data = $this->upload->data();
                    $data_buku['cover'] = $upload_data['file_name'];

                    $old = $this->Biografi_model->get_buku_by_id($id);
                    if (!empty($old) && !empty($old->cover)) {
                        $old_path = FCPATH . 'uploads/' . $old->cover;
                        if (file_exists($old_path)) {
                            @unlink($old_path);
                        }
                    }
                }
            }

            $this->db->trans_begin();

            $updated = $this->Biografi_model->update_buku($id, $data_buku);
            if ($updated === false) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('error', 'Gagal memperbarui data buku.');
                redirect('admin/biografi/index', 'Gagal memperbarui buku');
                return;
            }

            $kategori_ids = $this->input->post('kategori');
            $this->Biografi_model->delete_buku_kategori($id);
            if (!empty($kategori_ids) && is_array($kategori_ids)) {
                foreach ($kategori_ids as $kategori_id) {
                    $rel = [
                        'buku_id'     => $id,
                        'kategori_id' => $kategori_id
                    ];
                    $this->Biografi_model->insert_buku_kategori($rel);
                }
            }
            $this->session->set_flashdata('success', 'Buku berhasil di update!');
            redirect('admin/biografi/index');
        } catch (\Exception $e) {
            if ($this->db->trans_status() !== null) {
                $this->db->trans_rollback();
            }
            log_message('error', 'Update buku error: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            redirect('admin/biografi/index');
        }
    }

    public function delete_buku($id)
    {
        $where = ['id'  => $id];
        $this->Biografi_model->hapus_data($where, 'buku');
        $this->session->set_flashdata('success', 'Data buku berhail dihapus!');
        return redirect('admin/biografi/index');
    }
}
