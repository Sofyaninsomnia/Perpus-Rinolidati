<?php
class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error_message', 'Anda tidak diizinkan untuk mengakses halaman ini.');
            redirect('auth/login');
        }
    }

    public function index(){
        $total_buku = $this->db->count_all('buku');
        $total_anggota = $this->db->count_all('user');
        $total_kategori = $this->db->count_all('kategori');
        $total_pinjam = $this->db->count_all('sirkulasi');

        $data = [
            'buku'        => $total_buku,
            'anggota'     => $total_anggota,
            'kategori'    => $total_kategori,
            'pinjam'      => $total_pinjam
        ];
        $this->load->view('admin/dashboard', $data);
    }
}