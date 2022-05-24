  <!DOCTYPE html>
  <html>

  <head>
    <?php $this->load->view("admin/_partials/head.php"); ?>
  </head>

  <body class="sb-nav-fixed">
    <?php $this->load->view("admin/_partials/navbar.php"); ?>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <?php $this->load->view("admin/_partials/sidebar.php"); ?>
      </div>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <h3>Pelanggan</h3>
            <?php $this->load->view("admin/_partials/breadcrumb.php"); ?>
            <div class="card mb-4">
              <div class="card-header"><i class="fas fa-table mr-1"></i>List Pelanggan
                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPelanggan"> Add (+) </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="8%">id</th>
                        <th width="20%">name</th>
                        <th width="15%">email</th>
                        <th width="8%">gender</th>
                        <th width="15%">phone</th>
                        <th width="15%">address</th>
                        <th width="15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $x = 1;
                      foreach ($pelanggan->result_array() as $i) :
                        $id = $i['pelanggan_id'];
                        $name = $i['name'];
                        $email = $i['email'];
                        $gender = $i['gender'];
                        $phone = $i['phone'];
                        $address = $i['address'];
                      ?>
                        <tr>
                          <td><?php echo $x; ?></td>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo $gender; ?></td>
                          <td><?php echo $phone; ?></td>
                          <td><?php echo $address; ?></td>
                          <td>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#editPelanggan<?php echo $id; ?>" class="btn btn-primary">Edit
                            </a>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#deletePelanggan<?php echo $id; ?>" class="btn btn-danger">Delete
                            </a>
                          </td>
                        </tr>
                      <?php
                        $x++;
                      endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
        <?php $this->load->view("admin/_partials/footer.php"); ?>
      </div>
    </div>
  </body>
  <?php $this->load->view("admin/_partials/modal.php"); ?>
  <script src="<?php echo base_url('/js/datatables-simple-demo.js') ?>"></script>
  <?php $this->load->view("admin/pelanggan/modal_pelanggan.php") ?>
  <?php $this->load->view("admin/_partials/js.php") ?>

  </html>