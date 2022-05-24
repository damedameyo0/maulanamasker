<?php defined ('BASEPATH') or exit('No direct script access allowed');
class Bookcategory extends CI_Controller
{
	public function __construct()
	{
		parent ::__construct();

		$this->load->model('Bookcategory_model');
	}

	public function index()
	{
		$data['book_category'] = $this->Bookcategory_model->bookcategory_getAll();
		$this->load->view('admin/bookcategory/v_Bookcategory', $data);
	}

	public function add()
	{
		$name = strip_tags($this->input->post('i_name'));
        //Input array
		$data = array(
			'name' => $name,
		);
        //Insert ke database
		$x = $this->Bookcategory_model->bookcategory_cek($name);
		if ($x == null) {
			$this->Bookcategory_model->bookcategory_insert('book_category', $data);
			echo '<script language=JavaScript>alert("Input Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Book Category telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}   

	public function edit($id)
	{
		$data['book_category'] = $this->Bookcategory_model->bookcategory_getById($id);
		$name = strip_tags($this->input->post('i_name'));
        //input array
		$data = array(
			'name' =>$name
		);
        //insert ke database
		$x = $this->Bookcategory_model->bookcategory_cek($name);
		if ($x == null) {
			$this->Bookcategory_model->bookcategory_update($id, 'book_category', $data);
			echo '<script language=JavaScript>alert("Update Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Book Category telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->Bookcategory_model->bookcategory_delete('book_category', $id );
		echo '<script language=JavaScript>alert("Delete Berhasil")
		onclick = history.go(-1)</script>';
	}
}
?>