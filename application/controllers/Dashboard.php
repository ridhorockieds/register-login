<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE) {
			$this->session->set_flashdata('error', 'Anda belum login!');
			redirect('login');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
		];
		$this->load->view('dashboard/dashboard_view', $data);
	}
}
