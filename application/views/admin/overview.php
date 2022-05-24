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
                HaLaman Utama
            </main>
            <?php $this->load->view("admin/_partials/footer.php"); ?>
        </div>s
    </div>
    <?php $this->load->view("admin/_partials/modal.php"); ?>
    <?php $this->load->view("admin/_partials/js.php"); ?>
</body>

</html>