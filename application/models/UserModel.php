<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->row();
    }
}