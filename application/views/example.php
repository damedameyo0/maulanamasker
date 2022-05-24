<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
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
					<h1 class="mt-4">Grocery CRUD </h1>
					<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
					<div>
						<a href='<?php echo site_url('examples/customers_management')?>'>Customers</a> |
						<a href='<?php echo site_url('examples/orders_management')?>'>Orders</a> |
						<a href='<?php echo site_url('examples/products_management')?>'>Products</a> |
						<a href='<?php echo site_url('examples/offices_management')?>'>Offices</a> | 
						<a href='<?php echo site_url('examples/employees_management')?>'>Employees</a> |		 
						<a href='<?php echo site_url('examples/film_management')?>'>Films</a> |
						<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a>
						
					</div>
					<div style='height:20px;'></div>  
					<div style="padding: 10px">
						<?php echo $output; ?>
					</div>
					<?php foreach($js_files as $file): ?>
						<script src="<?php echo $file; ?>"></script>
					<?php endforeach; ?>
				</div>
			</main>
			<?php $this->load->view("admin/_partials/footer.php")?>
		</div>
	</div>
	<?php $this->load->view("admin/_partials/modal.php"); ?>
	<?php $this->load->view("admin/_partials/js.php")?>
</body>
</html>