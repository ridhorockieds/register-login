<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
            'title' => 'Masuk',
        ];

        $this->load->view('login/login_view', $data);
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '%s harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => '%s harus diisi!'
        ]);

        if ($this->form_validation->run() == TRUE) {
            $email = htmlspecialchars($this->input->post('email', true));
            $password = $this->input->post('password');

            $user = $this->auth->get_user($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'namalengkap' => $user['namalengkap'],
                        'logged_in' => TRUE
                    ];

                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('error', 'Email tidak terdaftar!');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('login');
        }
    }
}
