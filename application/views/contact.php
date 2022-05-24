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
                     <h1>Concact US</h1>
                     <p>Ini halaman contact us</p>
                 </main>
                 <?php $this->load->view("admin/_partials/footer.php"); ?>
             </div>
         </div>
         <?php $this->load->view("admin/_partials/modal.php"); ?>
         <?php $this->load->view("admin/_partials/js.php"); ?>
     </body>
     </html>

