<div class="modal fade" id="addMasker" role="dialog">
    <div class="modal-dialog">
        <form class="form" action="<?php echo base_url('masker/add'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Masker
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Nama Masker </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_title" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Masker Price </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="i_price" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Masker Stock </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="i_stock" placeholder="">
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
foreach ($masker->result_array() as $i) :
    $id = $i['id_masker'];
    $title = $i['title'];
    $price = $i['price'];
    $stock = $i['stock'];

?>
    <div class="modal fade" id="editMasker<?= $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?= base_url('/Masker/edit/' . $id); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Masker</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label">Nama Masker</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_title" placeholder="" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Harga Masker </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_price" placeholder="" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Stok Masker </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_stock" placeholder="" required>
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
foreach ($masker->result_array() as $i) :
    $id = $i['id_masker'];
    $title = $i['title'];
    $price = $i['price'];
    $stock = $i['stock'];
?>

    <div class="modal fade" id="deleteMasker<?= $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?= base_url('/Masker/delete/' . $id); ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ready to Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> x </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Pilih "Delete" untuk menghapus masker dengan nama <b><?= $title; ?></b>
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