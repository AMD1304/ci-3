<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->library('form_validation');
    // }

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('passwoard', 'Passwoard', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view("template/auth_header");
            $this->load->view("auth/login");
            $this->load->view("template/auth_footer");
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $passwoard = $this->input->post('passwoard');

        $user = $this->db->get_where(
            'user',
            ['email' => $email]
        )->row_array();

        if ($user) {
            // jika user aktif

            if ($user['is_active'] == 1) {
                // cek passwoard
                if (password_verify($passwoard, $user['passwoard'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    salah
                  </div>');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            belum aktifasi
          </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            tidak terdaftar
          </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email sudah ada'
        ]);
        $this->form_validation->set_rules('passwoard1', 'Passwoard', 'required|trim|min_length[3]|matches[passwoard2]', [
            'matches' => 'passwoard tidak sama',
            'min_length' => 'passwoard terlalu pendek'

        ]);
        $this->form_validation->set_rules('passwoard2', 'Passwoard', 'required|trim|matches[passwoard1]');

        if ($this->form_validation->run() == false) {
            $this->load->view("template/auth_header");
            $this->load->view("auth/registration");
            $this->load->view("template/auth_footer");
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'email' => htmlspecialchars($this->input->post('email')),
                'image' => 'default.jpg',
                'passwoard' => password_hash($this->input->post('passwoard1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_create' => time()
            ];


            // $this->db->insert('user', $data);

            $this->_sendEmail();


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            berhasil
          </div>');
            redirect('auth');
        }
    }

    private function _sendEmail()
    {
        $config =
            [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'supriyantoahmad420@gmail.com',
                'smtp_pass' => 'xfkx grcm oolf ddmi ',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n",
            ];



        $this->email->initialize($config);
        $this->load->library('email', $config);

        $this->email->from('supriyantoahmad420@gmail.com', 'web');
        $this->email->to('ahmadsupriyanto860@gmail.com');
        $this->email->subject('testing');
        $this->email->message('Selamat Belajar');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            berhasil logout
          </div>');
        redirect('auth');
    }

    public function block()
    {
        $this->load->view('auth/block');
    }
}
