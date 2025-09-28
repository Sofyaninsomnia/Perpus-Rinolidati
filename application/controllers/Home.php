<?php
class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Biografi_model');
        $this->load->model('Sirkulasi_model');
    }
    public function index(){
        $data['list_kategori'] = $this->Kategori_model->get();
        $data['buku']   = $this->Biografi_model->get_all_buku_with_kategori();
        $this->load->view('home/index', $data);
    }

    public function show_buku($id){
        $data['buku']   = $this->Biografi_model->get_buku_by_id($id);
        $data['kategori_list'] = $this->Kategori_model->get();
        $this->load->view('home/show_buku', $data);
    }
    
    public function search(){
        $keyword = $this->input->post('keyword');
        $data['buku'] = $this->Sirkulasi_model->get_keyword($keyword);
        $data['list_kategori'] = $this->Kategori_model->get();
        $this->load->view('home/index', $data);
    }
}