<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo base_url('Overview') ?>">
            </a>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as : <?= $this->session->userdata['name']; ?></div>

            </div>
            <div class="sb-sidenav-menu-heading text-success">Transaksi</div>
            <a class="nav-link" href="<?= base_url("Penjualan") ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                Penjualan
            </a>
            <?php if ($this->session->userdata('level_id') == 1) { ?>
                <a class="nav-link" href="<?php echo site_url('Penjualan/list_penjualan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Laporan Penjualan
                </a>
            <?php } ?>


            <a class="nav-link" href="<?php echo site_url('Penjualan/chart') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                Chart Penjualan
            </a>

            <a class="nav-link" href="<?= base_url("Pembelian") ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-piggy-bank"></i></div>
                Pembelian
            </a>

            <a class="nav-link" href="<?php echo site_url('Pembelian/list_pembelian') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Laporan Pembelian
            </a>

            <a class="nav-link" href="<?php echo site_url('Pembelian/chart') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                Chart Pembelian
            </a>

            <div class="sb-sidenav-menu-heading text-success">Master</div>


            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDataMaster" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Data Master
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseDataMaster" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?php echo site_url('Pelanggan') ?>">Pengelolaan Data Pelanggan</a>
                    <a class="nav-link" href="<?php echo site_url('Pelanggan') ?>">Pengelolaan Data User</a>
                    <a class="nav-link" href="<?php echo site_url('Level') ?>">Pengelolaan Level</a>
                </nav>
            </div>
</nav>