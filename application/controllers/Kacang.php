<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kacang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kacang');
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Kacang',
            'kacang' => $this->m_kacang->get_all_data(),
            'isi' => 'kacang/v_kacang',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules(
            'nama_kacang',
            'Nama Kacang',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'berat_satuan',
            'Berat Satuan',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Kacang',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'kacang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_kacang' => $this->input->post('nama_kacang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'berat_satuan' => $this->input->post('berat_satuan'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_kacang->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('kacang');
            }
        }


        $data = array(
            'title' => 'Add Kacang',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'kacang/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function edit($id_kacang = NULL)
    {
        $this->form_validation->set_rules(
            'nama_kacang',
            'Nama Kacang',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'berat_satuan',
            'Berat',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Kacang',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'kacang' => $this->m_kacang->get_data($id_kacang),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'kacang/v_edit',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $kacang = $this->m_kacang->get_data($id_kacang);
                if ($kacang->gambar != "") {
                    unlink('./assets/gambar/' . $kacang->gambar);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_kacang' => $id_kacang,
                    'nama_kacang' => $this->input->post('nama_kacang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat_satuan'),
                    'berat_satuan' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_kacang->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
                redirect('kacang');
            }
            $data = array(
                'id_kacang' => $id_kacang,
                'nama_kacang' => $this->input->post('nama_kacang'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'berat' => $this->input->post('berat'),
                'berat_satuan' => $this->input->post('berat_satuan'),
                'deskripsi' => $this->input->post('deskripsi'),

            );
            $this->m_kacang->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
            redirect('kacang');
        }


        $data = array(
            'title' => 'Edit Kacang',
            'kategori' => $this->m_kategori->get_all_data(),
            'kacang' => $this->m_kacang->get_data($id_kacang),
            'isi' => 'kacang/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete($id_kacang = NULL)
    {
        $kacang = $this->m_kacang->get_data($id_kacang);
        if ($kacang->gambar != "") {
            unlink('./assets/gambar/' . $kacang->gambar);
        }

        $data = array('id_kacang' => $id_kacang);
        $this->m_kacang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
        redirect('kacang');
    }
}

/* End of file Controllername.php */