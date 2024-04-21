<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('template2/sidebar', $data);
        $this->load->view('template2/topbar', $data);
        $this->load->view('admin/index', $data);
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('template2/header', $data);
        $this->load->view('template2/sidebar', $data);
        $this->load->view('template2/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template2/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['role'] = $this->db->get_where(
            'user_role',
            [
                'id' => $role_id
            ]
        )->row_array();

        $this->db->where('id != ', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template2/header', $data);
        $this->load->view('template2/sidebar', $data);
        $this->load->view('template2/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('template2/footer');
    }
}
