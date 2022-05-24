<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Level_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->_loginuser();
        }
    }

    private function _loginuser()
    {
        $email = $this->input->post('email');
        $password  = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row();
        $level = $this->db->get_where('level', ['level_id' => $user->level_id])->row();
        if ($user) {
            if (password_verify($password, $user->password)) {
                $data = [
                    'id_user' => $user->user_id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'level_id' => $level->name
                ];
                $this->session->set_userdata($data);
                redirect('Overview');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!!</div>');
                redirect('User');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal!!</div>');
            redirect('User');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email Sudah Terdaftar!']);
        $this->form_validation->set_rules('level', 'Level', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $data['level'] = $this->Level_model->level_getAll();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer', $data);
        } else {
            $data = [
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'level_id' => htmlspecialchars($this->input->post('level', true)),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Telah Berhasil!!. Silahkan Login!</div>');
            redirect('User');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->mark_as_flash('message', '<div class="alert alert-success" role="alert">Registrasi Telah Berhasil!!. Silahkan Login!</div>');
        redirect('User');
    }
}
