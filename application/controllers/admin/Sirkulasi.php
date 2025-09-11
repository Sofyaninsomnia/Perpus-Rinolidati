<?php
class Sirkulasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role' !== 'admin')){
            $this->session->set_flashdata('error', 'Anda tidak di diizinkan untuk mengakses halaman ini');
            redirect('auth/login');
        }

        $this->load->model('Sirkulasi_model');
    }

    public function index(){
        $data['sirkulasi'] = $this->Sirkulasi_model->get();
        $this->load->view('admin/sirkulasi', $data);
    }

    public function delete($id){
        $where = ['id' => $id];
        $this->Sirkulasi_model->delete_data($where, 'sirkulasi');
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        return redirect('admin/sirkulasi/index');
    }

    public function print(){
        $data['sirkulasi']  = $this->Sirkulasi_model->get();
        $this->load->view('admin/print', $data);
    }
}