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
        <h3>Book</h3>
        <?php $this->load->view("admin/_partials/breadcrumb.php"); ?>
        <div class="card mb-4">
          <div class="card-header"><i class="fas fa-table mr-1"></i>List Book
            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBook"> Add (+) </a>
          </div>
          <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
               <thead>
                 <tr>
                   <th width="10%">id</th>
                   <th width="35%">Title</th>
                   <th width="35%">Description</th>
                   <th width="35%">Release Year</th>
                   <th width="35%">Page</th>
                   <th width="35%">Price</th>
                   <th width="35%">Discount</th>
                   <th width="35%">Stock</th>
                   <th width="20%">Action</th>

                 </tr>
               </thead>
               <tbody>
                 <?php
                 $x = 1;
                 foreach ($book->result_array() as $i) :
                  $id = $i['book_id'];
                  $title = $i['title'];
                  $description= $i['description'];
                  $release_year = $i['release_year'];
                  $page = $i['page'];
                  $price = $i['price'];
                  $discount = $i['discount'];
                  $stock = $i['stock'];
                  ?>
                  <tr>
                   <td><?php echo $x; ?></td>
                   <td><?php echo $title; ?></td>
                   <td><?php echo $description; ?></td>
                   <td><?php echo $release_year; ?></td>
                   <td><?php echo $page; ?></td>
                   <td><?php echo $price; ?></td>
                   <td><?php echo $discount; ?></td>
                   <td><?php echo $stock; ?></td>
                   <td>
                     <a type="button" data-bs-toggle="modal" data-bs-target="#editBook<?php echo $id; ?>" class="btn btn-primary">Edit</a>
                     <a type="button" data-bs-toggle="modal" data-bs-target="#deleteBook<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
<?php $this->load->view("admin/penjualan/modal_penjualan.php"); ?> 
<?php $this->load->view("admin/_partials/modal.php"); ?>
<script src="<?php echo base_url('/js/datatables-simple-demo.js') ?>"></script>
<?php $this->load->view("admin/book/modal_book.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
</html>