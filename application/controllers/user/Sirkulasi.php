<?php
class Sirkulasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role'  !== 'anggota')){
            $this->session->set_flashdata('error', 'Anda tidak di izinkan untuk mengakses halaman ini');
        }
        $this->load->model('Kategori_model');
        $this->load->model('Biografi_model');
        $this->load->model('Sirkulasi_model');
    }

    public function index(){
        $data['list_kategori'] = $this->Kategori_model->get();
        $data['buku']   = $this->Biografi_model->get_all_buku_with_kategori();
        $this->load->view('user/sirkulasi', $data);
    }

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['buku'] = $this->Sirkulasi_model->get_keyword($keyword);
        $this->load->view('user/sirkulasi', $data);
    }

    public function show_buku($id){
        $data['buku']   = $this->Biografi_model->get_buku_by_id($id);
        $data['kategori_list'] = $this->Kategori_model->get();

        $this->load->view('user/show_buku', $data);
    }

    public function pinjam_buku($id){
        $data['buku']           = $this->Biografi_model->get_buku_by_id($id);
        $data['kategori_list']  = $this->Kategori_model->get();
        $this->load->view('user/pinjam_buku', $data);
    }

    public function simpan_pinjaman(){
        $tanggal_pinjam = $this->input->post('tgl_pinjam');
        $tanggal_kembali = $this->input->post('tgl_kembali');
        $id_buku = $this->input->post('buku_id');
        $denda = $this->input->post('denda');

        $data = [
            'user_id'       => $this->session->userdata('id'),
            'buku_id'       => $id_buku,
            'tgl_pinjam'    => $tanggal_pinjam,
            'tgl_kembali'   => $tanggal_kembali,
            'denda'         => $denda
        ];

        $this->Sirkulasi_model->peminjaman($data);
        $this->session->set_flashdata('success', 'Peminjaman buku berhasil mohon kembalikan pada tanggal: ' . $tanggal_kembali);
        redirect('user/sirkulasi/index');
    }

    public function draft_pinjaman(){
        $user_id = $this->session->userdata('id');
        $data['peminjaman'] = $this->Sirkulasi_model->get_pinjaman_by_id($user_id);
        $data['list_peminjaman'] = $this->Sirkulasi_model->get_pinjaman_by_user($user_id);
        $this->load->view('user/draft_pinjaman', $data);
    }

    public function kembalikan_buku($sirkulasi_id){
        $data_pinjaman = $this->Sirkulasi_model->get_sirkulasi_by_id($sirkulasi_id);
        
        if($data_pinjaman){
            $tanggal_kembali = $data_pinjaman->tgl_kembali;
            $tanggal_dikembalikan = $this->input->post('tanggal_pengembalian');

            $denda = $this->Sirkulasi_model->hitung_denda($tanggal_kembali, $tanggal_dikembalikan);

            $data = [
                'denda'         => $denda,
                'status'        => 'dikembalikan',
                'tgl_kembali'   => $tanggal_dikembalikan
            ];
            $this->Sirkulasi_model->update_sirkulasi($sirkulasi_id, $data, 'sirkulasi');

            $this->session->set_flashdata('success', 'Buku berhasil dikembalikan. Denda anda: ' . number_format($denda, 0, ',', '.'));
            redirect('user/sirkulasi/draft_pinjaman');
        }
        
    }

    
}