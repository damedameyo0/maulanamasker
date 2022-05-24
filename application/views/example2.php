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
					<h1 class="mt-4">Grocery Toko Buku</h1>
					<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
					<div>
						<a href='<?php echo site_url('Examples2/Author')?>'>Author</a> |
						<a href='<?php echo site_url('Examples2/Bookcategory')?>'>Book Category</a> |
						<a href='<?php echo site_url('Examples2/Level')?>'>Level</a> |
						<a href='<?php echo site_url('Examples2/Supplier')?>'>Supplier</a> | 
						<a href='<?php echo site_url('Examples2/Customer')?>'>Customer</a> |	
						<a href='<?php echo site_url('Examples2/Book')?>'>Book</a> | 
						
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
			<?php $this->load->view("admin/_partials/footer.php") ?>
		</div>
	</div>
	<?php $this->load->view("admin/_partials/modal.php"); ?>
	<?php $this->load->view("admin/_partials/js.php") ?>
</body>
</html>