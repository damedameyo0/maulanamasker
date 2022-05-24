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
          <h3>Level</h3>
          <?php $this->load->view("admin/_partials/breadcrumb.php"); ?>
          <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>List Level
              <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLevel"> Add (+) </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="10%">ID</th>
                      <th width="35%">Nama Level</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x = 1;
                    foreach ($level->result_array() as $i) :
                      $id = $i['level_id'];
                      $name = $i['name'];
                    ?>
                      <tr>
                        <td><?php echo $x; ?></td>
                        <td><?php echo $name; ?></td>
                        <td>
                          <a type="button" data-bs-toggle="modal" data-bs-target="#editLevel<?php echo $id; ?>" class="btn btn-primary">Edit</a>
                          <a type="button" data-bs-toggle="modal" data-bs-target="#deleteLevel<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
<?php $this->load->view("admin/level/modal_level.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

</html>