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
                    <h1 class="mt-4">Transaksi Pembelian</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php"); ?>
                    <div class="row">
                        <div class="col-sm-9">
                            <form class="form-horizontal" action="" method="post">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-sm-3 control-label">Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" data-buy_date="buy_date" class="form-control" value="<?php echo date("d-m-Y") ?>" readonly>
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
                                                    <input type="text" class="form-control" data-employee="employee" value="<?php echo $this->session->userdata('name'); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-sm-4 control-label">Level</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" data-employee="employee" value="<?= $user_level->name; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <button class="col-sm-12 btn btn-info btn-flat" data-bs-toggle="modal" data-bs-target="#show_buku">
                                <i class="fa fa-search"></i>Pilih Buku
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Book Id</th>
                                        <th>Book Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!--Prototype-->
                                <tbody id="detail_cart">
                                </tbody>
                                <!--END Prototype-->
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card col-sm-3">
                            <div class="card-body">
                                <div class="box-body">
                                    <div>
                                        <h4>Nomor Nota : <b><span data-invoice="invoice"><?= $kode_beli; ?></span></b></h4>
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
                                        <label for="title" class="perhitungan col-sm-4 controllabel">Cash</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name='Uang_Pembayaran' size='23' onFocus="startCalc();" onBlur="stopCalc();" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title" class="col-sm-4 control-label">Change</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" value='0' name="Kembalian" onchange='tryNumberFormat(this.form);' readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td width="50%">
                                            <label for="title">Supplier</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier">
                                            <input type="hidden" class="form-control" name="id_supplier" id="id_supplier">
                                        </td>
                                        <td>
                                            <button class="add_supplier btn btn-info btn-flat" data-bs-toggle="modal" data-bs-target="#showSupplier">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <a class="btn btn-flat btn-lg btn-warning" href="<?= base_url('admin/pembelian/clear_cart'); ?>"> Cancel </a>
                            <button class="process_payment btn btn-flat btn-lg btn-success floatright" data-kode_beli="<?= $kode_beli; ?>">
                                Process Payment
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div><br>
    <?php $this->load->view("admin/_partials/footer.php"); ?>
    <!-- The Modal -->
    <div>
        <?php $this->load->view("admin/pembelian/modal_pembelian.php"); ?>
        <?php $this->load->view("admin/_partials/modal.php"); ?>
        <?php $this->load->view("admin/_partials/jspembelian.php"); ?>
    </div>
</body>

</html>