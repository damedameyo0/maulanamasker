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
					<h1 class="mt-4">Daftar Penjualan</h1>
					<div class="card-header"><i class="fas fa-table mr-1"></i>
						<a type="button" href="<?= base_url('Penjualan/pdf'); ?>" class="btn btn-warning"><i class="far fa-file-pdf"></i> Export PDF</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table tablebordered" id="datatablesSimple" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th width="10%">No.Nota</th>
										<th width="20%">Nama User</th>
										<th width="20%">Pelanggan</th>
										<th width="20%">Tgl Jual</th>
										<th width="10%">Total</th>
										<th width="20%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$x = 1;
									foreach ($penjualan->result_array() as $i) :
										$kode_jual = $i['kode_jual'];
										$user_name = $i['user_name'];
										$penjualan_id = $i['penjualan_id'];
										$pelanggan_name = $i['pelanggan_name'];
										$sale_date = $i['sale_date'];
									?>
										<tr>
											<td><?php echo $kode_jual; ?></td>
											<td><?php echo $user_name; ?></td>
											<td><?php echo $pelanggan_name; ?></td>
											<td><?php echo $sale_date; ?></td>
											<?php
											$temp = 0;
											foreach ($penjualan1->result_array($data) as $i) {
												$penjualan_id1 = $i['penjualan_id'];
												$total = $i['total_price'];
												if ($penjualan_id == $penjualan_id1) {
													$total = $total + $temp;
													$temp = $total;
												}
											}
											?>
											<td>Rp. <?php echo number_format($temp); ?>,-</td>
											<td>
												<a href="<?= base_url('penjualan/detail_penjualan' . $penjualan_id) ?>" class="btn btn-primary">View</a>
											</td>
										</tr>
									<?php
										$x++;
									endforeach; ?>
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