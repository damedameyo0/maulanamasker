<?php defined('BASEPATH') or exit('No direct script access allowed');


class Masker_model extends CI_Model
{
    public function masker_getAll()
    {
        $query = $this->db->query("SELECT * FROM masker");
        return $query;
    }

    public function masker_getById($id)
    {
        $query = $this->db->query("SELECT * FROM masker where masker_id = $id");
        return $query;
    }

    public function masker_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function masker_update($id, $table, $data)
    {
        $query = $this->db->where('masker_id', $id);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function masker_delete($table, $id)
    {
        $query = $this->db->where('masker_id', $id);
        $query = $this->db->delete($table);
        return $query;
    }

    public function masker_cek($title)
    {
        $query = $this->db->query("SELECT title FROM masker WHERE title='$title'");
        return $query->result_array();
    }
}
