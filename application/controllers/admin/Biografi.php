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
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('penulis', 'Penulis', 'required');
            $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
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

            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('penulis', 'Penulis', 'required');
            $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
            $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|exact_length[4]|numeric');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/biografi/index');
            }

            $data_buku = [
                'judul'        => $this->input->post('judul'),
                'penulis'      => $this->input->post('penulis'),
                'penerbit'     => $this->input->post('penerbit'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'deskripsi'    => $this->input->post('deskripsi')
            ];

            if (!empty($_FILES['cover']['name'])) {
                $config['upload_path']      = './uploads/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = 4080;
                $config['file_name']        = 'cover_' . time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('cover')) {
                    $upload_data = $this->upload->data();
                    $data_buku['cover'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/biografi/index');
                }
            }

            $this->Biografi_model->update_buku($id, $data_buku);

            $kategori_ids = $this->input->post('kategori');
            if (!empty($kategori_ids)) {
                $this->Biografi_model->delete_buku_kategori($id);

                foreach ($kategori_ids as $kategori_id) {
                    $data_relasi = [
                        'buku_id'     => $id,
                        'kategori_id' => $kategori_id
                    ];
                    $this->Biografi_model->insert_buku_kategori($data_relasi);
                }
            }

            $this->session->set_flashdata('success', 'Buku berhasil diperbarui!');
            redirect('admin/biografi/index');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            $this->session->set_flashdata('error', $error_message);
            return redirect('admin/biografi/index');    
        }
    }

    public function delete_buku($id)
    {
        $where = ['id'  => $id];
        $this->Biografi_model->hapus_data($where, 'buku');
        $this->session->set_flashdata('success', 'Data buku berhail dihapus!');
        return redirect('admin/biografi/index');
    }

    public function show_buku($id){
        $data['buku']           = $this->Biografi_model->get_buku_by_id($id);
        $data['kategori_list']  = $this->Kategori_model->get();
        $this->load->view('admin/show_buku', $data);
    }
}
