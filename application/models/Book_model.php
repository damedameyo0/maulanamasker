<?php defined ('BASEPATH') or exit('No direct script access allowed');


class Book_model extends CI_Model
{
	public function book_getAll()
	{
		$query = $this->db->query("SELECT * FROM book");
		return $query;
	}

	public function book_getById($id)
	{
		$query = $this->db->query("SELECT * FROM book where book_id = $id");
		return $query;
	}

	public function book_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function book_update($id, $table, $data)
    {
        $query = $this->db->where('book_id', $id);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function book_delete($table, $id )
    {
        $query = $this->db->where('book_id', $id);
        $query = $this->db->delete($table);
        return $query;
    }

    public function book_cek($title)
    {
        $query = $this->db->query("SELECT title FROM book WHERE title='$title'");
        return $query->result_array();
    }
}