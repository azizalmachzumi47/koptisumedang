<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambarkacang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambarkacang');
        $this->load->model('m_kacang');
    }


    public function index()
    {
        $data = array(
            'title' => 'Gambar Produk',
            'gambarkacang' => $this->m_gambarkacang->get_all_data(),
            'isi' => 'gambarkacang/v_index',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function add($id_kacang)
    {

        $this->form_validation->set_rules(
            'ket',
            'Ket Gambar',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambarproduk/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Gambar Produk',
                    'error_upload' => $this->upload->display_errors(),
                    'kacang' => $this->m_kacang->get_data($id_kacang),
                    'gambar' => $this->m_gambarkacang->get_gambar($id_kacang),
                    'isi' => 'gambarkacang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambarproduk/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_kacang' => $id_kacang,
                    'ket' => $this->input->post('ket'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_gambarkacang->add($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan !!!');
                redirect('gambarkacang/add/' . $id_kacang);
            }
        }


        $data = array(
            'title' => 'Add Gambar Produk',
            'kacang' => $this->m_kacang->get_data($id_kacang),
            'gambar' => $this->m_gambarkacang->get_gambar($id_kacang),
            'isi' => 'gambarkacang/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete($id_kacang, $id_gambar)
    {
        $gambar = $this->m_gambarkacang->get_data($id_gambar);
        if ($gambar->gambar != "") {
            unlink('./assets/gambarproduk/' . $gambar->gambar);
        }

        $data = array('id_gambar' => $id_gambar);
        $this->m_gambarkacang->delete($data);
        $this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus !!!');
        redirect('gambarkacang/add/' . $id_kacang);
    }
}