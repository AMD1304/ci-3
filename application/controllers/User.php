<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('template2/sidebar', $data);
        $this->load->view('template2/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template2/footer');
    }

    public function changePasswoard()
    {
        $data['title'] = 'Change Passwoard';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('current_passwoard', 'Current Passwoard', 'required|trim');
        $this->form_validation->set_rules('new_passwoard1', 'New Passwoard', 'required|trim|min_length[3]|matches[new_passwoard2]');
        $this->form_validation->set_rules('new_passwoard2', 'New Passwoard2', 'required|trim|min_length[3]|matches[new_passwoard1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template2/header', $data);
            $this->load->view('template2/sidebar', $data);
            $this->load->view('template2/topbar', $data);
            $this->load->view('user/changepasswoard', $data);
            $this->load->view('template2/footer');
        } else {
            $current_passwoard = $this->input->post('current_passwoard');
            $new_passwoard = $this->input->post('new_passwoard1');


            if (!password_verify($current_passwoard, $data['user']['passwoard'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username/Passwoard Salah
              </div>');
                redirect('user/changepasswoard');
            } else {
                if ($current_passwoard == $new_passwoard) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Username/Passwoard tidak boleh sama
                  </div>');
                    redirect('user/changepasswoard');
                } else {
                    $passwoard_hash = password_hash($new_passwoard, PASSWORD_DEFAULT);

                    $this->db->set('passwoard', $passwoard_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Passwoard berhasil di ubah
                  </div>');
                    redirect('user/changepasswoard');
                }
            }
        }
    }
}
