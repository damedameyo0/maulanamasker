<?php

class Overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $this->load->view('admin/_partials/head');
		// $this->load->view('admin/_partials/navbar');
		// $this->load->view('admin/_partials/sidebar');
		// $this->load->view('admin/_partials/footer');
		// $this->load->view('admin/_partials/modal');
		// $this->load->view('admin/_partials/js');
		$this->load->view('admin/Overview');
	}

	public function about()
	{
		$this->load->view('about.php');
	}

	public function contact()
	{
		$this->load->view('contact.php');
	}

	public function container()
	{
		$this->load->view('container.php');
	}
}
