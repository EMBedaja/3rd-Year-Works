<title>Inventory System | Inventory info</title>
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
            <h3>New Inventory</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Inventory info</li>
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
                          <a class="h5 text-primary"><b>Inventory information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-9">
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
                        <div class="col-3">
                          <div class="form-group">
                            <span class="text-dark"><b>Price</b></span>
                            <input type="number" class="form-control" placeholder="Price" id="price" readonly>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <span class="text-dark"><b>Quantity sold</b></span>
                            <input type="number" class="form-control" placeholder="Quantity sold" name="qty_sold" id="qtySold" required>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <span class="text-dark"><b>Total price</b></span>
                            <input type="number" class="form-control" placeholder="Total price" name="total_price" id="totalPrice" readonly>
                          </div>
                        </div>
               
                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="inventory.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="create_inventory" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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
  $fetch = mysqli_query($conn, "SELECT * FROM inventory JOIN product ON inventory.prod_Id=product.prod_Id WHERE Id='$Id' ");
  $row = mysqli_fetch_array($fetch);
  $inv_prod_Id = $row['prod_Id'];
  $pr = $row['prod_price'];
  $qty = $row['qty_sold'];
  $total = $row['total'];
?>


  <!-- UPDATE -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3>Update Inventory</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Inventory info</li>
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
            <input type="hidden" class="form-control" name="Id" required value="<?php echo $Id; ?>">
            <div class="card">
              <div class="card-body">
                 <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Inventory information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-9">
                             <div class="form-group">
                                <span class="text-dark"><b>Product name</b></span>
                                <select class="form-control" name="prod_Id" required id="product">
                                  <option selected disabled value="">Select product</option>
                                  <?php 
                                    $p = mysqli_query($conn, "SELECT * FROM product WHERE prod_stock != 0");
                                    if(mysqli_num_rows($p) > 0) {
                                      while($r_p = mysqli_fetch_array($p)) {
                                  ?>
                                    <option value="<?php echo $r_p['prod_Id']; ?>" <?php if($inv_prod_Id == $r_p['prod_Id']) { echo 'selected'; } ?> ><?php echo $r_p['prod_name']; ?></option>
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
                        <div class="col-3">
                          <div class="form-group">
                            <span class="text-dark"><b>Price</b></span>
                            <input type="number" class="form-control" placeholder="Price" id="price" readonly value="<?php echo $pr; ?>">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <span class="text-dark"><b>Quantity sold</b></span>
                            <input type="number" class="form-control" placeholder="Quantity sold" name="qty_sold" id="qtySold" required value="<?php echo $qty; ?>">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <span class="text-dark"><b>Total price</b></span>
                            <input type="number" class="form-control" placeholder="Total price" name="total_price" id="totalPrice" readonly value="<?php echo $total; ?>">
                          </div>
                        </div>
               
                    </div>
              </div>
              <div class="card-footer">
                <div class="float-right">
                  <a href="inventory.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                  <button type="submit" class="btn bg-primary" name="update_inventory" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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


<script>
   $(document).ready(function() {
  $('#product').change(function() {
    var productID = $(this).val();
    document.getElementById("qtySold").value = '';
    document.getElementById("totalPrice").value = '';


    $.ajax({
      url: 'ajax.php',
      type: 'POST',
      data: { product_id: productID },
      success: function(response) {
        var price = response.trim(); // Trim whitespace from the response
        price = parseFloat(price); // Convert the price to a float

        if (!isNaN(price)) {
          $('#price').val(price);
        } else {
          $('#price').val(''); // Clear the price input if the response is invalid
        }
      }
    });
  });
});
 


 // Get the necessary elements
  const priceInput = document.getElementById('price');
  const qtySoldInput = document.getElementById('qtySold');
  const totalPriceInput = document.getElementById('totalPrice');

  // Add an event listener to the quantity sold input
  qtySoldInput.addEventListener('input', updateTotalPrice);

  function updateTotalPrice() {
    const price = parseFloat(priceInput.value);
    const qtySold = parseFloat(qtySoldInput.value);

    // Calculate the total price
    const totalPrice = price * qtySold;

    // Display the total price
    totalPriceInput.value = totalPrice.toFixed(2); // Adjust the number of decimal places as needed
  }
</script>