<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kacang extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_kacang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kacang.id_kategori', 'left');
        $this->db->order_by('tbl_kacang.id_kacang', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_kacang)
    {
        $this->db->select('*');
        $this->db->from('tbl_kacang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kacang.id_kategori', 'left');
        $this->db->where('id_kacang', $id_kacang);

        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_kacang', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_kacang', $data['id_kacang']);
        $this->db->update('tbl_kacang', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_kacang', $data['id_kacang']);
        $this->db->delete('tbl_kacang', $data);
    }
}