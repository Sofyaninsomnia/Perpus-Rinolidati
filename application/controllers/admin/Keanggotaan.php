<?php
class Keanggotaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error_message', 'Anda tidak diizinkan untuk mengakses halaman ini.');
            redirect('auth/login');
        }
        $this->load->model('UserModel');
    }

    public function index()
    {
        // var_dump($this->session->flashdata('error'));
        $data['users']  = $this->UserModel->getAll();
        $this->load->view('admin/anggota', $data);
    }

    public function form_add()
    {
        $this->load->view('admin/formAdd_anggota');
    }

    public function create_anggota()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[150]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[10]|max_length[155]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[100]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[anggota,admin]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/keanggotaan/index');
        }

        $password = $this->input->post('password');
        $md5 = md5($password);

        $data = [
            'username'      => $this->input->post('username'),
            'email'         => $this->input->post('email'),
            'password'      => $md5,
            'role'          => $this->input->post('role'),
            'alamat'        => $this->input->post('alamat'),
            'kontak'        => $this->input->post('kontak')
        ];

        $this->UserModel->input_data($data, 'user');
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/keanggotaan/index');
    }

    public function form_edit($id)
    {
        $where = ['id'  => $id];
        $data['users'] = $this->UserModel->edit_data($where, 'user')->result();
        $this->load->view('admin/formEdit_anggota', $data);
    }

    public function update_user($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[150]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[10]|max_length[155]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[anggota,admin]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/keanggotaan/index');
        }

        $data = [
            'username'      => $this->input->post('username'),
            'email'         => $this->input->post('email'),
            'role'          => $this->input->post('role'),
            'alamat'        => $this->input->post('alamat'),
            'kontak'        => $this->input->post('kontak')
        ];

        $where = ['id'  => $id];

        $this->UserModel->update_data($where, $data, 'user');
        $this->session->set_flashdata('success', 'Data berhasil diperbarui');

        redirect('admin/keanggotaan/index');
    }

    public function hapus($id){
        $where = ['id'  => $id];

        $this->UserModel->delete_data($where, 'user');
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/keanggotaan/index');
    }
}
