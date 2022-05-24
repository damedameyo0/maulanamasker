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
                        <div class="col-md-12 bg-warning">
                            <h3>
                                <center>Container 1 - Gambar</center>
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pb-2 bg-info text-dark">
                            <img src="https://tse2.mm.bing.net/th?id=OIP.eCz28Jxpl4pGK9hwh-awsgHaIl&pid=Api&P=0&w=380&h=380" class="img-thumbnail mx-auto d-block" width="auto" height="auto">
                            <center><b>Logo UAJY</b></center>
                        </div>
                        <div class="col-md-4 pb-2 bg-info text-dark">
                            <img src=https://scontent.fkno6-1.fna.fbcdn.net/v/t1.6435-9/124623133_406307754070541_8884140675525436090_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=yr0_8PHfd5MAX-BAVPN&_nc_ht=scontent.fkno6-1.fna&oh=00_AT927JZrT9QS4RCjN2n3Do2D6TSTZjGgldmgkiOFw-IeIg&oe=61E03F73 class="img-thumbnail mx-auto d-block" width="auto" height="auto">
                            <center><b>Foto Diri</b></center>
                        </div>
                        <div class="col-md-4 pb-2 bg-success text-dark">
                            <img src="https://tse4.mm.bing.net/th?id=OIP.WJDSpf-MaNuXEVVz60vwZQHaE8&pid=Api&P=0&w=1000&h=1000" class="img-thumbnail mx-auto d-block" width="auto" height="auto">
                            <center><b>Gedung Bonaventura</b></center>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-10 bg-success">
                            <h3>
                                <center>Container 2 - Biodata Diri</center>
                            </h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-5 bg-info text-dark">
                            <h3>
                                <center>Data Diri</center>
                            </h3>
                            <p>
                                <center>nama: Aldi Rafelino Simamora</center>
                            </p>
                            <p>
                                <center>npm : 191710429 </center>
                            </p>
                            <p>
                                <center>Laki - Laki</center>
                            </p>
                            <p>
                                <center> / 21 Oktober 2001</center>
                            </p>
                            <p>
                                <center>Jl Kaliurang</center>
                            </p>
                            <p>
                                <center>Minggu 3</center>
                            </p>
                        </div>
                        <div class="col-md-5 bg-warning text-dark">
                            <h3>
                                <center>Deskripsi Singkat</center>
                            </h3>
                            <p>Mahasiswa SI UAJY angkatan 2019</p>
                        </div>
                    </div>
                </div>
            </main>
            <?php $this->load->view("admin/_partials/footer.php"); ?>
        </div>
    </div>
    <?php $this->load->view("admin/_partials/modal.php"); ?>
    <?php $this->load->view("admin/_partials/js.php"); ?>
</body>
</html>