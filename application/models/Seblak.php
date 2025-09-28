<?php
class Seblak extends CI_Model
{
    public function get()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }
}
