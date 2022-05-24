<?php defined('BASEPATH') or exit('No direct script access allowed');


class Pelanggan_model extends CI_Model
{
    public function pelanggan_getAll()
    {
        $query = $this->db->query("SELECT * FROM pelanggan");
        return $query;
    }

    public function pelanggan_getById($id)
    {
        $query = $this->db->query("SELECT * FROM pelanggan where pelanggan_id = $id");
        return $query;
    }

    public function pelanggan_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function pelanggan_update($id, $table, $data)
    {
        $query = $this->db->where('pelanggan_id', $id);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function pelanggan_delete($table, $id)
    {
        $query = $this->db->where('pelanggan_id', $id);
        $query = $this->db->delete($table);
        return $query;
    }

    public function pelanggan_cek($email)
    {
        $query = $this->db->query("SELECT email FROM pelanggan WHERE email='$email'");
        return $query->result_array();
    }
}
