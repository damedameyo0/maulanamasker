<!DOCTYPE html>
<html>

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
                    <h3>Masker</h3>
                    <?php $this->load->view("admin/_partials/breadcrumb.php"); ?>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>List Masker
                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMasker"> Add (+) </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%">id</th>
                                            <th width="35%">Nama Masker</th>
                                            <th width="35%">Harga Masker</th>
                                            <th width="35%">Stok Masker</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($Masker->result_array() as $i) :
                                            $id = $i['id_masker'];
                                            $title = $i['nama_masker'];
                                            $price = $i['harga_masker'];
                                            $stock = $i['stok_masker'];
                                        ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $title; ?></td>
                                                <td><?php echo $price; ?></td>
                                                <td><?php echo $stock; ?></td>
                                                <td>
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#editMasker<?php echo $id; ?>" class="btn btn-primary">Edit</a>
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#deleteMasker<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php $this->load->view("admin/_partials/footer.php"); ?>
        </div>
    </div>
</body>
<?php $this->load->view("admin/penjualan/modal_penjualan.php"); ?>
<?php $this->load->view("admin/_partials/modal.php"); ?>
<script src="<?php echo base_url('/js/datatables-simple-demo.js') ?>"></script>
<?php $this->load->view("admin/book/modal_book.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

</html>