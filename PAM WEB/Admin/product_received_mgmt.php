<title>Inventory System | Product received info</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



<?php if($page === 'create') { ?>

    <!-- CREATION -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>New Product received</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Product received info</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row  d-flex justify-content-center">
          <div class="col-md-8">
            <form action="process_save.php" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Product received information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Supplier name</b></span>
                              <input type="text" class="form-control"  placeholder="Supplier name" name="supplier_name" required>
                          </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Product name</b></span>
                              <select class="form-control" name="prod_Id" required id="product">
                                <option selected disabled value="">Select product</option>
                                <?php 
                                  $p = mysqli_query($conn, "SELECT * FROM product WHERE prod_stock != 0");
                                  if(mysqli_num_rows($p) > 0) {
                                    while($r_p = mysqli_fetch_array($p)) {
                                ?>
                                  <option value="<?php echo $r_p['prod_Id']; ?>"><?php echo $r_p['prod_name']; ?></option>
                                <?php
                                  } }else {
                                ?>
                                  <option>No record found</option>
                                <?php
                                  }
                                ?>
                                
                              </select>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Quantity product received</b></span>
                              <input type="text" class="form-control"  placeholder="Quantity product received" name="qty_received" required>
                            </div>
                        </div>

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="product_received.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="create_product_received" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END CREATION -->









<?php } else { 
  $Id = $page;
  $fetch = mysqli_query($conn, "SELECT * FROM received WHERE Id='$Id'");
  $row = mysqli_fetch_array($fetch);
  $rec_prod_Id = $row['prod_Id'];
?>


  <!-- UPDATE -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3>Update Product received</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Product received info</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8">
          <form action="process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="Id" required value="<?php echo $row['Id']; ?>">
            <div class="card">
              <div class="card-body">
                  <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Product received information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Supplier name</b></span>
                              <input type="text" class="form-control"  placeholder="Supplier name" name="supplier_name" required value="<?php echo $row['supplier_name']; ?>">
                          </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Product name</b></span>
                              <select class="form-control" name="prod_Id" required id="product">
                                <option selected disabled value="">Select product</option>
                                <?php 
                                  $p = mysqli_query($conn, "SELECT * FROM product WHERE prod_stock != 0");
                                  if(mysqli_num_rows($p) > 0) {
                                    while($r_p = mysqli_fetch_array($p)) {
                                ?>
                                  <option value="<?php echo $r_p['prod_Id']; ?>" <?php if($rec_prod_Id == $r_p['prod_Id']) { echo 'selected'; } ?> ><?php echo $r_p['prod_name']; ?></option>
                                <?php
                                  } }else {
                                ?>
                                  <option>No record found</option>
                                <?php
                                  }
                                ?>
                                
                              </select>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Quantity product received</b></span>
                              <input type="text" class="form-control"  placeholder="Quantity product received" name="qty_received" required value="<?php echo $row['qty_received']; ?>">
                            </div>
                        </div>

                    </div>
                  <!-- END ROW -->
              </div>
              <div class="card-footer">
                <div class="float-right">
                  <a href="product_received.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                  <button type="submit" class="btn bg-primary" name="update_product_received" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- END UPDATE -->


<?php } ?>



</div>

<?php } else { include '404.php'; } ?>



<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php';  ?>

