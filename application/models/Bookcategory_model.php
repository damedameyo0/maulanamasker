	<?php defined ('BASEPATH') or exit('No direct script access allowed');


class Bookcategory_model extends CI_Model
{
	public function bookcategory_getAll()
	{
		$query = $this->db->query("SELECT * FROM book_category");
		return $query;
	}

	public function bookcategory_getById($id)
	{
		$query = $this->db->query("SELECT * FROM book_category where book_category_id = $id");
		return $query;
	}

	public function bookcategory_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function bookcategory_update($id, $table, $data)
	{
		$query = $this->db->where('book_category_id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function bookcategory_delete($table, $id )
	{
		$query = $this->db->where('book_category_id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function bookcategory_cek($name)
	{
		$query = $this->db->query("SELECT name FROM book_category WHERE name = '$name'");
		return $query->result_array();
	}
}