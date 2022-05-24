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
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php"); ?>
                    <div class="row">
                         <h1>Biodata</h1>
                        <p>Nama Lengkap : Aldi Rafelino Simamora</p>
                        <p>NPM : 191710429 </p>
                        <p>Prodi : Sistem Informasi</p>
                        <p>Alamat :Yogyakarta </p>
                        <p>Nomor Telepon : 082164443545 </p>
                        <p>Jenis Kelamin : Pria</p>
                        <p>Status : Mahasiswa</p>
                    </main>
                    <?php $this->load->view("admin/_partials/footer.php"); ?>
                </div>
            </div>
            <?php $this->load->view("admin/_partials/modal.php"); ?>

            <?php $this->load->view("admin/_partials/js.php"); ?>
        </body>
        </html>