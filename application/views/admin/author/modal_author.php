<div class="modal fade" id="addAuthor" role="dialog">
	<div class="modal-dialog">
		<form class="form" action="<?php echo base_url('/admin/author/add'); ?>" method="post">
			<div class="modal-content">



				<div class="modal-header">
					<h5 class="modal-title">Add Author</h5>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>



				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Author's Fullname </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_fullname" placeholder="" required>
							</div>
						</div>
					</div>



					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label"> Author's Email </label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="i_email" placeholder="" required>
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
foreach ($author->result_array() as $i) :
	$id = $i['author_id'];
	$fullname = $i['fullname'];
	$email = $i['email'];
	?>
	<div class="modal fade" id="editAuthor<?= $id; ?>" role="dialog">
		
		<div class="modal-dialog">
			<form class="form" action="<?= base_url('/admin/author/edit/' . $id); ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Author</h5>
						<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label">Author's Fullname</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_fullname" placeholder="" value="" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label"> Author's Email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="i_email" placeholder="Markzurkeberg@gmail.com" value="<?= $email; ?>" required>
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
foreach ($author->result_array() as $i) :
	$id = $i['author_id'];
	$fullname = $i['fullname'];
	$email = $i['email'];
	?>
	<div class="modal fade" id="deleteAuthor<?= $id; ?>" role="dialog">
		<div class="modal-dialog">
			<form class="form" action="<?= base_url('/admin/author/delete/' . $id); ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Ready to Delete</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"> x </span>
						</button>
					</div>
					<div class="modal-body">
						Pilih "Delete" untuk menghapus Author dengan nama <b><?= $fullname; ?></b>
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