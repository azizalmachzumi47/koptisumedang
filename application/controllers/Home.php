<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
    }


    public function index()
    {
        $data = array(
            'title' => 'Home',
            'kacang' => $this->m_home->get_all_data(),
            'isi' => 'v_home',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'title' => 'Kategori Kacang : ' . $kategori->nama_kategori,
            'kacang' => $this->m_home->get_all_data_kacang($id_kategori),
            'isi' => 'v_kategori_kedelai',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function detail_kacang($id_kacang)
    {
        $data = array(
            'title' => 'Detail Kedelai',
            'gambar' => $this->m_home->gambar_kacang($id_kacang),
            'kacang' => $this->m_home->detail_kacang($id_kacang),
            'isi' => 'v_detail_kacang',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}