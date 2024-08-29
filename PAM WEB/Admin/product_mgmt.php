<title>Inventory System | Product info</title>
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
            <h3>New Product</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Product info</li>
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
                          <a class="h5 text-primary"><b>Product information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Product name</b></span>
                              <input type="text" class="form-control"  placeholder="Product name" name="prod_name" required>
                            </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Product description</b></span>
                              <textarea class="form-control" placeholder="Product description" name="prod_desc" id="" cols="30" rows="3" required></textarea>
                          </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Product type</b></span>
                              <input type="text" class="form-control"  placeholder="Product type" name="prod_type" required>
                            </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Product stock</b></span>
                            <input type="number" class="form-control"  placeholder="Product stock" name="prod_stock" required>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Product price</b></span>
                            <input type="number" class="form-control"  placeholder="Product price" name="prod_price" required>
                          </div>
                        </div>

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="product.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="create_product" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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
  $prod_Id = $page;
  $fetch = mysqli_query($conn, "SELECT * FROM product WHERE prod_Id='$prod_Id'");
  $row = mysqli_fetch_array($fetch);
?>


  <!-- UPDATE -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3>Update Product</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Product info</li>
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
            <input type="hidden" class="form-control" name="prod_Id" required value="<?php echo $row['prod_Id']; ?>">
            <div class="card">
              <div class="card-body">
                  <div class="row">

                      <div class="col-lg-12 mt-1 mb-2">
                        <a class="h5 text-primary"><b>Product information</b></a>
                        <div class="dropdown-divider"></div>
                      </div>
                      <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Product name</b></span>
                              <input type="text" class="form-control"  placeholder="Product name" name="prod_name" required value="<?php echo $row['prod_name']; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Product description</b></span>
                              <textarea class="form-control" placeholder="Product description" name="prod_desc" id="" cols="30" rows="3" required><?php echo $row['prod_desc']; ?></textarea>
                          </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Product type</b></span>
                              <input type="text" class="form-control"  placeholder="Product type" name="prod_type" required value="<?php echo $row['prod_type']; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Product stock</b></span>
                            <input type="number" class="form-control"  placeholder="Product stock" name="prod_stock" required value="<?php echo $row['prod_stock']; ?>">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Product price</b></span>
                            <input type="number" class="form-control"  placeholder="Product price" name="prod_price" required value="<?php echo $row['prod_price']; ?>">
                          </div>
                        </div>

                  </div>
                  <!-- END ROW -->
              </div>
              <div class="card-footer">
                <div class="float-right">
                  <a href="product.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                  <button type="submit" class="btn bg-primary" name="update_product" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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

