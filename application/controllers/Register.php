<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'auth');

        if ($this->session->userdata('logged_in') == TRUE) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Pendaftaran',
        ];

        $this->load->view('register/register_view', $data);
    }

    public function proses_register()
    {
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required|trim', [
            'required' => '%s harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_users.email]', [
            'required' => '%s harus diisi!',
            'is_unique' => '%s sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => '%s harus diisi!',
            'matches' => '%s tidak sama!',
            'min_length' => '%s terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim', [
            'required' => '%s harus diisi!',
        ]);

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'namalengkap' => htmlspecialchars($this->input->post('namalengkap', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->auth->register($data);
            $this->session->set_flashdata('success', 'Selamat! Akun anda berhasil dibuat. Silahkan login.');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('register');
        }
    }
}
