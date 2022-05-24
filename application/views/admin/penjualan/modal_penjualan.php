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
                                    <th>Nama Masker</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($masker->result_array() as $i) :
                                    $id = $i['book_id'];
                                    $title = $i['title'];
                                    $price = $i['price'];
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>
                                            <input type="number" name="quantity" id="<?php echo $id; ?>" value="1" class="form-control" style="width: 65px;">
                                        </td>
                                        <td>
                                            <div style="width: 78px;">
                                                <button class="add_cart btn btn-success btn-block" data-productid="<?php echo $id; ?>" data-productname="<?php echo $title; ?>" data-productprice="<?php echo $price; ?>"><i class="fa fa-cart-plus"></i> Add
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="showCustomer" role="dialog">
    <div class="modal-dialog modal-lg">
        <form class="form-horizontal" action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div div class="table-responsive">
                        <table class="table table-bordered display" id="table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="25%">No.Member</th>
                                    <td style="display:none;">Id</td>
                                    <th width="30%">Name</th>
                                    <th width="25%">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 1;
                                foreach ($customer->result_array() as $i) :
                                    $id = $i['customer_id'];
                                    $name = $i['name'];
                                    $phone = $i['phone'];
                                    $no_member = $i['no_member'];
                                ?>
                                    <tr>
                                        <td><?php echo $no_member; ?></td>
                                        <td style="display:none;"><?php echo $id; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $phone; ?></td>
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