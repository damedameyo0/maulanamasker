<div class="modal fade" id="addLevel" role="dialog">
	<div class="modal-dialog">
		<form class="form" action="<?php echo base_url('/Level/add'); ?>" method="post">
			<div class="modal-content">



				<div class="modal-header">
					<h5 class="modal-title">Add Level</h5>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>



				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Level Name </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_name" placeholder="" required>
							</div>
						</div>
					</div>
				</div>



				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
foreach ($level->result_array() as $i) :
	$id = $i['level_id'];
	$name = $i['name'];
?>
	<div class="modal fade" id="editLevel<?= $id; ?>" role="dialog">

		<div class="modal-dialog">
			<form class="form" action="<?= base_url('/Level/edit/' . $id); ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Level</h5>
						<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label">Level Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_name" placeholder="" value="" required>
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
foreach ($level->result_array() as $i) :
	$id = $i['level_id'];
	$name = $i['name'];
?>
	<div class="modal fade" id="deleteLevel<?= $id; ?>" role="dialog">
		<div class="modal-dialog">
			<form class="form" action="<?= base_url('/Level/delete/' . $id); ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Ready to Delete</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"> x </span>
						</button>
					</div>
					<div class="modal-body">
						Pilih "Delete" untuk menghapus Level dengan nama <b><?= $name; ?></b>
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