<?php defined ('BASEPATH') or exit('No direct script access allowed');
class Book extends CI_Controller
{
	public function __construct()
	{
		parent ::__construct();

		$this->load->model('Book_model');
	}

	public function index()
	{
		$data['book'] = $this->Book_model->book_getAll();
		$this->load->view('admin/book/v_Book', $data);
	}

	public function add()
	{
		$title = strip_tags($this->input->post('i_title'));
		$description = strip_tags($this->input->post('i_description'));
		$release_year = strip_tags($this->input->post('i_release_year'));
		$page = strip_tags($this->input->post('i_page'));
		$price = strip_tags($this->input->post('i_price'));
		$discount = strip_tags($this->input->post('i_discount'));
		$stock = strip_tags($this->input->post('i_stock'));

        //Input array
		$data = array(
			'title' => $title,
			'description' => $description,
			'release_year' => $release_year,
			'page' => $page,
			'price' => $price,
			'discount' => $discount,
			'stock' => $stock


		);
        //Insert ke database
		$x = $this->Book_model->book_cek($title);
		if ($x == null) {
			$this->Book_model->book_insert('book', $data);

			echo '<script language=JavaScript>alert("Input Berhasil")
			onclick = location.href = document.referrer</script>';

		} else {

			echo '<script language=JavaScript>alert("Gagal!! book telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}   

	public function edit($id)
	{
		$data['book'] = $this->Book_model->book_getById($id);
		$title = strip_tags($this->input->post('i_title'));
		$description = strip_tags($this->input->post('i_description'));
		$release_year = strip_tags($this->input->post('i_release_year'));
		$page = strip_tags($this->input->post('i_page'));
		$price = strip_tags($this->input->post('i_price'));
		$discount = strip_tags($this->input->post('i_discount'));
		$stock = strip_tags($this->input->post('i_stock'));
        //input array
		$data = array(
			'title' => $title,
			'description' => $description,
			'release_year' => $release_year,
			'page' => $page,
			'price' => $price,
			'discount' => $discount,
			'stock' => $stock
		);
        //insert ke fbsql_database(link_identifier)
		$x = $this->Book_model->book_cek($title);
		if ($x == null) {
			$this->Book_model->book_update($id, 'book', $data);
			echo '<script language=JavaScript>alert("Update Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! book telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->Book_model->book_delete('book',$id );
		echo '<script language=JavaScript>alert("Delete Berhasil")
		onclick = history.go(-1)</script>';
	}
}
