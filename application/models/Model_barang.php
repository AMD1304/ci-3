<?php

class Model_barang extends CI_model
{

    public function tampil_data()
    {
        return $this->db->get('tb_barang')->result_array();
    }
}
