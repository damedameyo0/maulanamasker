<div class="modal fade" id="addBook" role="dialog">
    <div class="modal-dialog">
        <form class="form" action="<?php echo base_url('admin/Book/add'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Book</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>


                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Book Title </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_title" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Book Description </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_description" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Release Year </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_release_year" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Book Page </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_page" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Book Price </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_price" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Book Discount </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_discount" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Book Stock </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_stock" placeholder="">
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
foreach ($book->result_array() as $i) :
    $id = $i['book_id'];
    $title = $i['title'];
    $description = $i['description'];
    $release_year = $i['release_year'];
    $page = $i['page'];
    $price = $i['price'];
    $discount = $i['discount'];
    $stock = $i['stock'];

?>
    <div class="modal fade" id="editBook<?= $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?= base_url('Masker/edit/' . $id); ?>" method="post">
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
                                    <input type="text" class="form-control" name="i_title" placeholder="" value="" required>
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
foreach ($book->result_array() as $i) :
    $id = $i['id_masker'];
    $title = $i['nama_masker'];
    $price = $i['harga_masker'];
    $stock = $i['stok_masker'];
?>

    <div class="modal fade" id="deleteBook<?= $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?= base_url('Masker' . $id); ?>" method="POST">
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