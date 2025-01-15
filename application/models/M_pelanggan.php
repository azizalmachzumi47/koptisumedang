<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Pelanggan extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
    }
}

/* End of file ModelName.php */