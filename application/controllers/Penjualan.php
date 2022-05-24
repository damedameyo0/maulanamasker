<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penjualan_model');
    $this->load->model('Level_model');
    $this->load->model('Pelanggan_model');
  }

  public function index()
  {
    if ($this->session->userdata('level_id') == 1 || ($this->session->userdata('level_id') == 3)) {
      $id_level = $this->session->userdata('level_id');
      $data = array(
        'kode_jual' => $this->Penjualan_model->invoice_no(),
        'total' => $this->show_total(),
        'level_id' => $this->Level_model->level_getById($id_level)->row(),
        'masker' => $this->Penjualan_model->masker_getAll(),
        'masker1' => $this->Penjualan_model->masker_getAll1(),
        // 'masker2' => $this->Penjualan_model->masker_getAll2(),
        'customer' => $this->Pelanggan_model->pelanggan_getAll(),
      );
      $this->load->view("admin/penjualan/v_penjualan", $data);
    } elseif ($this->session->userdata('level_id') != null) {
      echo '<script language=JavaScript>alert("Anda Tidak memiliki akses")
            onclick=location.href="Overview"</script>';
    } else {
      echo '<script language=JavaScript>alert("Anda Belum Login, Silahkan Login")
            onclick=location.href="user"</script>';
    }
  }

  function add_to_cart()
  {
    $data = array(
      'id' => $this->input->post('product_id'),
      'name' => $this->input->post('product_name'),
      'price' => $this->input->post('product_price'),
      'qty' => $this->input->post('quantity'),
      'status' => 1
    );
    $insert = $this->cart->insert($data);
    $id_masker = $this->input->post('product_id');
    $qty = $this->input->post('quantity');
    if ($insert == TRUE) {
      $this->penjualan_model->min_stock($qty, $id_masker);
    } else {
      echo '<script language=JavaScript>alert("Fail add to cart")</script>';
    }
  }

  function show_cart()
  {
    $output = '';
    $no = 0;
    $x = 0;
    foreach ($this->cart->contents() as $items) {
      if (number_format($items['status']) == 1) {
        $no++;
        $output .= '
        <tr>
        <td>' . number_format($items['id_masker']) . '</td>
        <td>' . $items['nama_masker'] . '</td>
        <td>' . number_format($items['price']) . '</td>
        <td>' . number_format($items['qty']) . '</td>
        <td>' . number_format($items['subtotal']) . '</td>
        <td><button type="button" id="' . $items['rowid'] . '" class="remove_cart btn btn-danger btn-sm">Cancel</button></td>
        </tr>
        ';
      } else {
        $x++;
      }
    }
    if ($no == 0 && $x == 0) {
      $output .= '
      <tr>
      <td colspan="7" class="text-center">Tidak ada Item</td>
      </tr>
      ';
    } else if ($no != 0 && $x == 0) {
      $output .= '
      <tr>
      <th colspan="5">Total</th>
      <th colspan="1">' . 'Rp ' . number_format($this->cart->total()) . '</th>
      </tr>
      ';
    } else if ($no == 0 && $x != 0) {
      echo '<script language=JavaScript>alert("Library Cart masih digunakan di Pembelian. Tekan `Cancel` pada bagian bawah halaman Pembelian. ")
      onclick=location.href="pembelian"</script>';
    }
    return $output;
  }

  function load_cart()
  {
    echo $this->show_cart();
  }

  function delete_cart()
  {
    $row_id = $this->input->post('row_id');
    foreach ($this->cart->contents() as $items) {
      $row_id1 = $items['rowid'];
      $masker_id = $items['id'];
      $qty = $items['qty'];
      if ($row_id == $row_id1) {
        $this->Penjualan_model->plus_stock($qty, $masker_id);
        $data = array(
          'rowid' => $this->input->post('row_id'),
          'qty' => 0,
        );
        $this->cart->update($data);
      }
    }
    echo $this->show_cart();
  }

  function show_total()
  {
    if (number_format($this->cart->total()) > 0) {
      $output1 = number_format($this->cart->total());
    } else {
      $output1 = 0;
    }
    return $output1;
  }

  function clear_cart()
  {
    foreach ($this->cart->contents() as $items) {
      $masker_id = $items['id'];
      $qty = $items['qty'];
      $this->Penjualan_model->plus_stock($qty, $masker_id);
    }
    echo $this->cart->destroy();
    echo '<script language=JavaScript>alert("Clearing the Cart...")
    onclick=location.href = document.referrer</script>';
  }

  public function add_penjualan()
  {
    $kode_jual = $this->input->post('kode_jual');
    date_default_timezone_set('Asia/Jakarta');
    $sale_date = date("Y-m-d H:i:s");
    $member = $this->input->post('customer');
    $data = array(
      'kode_jual' => $kode_jual,
      'user_id' => $this->session->userdata('user_id'),
      'sale_date' => $sale_date,
      'customer_id' => $member
    );
    $this->Penjualan_model->penjualan_insert('penjualan', $data);

    foreach ($this->cart->contents() as $items) {
      $masker_id = number_format($items['id']);
      $qty = number_format($items['qty']);
      $sub_total = $items['subtotal'];
      $status = $items['status'];
      if ($status == 1) {
        // Input Array
        $data = array(
          'id_masker' => $masker_id,
          'amount' => $qty,
          'penjualan_id' => $this->Penjualan_model->penjualan_last_id()->penjualan_id,
          'total_price' => $sub_total
        );
        $this->Penjualan_model->d_penjualan_insert('d_penjualan', $data);
      }
    }
    $this->cart->destroy();
    echo '<script language=JavaScript>alert("Payment Berhasil")
    onclick=location.reload()</script>';
  }

  public function list_penjualan()
  {
    if ($this->session->userdata('level_id') == 1) {
      $id = $this->session->userdata('level_id');
      $data = array(
        'id' => $this->Level_model->level_getById($id)->row(),
        'penjualan' => $this->Penjualan_model->penjualan_getAll(),
        'penjualan1' => $this->Penjualan_model->penjualan_getAll1(),
      );
      $this->load->view('admin/penjualan/v_laporan', $data);
    } elseif ($this->session->userdata('level_id') != null) {
      echo '<script language=JavaScript>alert("Anda Tidak memiliki akses")
            onclick=location.href="Overview"</script>';
    } else {
      echo '<script language=JavaScript>alert("Anda Belum Login, Silahkan Login")
            onclick=location.href="user"</script>';
    }
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');
    $this->data = array(
      'title_pdf' => 'Laporan Penjualan Maulana Masker',
      'penjualan1' => $this->Penjualan_model->penjualan_getAll(),
      'penjualan2' => $this->Penjualan_model->penjualan_getAll1(),
    );
    $file_pdf = "LaporanPenjualan";
    $paper = 'A4';
    $orientation = 'potrait';
    $html = $this->load->view('admin/penjualan/v_laporan_pdf', $this->data, true);
    $this->dompdf_gen->generate($html, $file_pdf, $paper, $orientation);
  }

  public function detail_penjualan($penjualan_id)
  {
    $data = array(
      'penjualan3' => $this->Penjualan_model->penjualan_getAll2($penjualan_id),
    );
    $this->load->view('admin/penjualan/v_detail', $data);
  }

  public function chart()
  {
    if ($this->session->userdata('level_id') == 1 || ($this->session->userdata('level_id') == 3)) {
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $record = $this->Penjualan_model->monthChart($start_date, $end_date)->result();
      $data = [];
      $data['label_tahun'] = "-";
      foreach ($record as $row) {
        $data['label_bulan'][] = $row->month_name;
        $data['label_tahun'] = $row->year_num;
        $data['data_jml'][] = (int) $row->count;
      }
      $data2 = array(
        'find_date' => $this->Penjualan_model->rangeDate($start_date, $end_date),
        'penjualan1' => $this->Penjualan_model->penjualan_getAll1(),
        'chart_data' => json_encode($data) // Mengkonversi datadata dalam variabel $data menjadi objek JSON
      );
      $this->load->view('admin/penjualan/v_chart', $data2);
      // Load v_chart.php dengan membawa data array $data2
    } elseif ($this->session->userdata('level_id') != null) {
      echo '<script language=JavaScript>alert("Anda Tidak memiliki akses")
            onclick=location.href="Overview"</script>';
    } else {
      echo '<script language=JavaScript>alert("Anda Belum Login maszeh, Silahkan Login")
            onclick=location.href="user"</script>';
    }
  }
}
