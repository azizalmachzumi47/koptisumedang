<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_kacang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kacang.id_kategori', 'left');
        $this->db->order_by('tbl_kacang.id_kacang', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function detail_kacang($id_kacang)
    {
        $this->db->select('*');
        $this->db->from('tbl_kacang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kacang.id_kategori', 'left');
        $this->db->where('id_kacang', $id_kacang);
        return $this->db->get()->row();
    }

    public function gambar_kacang($id_kacang)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_kacang', $id_kacang);
        return $this->db->get()->result();
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function get_all_data_kacang($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_kacang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kacang.id_kategori', 'left');
        $this->db->where('tbl_kacang.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }
}