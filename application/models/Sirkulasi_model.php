<?php
class Sirkulasi_model extends CI_Model
{
    public function get()
    {
        $this->db->select('sirkulasi.*, user.username as username, buku.judul as judul');
        $this->db->from('sirkulasi');
        $this->db->join('user', 'user.id = sirkulasi.user_id');
        $this->db->join('buku', 'buku.id = sirkulasi.buku_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->like('judul', $keyword);
        $this->db->or_like('penulis', $keyword);
        $this->db->or_like('penerbit', $keyword);
        $this->db->or_like('tahun_terbit', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get()->result();
    }

    public function update_sirkulasi($sirkulasi_id, $data, $table)
    {
        $this->db->where('id', $sirkulasi_id);
        $this->db->update($table, $data);
    }

    public function peminjaman($data)
    {
        $this->db->insert('sirkulasi', $data);
    }

    public function cek_pinjaman($buku_id, $user_id)
    {
        $this->db->where('buku_id', $buku_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 'dipinjam');

        $query = $this->db->get('sirkulasi');
        return $query->num_rows() > 0;
    }

    public function get_sirkulasi_by_id($sirkulasi_id)
    {
        $this->db->where('id', $sirkulasi_id);
        $query = $this->db->get('sirkulasi');
        return $query->row();
    }

    public function get_pinjaman_by_id($user_id)
    {
        $this->db->select('sirkulasi.*, buku.cover as cover_buku');
        $this->db->from('sirkulasi');
        $this->db->join('buku', 'buku.id = sirkulasi.buku_id');
        $this->db->where('sirkulasi.user_id', $user_id);
        $this->db->where('sirkulasi.status', 'dipinjam');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_pinjaman_by_user($user_id)
    {
        $this->db->select('sirkulasi.*, buku.judul as judul_buku');
        $this->db->from('sirkulasi');
        $this->db->join('buku', 'buku.id = sirkulasi.buku_id');
        $this->db->where('sirkulasi.user_id', $user_id);
        $this->db->where('sirkulasi.status', 'dikembalikan');
        $query = $this->db->get();
        return $query->result();
    }

    public function hitung_denda($tanggal_kembali, $tanggal_dikembalikan)
    {
        $tarif_denda_per_hari = 1000;
        $timestamp_kembali = strtotime($tanggal_kembali);
        $timestamp_dikembalikan = strtotime($tanggal_dikembalikan);
        $selisih_detik = $timestamp_dikembalikan - $timestamp_kembali;
        $selisih_hari = round($selisih_detik / (60 * 60 * 24));
        if ($selisih_hari > 0) {
            $total_denda = $selisih_hari * $tarif_denda_per_hari;
        } else {
            $total_denda = 0;
        }

        return $total_denda;
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
