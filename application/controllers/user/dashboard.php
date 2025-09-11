<?php
class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') !== 'anggota') {
            $this->session->set_flashdata('error_message', 'Anda tidak diizinkan untuk mengakses halaman ini.');
            redirect('auth/login');
        }
    }

    public function index(){
        $this->load->view('user/dashboard');
    }
}