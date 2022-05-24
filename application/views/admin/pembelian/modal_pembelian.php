<div class="modal fade" id="show_buku" role="dialog">
    <div class="modal-dialog modal-lg">
        <form class="form-horizontal" action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div div class="table-responsive">
                        <table class="table table-bordered display" id="datatablesSimple" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Jumlah</th>
                                    <th>Price/pcs</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($book->result_array() as $i) :
                                    $id = $i['book_id'];
                                    $title = $i['title'];
                                    $price = $i['price'];
                                    $discount = $i['discount'];
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <?php
                                        $temp = "";
                                        foreach ($book1->result_array() as $i) :
                                            $id1 = $i['id_masker'];
                                            if ($id == $id1) {
                                                if ($temp != "") {
                                                    $temp = $temp . ',
                                                    &nbsp' . $author;
                                                } else {
                                                    $temp = $author;
                                                }
                                            }
                                        endforeach;
                                        ?>
                                        <td> <?php echo $temp; ?></td>
                                        <?php
                                        $temp = "";
                                        foreach ($book2->result_array() as $i) :
                                            $id1 = $i['id_masker'];
                                            if ($id == $id1) {
                                                if ($temp != "") {
                                                    $temp = $temp . ',
                                                    &nbsp' . $bookcategory;
                                                } else {
                                                    $temp = $bookcategory;
                                                }
                                            }
                                        endforeach;
                                        ?>
                                        <td><?php echo $temp; ?></td>
                                        <td>
                                            <input type="number" name="quantity" id="<?php echo $id; ?>" value="1" class="form-control" style="width: 65px;">
                                        </td>
                                        <td>
                                            <div style="width: 78px;">
                                                <input type="number" name="price_pcs" id="price_pcs<?php echo $id; ?>" value="0" class="form-control" style="width: 75px;">
                                        </td>
                                        <td>
                                            <div style="width: 78px;">
                                                <button class="add_cart btn btn-success btn-block" data-productid="<?= $id; ?>" data-productname="<?= $title; ?>" data-productprice="<?= $price; ?>" data-productdiscount="<?= $discount; ?>">
                                                    <i class="fa fa-cart-plus"></i> Add
                                                </button>
                                            </div>
                                        </td>
                                    </tr> <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="showSupplier" role="dialog">
    <div class="modal-dialog modal-lg">
        <form class="form-horizontal" action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div div class="table-responsive">
                        <table class="table table-bordered display" id="table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <td style="display:none;">id</td>
                                    <th width="30%">Email</th>
                                    <th width="30%">Phone</th>
                                    <th width="25%">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 1;
                                foreach ($supplier->result_array() as $i) :
                                    $id = $i['supplier_id'];
                                    $email = $i['email'];
                                    $phone = $i['phone'];
                                    $address = $i['address'];
                                    $name = $i['name'];
                                ?>
                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td style="display:none;"><?php echo $id; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td> <?php echo $phone; ?></td>
                                        <td> <?php echo $address; ?></td>
                                    </tr>
                                <?php
                                    $x++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>