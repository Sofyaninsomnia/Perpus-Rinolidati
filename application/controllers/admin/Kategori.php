<?php
class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error_message', 'Anda tidak diizinkan untuk mengakses halaman ini.');
            redirect('auth/login');
        }
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['kategori'] = $this->Kategori_model->get();
        $this->load->view('admin/kategori', $data);
    }

    public function form_add()
    {
        $this->load->view('admin/formAdd_kategori');
    }

    public function create_kategori()
    {
        $nama_kategori = $this->input->post('nama_kategori');

        $data = [
            'nama_kategori' => $nama_kategori
        ];

        $this->Kategori_model->input_data($data, 'kategori');
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        return redirect('admin/kategori/index');
    }

    public function form_edit($id)
    {
        $where = ['id' => $id];
        $data['kategori'] = $this->Kategori_model->edit_data($where, 'kategori')->result();
        $this->load->view('admin/formEdit_kategori', $data);
    }

    public function update_kategori($id)
    {
        try {
            $nama_kategori = $this->input->post('nama_kategori');

            $data = [
                'nama_kategori' => $nama_kategori
            ];

            $where = ['id' => $id];

            $this->Kategori_model->update_data($where, $data, 'kategori');
            $this->session->set_flashdata('success', 'Data berhasil di update!');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            $this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $error_message);
        }
        return redirect('admin/kategori/index');
    }

    public function hapus($id){
        $where = ['id'  => $id];
        $this->Kategori_model->hapus_data($where, 'kategori');
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        return redirect('admin/kategori/index');
    }
}
