<?php defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Pelanggan_model');
	}

	public function index()
	{
		$data['pelanggan'] = $this->Pelanggan_model->pelanggan_getAll();
		$this->load->view('admin/pelanggan/v_pelanggan', $data);
	}

	public function add()
	{
		$name = strip_tags($this->input->post('i_name'));
		$email = strip_tags($this->input->post('i_email'));
		$gender = strip_tags($this->input->post('i_gender'));
		$phone = strip_tags($this->input->post('i_phone'));
		$address = strip_tags($this->input->post('i_address'));

		//Input array
		$data = array(
			'name' => $name,
			'email' => $email,
			'gender' => $gender,
			'phone' => $phone,
			'address' => $address


		);
		//Insert ke database
		$x = $this->Pelanggan_model->pelanggan_cek($name);
		if ($x == null) {
			$this->Pelanggan_model->pelanggan_insert('pelanggan', $data);

			echo '<script language=JavaScript>alert("Input Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {

			echo '<script language=JavaScript>alert("Gagal!! pelanggan telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}

	public function edit($id)
	{
		$data['pelanggan'] = $this->Pelanggan_model->pelanggan_getById($id);
		$name = strip_tags($this->input->post('i_name'));
		$email = strip_tags($this->input->post('i_email'));
		$gender = strip_tags($this->input->post('i_gender'));
		$phone = strip_tags($this->input->post('i_phone'));
		$address = strip_tags($this->input->post('i_address'));
		//input array
		$data = array(
			'name' => $name,
			'email' => $email,
			'gender' => $gender,
			'phone' => $phone,
			'address' => $address
		);
		//insert ke fbsql_database(link_identifier)
		$x = $this->Pelanggan_model->pelanggan_cek($email);
		if ($x == null) {
			$this->Pelanggan_model->pelanggan_update($id, 'pelanggan', $data);
			echo '<script language=JavaScript>alert("Update Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! pelanggan telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->Pelanggan_model->pelanggan_delete('pelanggan', $id);
		echo '<script language=JavaScript>alert("Delete Berhasil")
		onclick = history.go(-1)</script>';
	}
}
