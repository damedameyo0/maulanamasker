<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = "Login Employee";
		$this->load->view('templates/auth_header', $data);
		$this->load->view('admin/overview	');
		$this->load->view('templates/auth_footer', $data);
	}

	public function about()
	{
		$this->load->view('about.php');
	}

	public function contact()
	{
		$this->load->view('contact.php');
	}

	public function biodatadiri()
	{
		$this->load->view('biodatadiri.php');
	}

	public function deskripsidiri()
	{
		$this->load->view('deskripsidiri.php');
	}

	public function container()
	{
		$this->load->view('container.php');
	}

	public function pengalamanorganisasi()
	{
		$this->load->view('pengalamanorganisasi.php');
	}
}
