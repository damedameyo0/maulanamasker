<?php defined ('BASEPATH') or exit('No direct script access allowed');
class Level extends CI_Controller
{
	public function __construct()
	{
		parent ::__construct();

		$this->load->model('Level_model');
	}

	public function index()
	{
		$data['level'] = $this->Level_model->level_getAll();
		$this->load->view('admin/level/v_Level', $data);
	}

	public function add()
	{
		$name = strip_tags($this->input->post('i_name'));
        //Input array
		$data = array(
			'name' => $name,
		);
        //Insert ke database
		$x = $this->Level_model->level_cek($name);
		if ($x == null) {
			$this->Level_model->level_insert('level', $data);
			echo '<script language=JavaScript>alert("Input Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Level telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}   

	public function edit($id)
	{
		$data['level'] = $this->Level_model->level_getById($id);
		$name = strip_tags($this->input->post('i_name'));
        //input array
		$data = array(
			'name' =>$name
		);
        //insert ke database
		$x = $this->Level_model->level_cek($name);
		if ($x == null) {
			$this->Level_model->level_update($id, 'level', $data);
			echo '<script language=JavaScript>alert("Update Berhasil")
			onclick = location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Level telah tersimpan sebelumnya")
			onclick = history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->Level_model->level_delete('level', $id );
		echo '<script language=JavaScript>alert("Delete Berhasil")
		onclick = history.go(-1)</script>';
	}
}
?>