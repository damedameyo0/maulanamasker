<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php"); ?>
</head>

<body class="sb-nav-fixed">
    <?php $this->load->view("admin/_partials/navbar.php"); ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->load->view("admin/_partials/sidebar.php"); ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Transaksi Penjualan</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php"); ?>
                    <div class="row">
                        <div class="col-sm-9">
                            <form class="form-horizontal" action="" method="post">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-sm-3 control-label" style="margin:auto;">Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" data-sale_date="sale_date" class="form-control" value="<?= date("d-m-Y") ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-sm-5 control-label"> Nama User</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-user="user" value="<?= $this->session->userdata('name') ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-sm-4 control-label">Level</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" data-user="user" value="<?= $level_id->name; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <button class="col-sm-12 btn btn-info btn-flat" data-bs-toggle="modal" data-bs-target="#show_masker">
                                <i class="fa fa-search"></i>Pilih Masker
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Masker</th>
                                        <th>Harga Masker</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!--Prototype-->
                                <tbody id="detail_cart"></tbody>
                                <!--END Prototype-->
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card col-sm-3">
                            <div class="card-body">
                                <div class="box-body">
                                    <div>
                                        <h4>Nomor Nota: <b><span datainvoice="invoice"><?= $kode_jual; ?></span></b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-sm-4">
                            <div class="card-body">
                                <div class="box-body">
                                    <div>
                                        <h2>Total Bayar: </h2><b><span xtotal="total" style="font-size:35pt">Rp. <?= $total ?>,-</span></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <Form method="post" name='autoSumForm'>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title" class="perhitungan col-sm-4 controllabel">Uang</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name='Uang_Pembayaran' size='23' onFocus="startCalc();" onBlur="stopCalc();" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title" class="col-sm-4 control-label">Kembalian</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" value='0' name="Kembalian" onchange='tryNumberFormat(this.form);' readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- <div class="form-group">
                                <table>
                                    <tr>
                                        <td width="50%">
                                            <label for="title">Pelanggan</label>
                                        </td>
                                        <td>
                                            <input type="hidden" class="form-control" name="id_pelanggan" id="id_pelanggan">
                                        </td>
                                        <td>
                                            <button class="add_pelanggan btn btn-info btn-flat" data-bs-toggle="modal" data-bs-target="#showCustomer">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div> -->
                            <a class="btn btn-flat btn-lg btn-warning" href="<?= base_url('Penjualan/clear_cart'); ?>"> Cancel
                            </a>
                            <button class="process_payment btn btn-flat btn-lg btn-success floatright" data-kode_jual="<?= $kode_jual; ?>">
                                Process Payment
                            </button>
                        </div>
                    </div>
                </div>
            </main>
            <?php $this->load->view("admin/_partials/footer.php"); ?>
        </div>
    </div><br>
    </div>
    </div>

</body>
<?php $this->load->view("admin/penjualan/modal_penjualan.php"); ?>
<?php $this->load->view("admin/_partials/jspenjualan.php"); ?>
<?php $this->load->view("admin/_partials/modal.php"); ?>

</html>