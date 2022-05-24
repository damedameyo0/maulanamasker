<?php defined ('BASEPATH') or exit('No direct script access allowed');
class Author extends CI_Controller
{
	public function __construct()
	{
		parent ::__construct();

		$this->load->model('Author_model');
	}

	public function index()
	{
		$data['author'] = $this->Author_model->author_getAll();
		$this->load->view('admin/author/v_Author', $data);
	}

	public function add()
	{
		$fullname = strip_tags($this->input->post('i_fullname'));
		$email = strip_tags($this->input->post('i_email'));
        //Input array
		$data = array(
			'fullname' => $fullname,
			'email' => $email
		);
        //Insert ke database
		$x = $this->Author_model->author_cek($email);
		if ($x == null) {
			$this->Author_model->author_insert('author', $data);
			echo '<script language=JavaScript>alert("Input Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}   

	public function edit($id)
	{
		$data['author'] = $this->Author_model->author_getById($id);
		$fullname = strip_tags($this->input->post('i_fullname'));
		$email = strip_tags($this->input->post('i_email'));
        //input array
		$data = array(
			'fullname' =>$fullname,
			'email' => $email
		);
        //insert ke database
		$x = $this->Author_model->author_cek($email);
		if ($x == null) {
			$this->Author_model->author_update($id, 'author', $data);
			echo '<script language=JavaScript>alert("Update Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->Author_model->author_delete('author', $id );
		echo '<script language=JavaScript>alert("Delete Berhasil")
		onclick = history.go(-1)</script>';
	}
}
?>