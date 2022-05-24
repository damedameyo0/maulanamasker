<?php defined('BASEPATH') or exit('No direct script access allowed');
class Masker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Masker_model');
    }

    public function index()
    {
        $data['masker'] = $this->masker_model->masker_getAll();
        $this->load->view('admin/masker/v_masker', $data);
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
        $x = $this->masker_model->masker_cek($title);
        if ($x == null) {
            $this->masker_model->masker_insert('masker', $data);

            echo '<script language=JavaScript>alert("Input Berhasil")
			onclick = location.href = document.referrer</script>';
        } else {

            echo '<script language=JavaScript>alert("Gagal!! masker telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
        }
    }

    public function edit($id)
    {
        $data['masker'] = $this->masker_model->masker_getById($id);
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
        $x = $this->masker_model->masker_cek($title);
        if ($x == null) {
            $this->masker_model->masker_update($id, 'masker', $data);
            echo '<script language=JavaScript>alert("Update Berhasil")
			onclick = location.href = document.referrer</script>';
        } else {
            echo '<script language=JavaScript>alert("Gagal!! masker telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
        }
    }

    public function delete($id)
    {
        $this->masker_model->masker_delete('masker', $id);
        echo '<script language=JavaScript>alert("Delete Berhasil")
		onclick = history.go(-1)</script>';
    }
}
