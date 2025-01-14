<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }

    public function register()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama Pelanggan',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[tbl_pelanggan.email]',
            array(
                'required' => '%s Harap Diisi !!!',
                'is_unique' => '%s Email ini Sudah Terdaftar...!'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Harap Diisi !!!')
        );
        $this->form_validation->set_rules(
            'ulangi_password',
            'Ulangi Password',
            'required|matches[password]',
            array(
                'required' => '%s Harap Diisi !!!',
                'matches' => '%s Password Tidak Sama...!'
            )
        );




        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/foto/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "foto";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Register Pelanggan',
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_register',
                );
                $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'foto' => $upload_data['uploads']['file_name'],
                );
                $this->m_pelanggan->register($data);
                $this->session->set_flashdata('pesan', 'Selamat, Register Berhasil Silahkan Login Kembali !!');
                redirect('pelanggan/register');
            }
        }

        $data = array(
            'title' => 'Register Pelanggan',
            'isi' => 'v_register',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'v_login_pelanggan',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun Saya',
            'isi' => 'v_akun_saya',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
