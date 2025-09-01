<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library(['form_validation', 'session']);
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $this->_proses_login();
        }
    }

    private function _proses_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->UserModel->get_user_by_username($username);

        if ($user) {
            if (md5($password) === $user->password) {
                $data_session = [
                    'id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'is_logged_in' => TRUE
                ];
                $this->session->set_userdata($data_session);

                if ($user->role == 'admin') {
                    $this->session->set_flashdata('login_berhasil', 'Selamat datang ' . $username);
                    redirect('admin/dashboard/index');
                } else {
                    redirect('anggota/dashboard');
                }
            } else {
                $this->session->set_flashdata('error_message', 'Username atau password salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error_message', 'Username atau password salah.');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout', 'Logout berhasil, terimakasih sudah berkunjung!');
        redirect('auth');
    }
}