<div class="modal fade" id="addPelanggan" role="dialog">
	<div class="modal-dialog">
		<form class="form" action="<?php echo base_url('/Pelanggan/add'); ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Pelanggan</h5>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>


				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Nama Pelanggan </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_name" placeholder="">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Email Pelanggan </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_email" placeholder="">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Gender Pelanggan </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_gender" placeholder="">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> No Handphone Pelanggan </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_phone" placeholder="">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Alamat Pelanggan </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_address" placeholder="">
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
foreach ($pelanggan->result_array() as $i) :
	$id = $i['pelanggan_id'];
	$name = $i['name'];
	$email = $i['email'];
	$gender = $i['gender'];
	$phone = $i['phone'];
	$address = $i['address'];

?>
	<div class="modal fade" id="editPelanggan<?= $id; ?>" role="dialog">
		<div class="modal-dialog">
			<form class="form" action="<?= base_url('/Pelanggan/edit/' . $id); ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Pelanggan</h5>
						<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">


						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label">Nama Pelanggan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_name" placeholder="" value="" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label"> Email Pelanggan </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_email" placeholder="" required>
								</div>
							</div>
						</div>



						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label"> Gender Pelanggan </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_gender" placeholder="" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label"> No Telepon Pelanggan </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_phone" placeholder="" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label"> Alamat Pelanggan </label>
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
foreach ($pelanggan->result_array() as $i) :
	$id = $i['pelanggan_id'];
	$name = $i['name'];
	$email = $i['email'];
	$gender = $i['gender'];
	$phone = $i['phone'];
	$address = $i['address'];
?>
	<div class="modal fade" id="deletePelanggan<?= $id; ?>" role="dialog">
		<div class="modal-dialog">
			<form class="form" action="<?= base_url('/pelanggan/delete/' . $id); ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Ready to Delete</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"> x </span>
						</button>
					</div>
					<div class="modal-body">
						Pilih "Delete" untuk menghapus Pelanggan dengan nama <b><?= $name; ?></b>
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