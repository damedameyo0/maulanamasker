<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function masker_getAll()
    {
        $query = $this->db->query("SELECT * FROM masker");
        return $query;
    }

    public function masker_getAll1()
    {
        $query = $this->db->query("SELECT * FROM masker INNER JOIN masker_user ON masker.id_masker=masker_user.id_masker INNER JOIN user ON masker_user.id_user=user.id_user");
        return $query;
    }

    public function masker_getAll2()
    {
        $query = $this->db->query("SELECT * FROM masker INNER JOIN masker_maskercat ON masker.masker_id=masker_maskercat.masker_id INNER JOIN masker_category ON masker_maskercat.masker_category_id=masker_category.masker_category_id");
        return $query;
    }

    public function masker_getById($id)
    {
        $query = $this->db->query("SELECT * FROM masker where masker_id=$id");
        return $query;
    }

    public function min_stock($jumlah, $id_masker)
    {
        $query = $this->db->query("UPDATE masker SET stok_masker = stok_masker -$jumlah Where id_masker = $id_masker");
        return $query;
    }

    public function plus_stock($jumlah, $id_masker)
    {
        $query = $this->db->query("UPDATE masker SET stok_masker = stok_masker + $jumlah Where id_masker = $id_masker");
        return $query;
    }

    public function invoice_no()
    {
        $query = $this->db->query(" SELECT MAX(penjualan_id) as invoice_no from penjualan");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int) $row->invoice_no) + 1;
            $no = sprintf("%09s", $n);
        } else {
            $no = sprintf("%09s", 1);
        }
        $kode_jual = "PNJ" . $no;
        return $kode_jual;
    }

    public function penjualan_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function penjualan_last_id()
    {
        $query = $this->db->query("SELECT MAX(penjualan_id) as penjualan_id
            FROM penjualan");
        return $query->row();
    }

    public function d_penjualan_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function penjualan_getAll()
    {
        $query = $this->db->query("SELECT penjualan.penjualan_id, penjualan.kode_jual, customer.customer_id, customer.name as customer_name, employee.employee_id, employee.name as employee_name, penjualan.sale_date FROM penjualan LEFT JOIN customer ON penjualan.customer_id=customer.customer_id INNER JOIN employee ON penjualan.employee_id=employee.employee_id");
        return $query;
    }

    public function penjualan_getAll1()
    {
        $query = $this->db->query("SELECT * FROM d_penjualan INNER JOIN penjualan ON d_penjualan.penjualan_id=penjualan.penjualan_id");
        return $query;
    }


    public function penjualan_getById($penjualan_id)
    {
        $query = $this->db->query("SELECT * FROM penjualan where penjualan_id=$penjualan_id");
        return $query;
    }


    public function penjualan_getAll2($penjualan_id)
    {
        $query = $this->db->query("SELECT * FROM d_penjualan INNER JOIN masker ON d_penjualan.masker_id=masker.masker_id where penjualan_id=$penjualan_id");
        return $query;
    }

    public function rangeDate($start_date, $end_date) // menarik data dr tabel penjualan, pelanggan, dan user sesuai rentang tanggal d ari inputan user
    {
        $query = $this->db->query("SELECT penjualan.penjualan_id, penjualan.kode_jual, customer.customer_id, customer.name as customer_name, employee.employee_id, employee.name as employee_name, penjualan.sale_date FROM penjualan
        LEFT JOIN customer ON penjualan.customer_id = customer.customer_id
        INNER JOIN user ON penjualan.user_id = user.user_id
        WHERE penjualan.sale_date >= '$start_date' AND penjualan.sale_date <= '$end_date'");
        return $query;
    }
    public function monthChart($start_date, $end_date) // menghitung jml buku terju al per bulan (current year)
    {
        $query = $this->db->query("SELECT penjualan.penjualan_id, d_penjualan.penjualan_id, SUM(d_penjualan.amount) as
        count, MONTHNAME(sale_date) as month_name, YEAR(CURDATE()) as year_num FROM penjualan
        INNER JOIN d_penjualan ON d_penjualan.penjualan_id = penjualan.penjualan_id
        WHERE sale_date >= '$start_date' AND sale_date <= '$end_date'
        GROUP BY YEAR(sale_date), MONTH(sale_date)");
        return $query;
    }
}
