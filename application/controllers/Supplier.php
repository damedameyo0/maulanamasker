<?php defined ('BASEPATH') or exit('No direct script access allowed');
class Supplier extends CI_Controller
{
	public function __construct()
	{
		parent ::__construct();

		$this->load->model('Supplier_model');
	}

	public function index()
	{
		$data['supplier'] = $this->Supplier_model->supplier_getAll();
		$this->load->view('admin/supplier/v_Supplier', $data);
	}

	public function add()
	{
		$name = strip_tags($this->input->post('i_name'));
		$email = strip_tags($this->input->post('i_email'));
		$phone = strip_tags($this->input->post('i_phone'));
		$address = strip_tags($this->input->post('i_address'));

        //Input array
		$data = array(
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'address' => $address


		);
        //Insert ke database
		$x = $this->Supplier_model->supplier_cek($name);
		if ($x == null) {
			$this->Supplier_model->supplier_insert('supplier', $data);

			echo '<script language=JavaScript>alert("Input Berhasil")
			onclick = location.href = document.referrer</script>';

		} else {

			echo '<script language=JavaScript>alert("Gagal!! supplier telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}   

	public function edit($id)
	{
		$data['supplier'] = $this->Supplier_model->supplier_getById($id);
		$name = strip_tags($this->input->post('i_name'));
		$email = strip_tags($this->input->post('i_email'));
		$phone = strip_tags($this->input->post('i_phone'));
		$address = strip_tags($this->input->post('i_address'));
        //input array
		$data = array(
			'name' =>$name,
			'email' => $email,
			'phone' => $phone,
			'address' => $address
		);
        //insert ke fbsql_database(link_identifier)
		$x = $this->Supplier_model->supplier_cek($email);
		if ($x == null) {
			$this->Supplier_model->supplier_update($id, 'supplier', $data);
			echo '<script language=JavaScript>alert("Update Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! supplier telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->Supplier_model->supplier_delete('supplier',$id );
		echo '<script language=JavaScript>alert("Delete Berhasil")
		onclick = history.go(-1)</script>';
	}
}
?>