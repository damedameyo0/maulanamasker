<div class="modal fade" id="addSupplier" role="dialog">
	<div class="modal-dialog">
		<form class="form" action="<?php echo base_url('admin/Supplier/add'); ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Supplier</h5>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>


				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Supplier Name </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_name" placeholder="" >
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Supplier Email </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_email" placeholder="">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Supplier Number Phone </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_phone" placeholder="" >
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Supplier Address </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_address" placeholder="" >
							</div>
						</div>
					</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
foreach ($supplier->result_array() as $i) :
	$id = $i['supplier_id'];
	$name = $i['name'];
	$email = $i['email'];
	$phone = $i['phone'];
	$address = $i['address'];

	?>
	<div class="modal fade" id="editSupplier<?= $id; ?>" role="dialog">
		<div class="modal-dialog">
			<form class="form" action="<?= base_url('/admin/Supplier/edit/' . $id); ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Supplier</h5>
						<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">


						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label">Supplier Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_name" placeholder="" value="" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label"> Supplier Email </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_email" placeholder="" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label"> Supplier Number Phone </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_phone" placeholder="" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label"> Supplier Address </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_address" placeholder="" required>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</div>
			</form>
		</div>
	</div>	
	<?php
endforeach;
?>

<?php
foreach ($supplier->result_array() as $i) :
	$id = $i['supplier_id'];
	$name = $i['name'];
	$email = $i['email'];
	$phone = $i['phone'];
	$address = $i['address'];
	?>
	<div class="modal fade" id="deleteSupplier<?= $id; ?>" role="dialog">
		<div class="modal-dialog">
			<form class="form" action="<?= base_url('/admin/Supplier\/delete/' . $id); ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Ready to Delete</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"> x </span>
						</button>
					</div>
					<div class="modal-body">
						Pilih "Delete" untuk menghapus Supplier dengan nama <b><?= $name; ?></b>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Delete</button>
					</div>
				</div>
			</form>
		</div>
	</div>	
	<?php
endforeach;
?>