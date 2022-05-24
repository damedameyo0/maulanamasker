<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="sb-nav-fixed">
	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<?php $this->load->view("admin/_partials/sidebar.php") ?>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Detail Penjualan</h1>
					<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
					<?php echo anchor('penjualan/list_penjualan', '<div class="btn btn-md btn-danger">Kembali</div>'); ?><br><br>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th width="35%">Nama Masker</th>
										<th width="35%">Jumlah Dijual</th>
										<th width="30%">Harga Masker</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($penjualan3->result_array() as $i) { ?>
										<tr>
											<td><?php echo $i['nama_masker']; ?></td>
											<td><?php echo $i['amount']; ?></td>
											<td><?php echo $i['harga_masker']; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>
			<?php $this->load->view("admin/_partials/footer.php") ?>
		</div>
	</div>
	<?php $this->load->view("admin/_partials/js.php") ?>
</body>
<?php $this->load->view("admin/_partials/modal.php") ?>

</html>