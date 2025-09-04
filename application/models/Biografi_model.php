<?php
class Biografi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_buku($data_buku)
    {
        $this->db->insert('buku', $data_buku);
        return $this->db->insert_id();
    }

    public function insert_buku_kategori($data_relasi)
    {
        $this->db->insert('buku_kategori', $data_relasi);
    }

    public function get_all_buku_with_kategori()
    {
        $this->db->select('b.*, GROUP_CONCAT(k.nama_kategori SEPARATOR ", ") AS kategori_nama');
        $this->db->from('buku b');
        $this->db->join('buku_kategori bk', 'bk.buku_id = b.id', 'left');
        $this->db->join('kategori k', 'k.id = bk.kategori_id', 'left');
        $this->db->group_by('b.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_buku_by_id($id)
    {
        $this->db->select('b.*, IFNULL(GROUP_CONCAT(k.id), "") AS kategori_id');
        $this->db->from('buku b');
        $this->db->join('buku_kategori bk', 'bk.buku_id = b.id', 'left');
        $this->db->join('kategori k', 'k.id = bk.kategori_id', 'left');
        $this->db->where('b.id', $id);
        $this->db->group_by('b.id');
        $query = $this->db->get();
        return $query->row();
    }

    public function update_buku($id, $data_buku)
    {
        $this->db->where('id', $id);
        $this->db->update('buku', $data_buku);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
