<?php
class Kategori extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error_message', 'Anda tidak diizinkan untuk mengakses halaman ini.');
            redirect('auth/login');
        }
        $this->load->model('Kategori_model');
    }

    public function index(){
        $data['kategori'] = $this->Kategori_model->get()->result();
        $this->load->view('admin/kategori', $data);
    }
}