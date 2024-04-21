<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_barang');
    }


    public function index()
    {


        $data["barang"] = $this->Model_barang->tampil_data();
        // $this->load->view("templates/header");
        // $this->load->view("templates/sidebar");
        $this->load->view("dasboard");
        // $this->load->view("templates/footer");

    }
}
