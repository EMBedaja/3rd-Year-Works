<title>Lunar | Inventory</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Inventory</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <a href="inventory_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Inventory</a>

                <div class="card-tools mr-1 mt-3">
                 
                </div>
              </div>
              <div class="card-body p-3">

                 <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>PRODUCT NAME</th>
                    <th>DESCRIPTION</th>
                    <th>TYPE</th>
                    <th>PRICE</th>
                    <th>ORIG. STOCK</th>
                    <th>AVAIL. STOCK</th>
                    <th>SOLD</th>
                    <th>DATE SOLD</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM inventory JOIN product ON inventory.prod_Id=product.prod_Id");
                        while ($row = mysqli_fetch_array($sql)) {
                          $orig = $row['prod_stock_orig'];
                          $sold = $row['prod_stock'];
                          $res = $orig - $sold;

                      ?>
                    <tr>
                        <td><?php echo $row['prod_name']; ?></td>
                        <td><?php echo $row['prod_desc']; ?></td>
                        <td><?php echo $row['prod_type']; ?></td>
                        <td>₱ <?php echo number_format($row['prod_price'], 2, '.', ','); ?></td>
                        <td><?php echo $row['prod_stock_orig']; ?></td>
                        <td><?php if($row['prod_stock'] != 0) { echo $row['prod_stock']; } else { echo 'Sold Out'; } ?></td>
                        <td><?php if($row['prod_stock'] != $row['prod_stock_orig']) { echo $res; } ?></td>
                        <td><?php echo date("F d, Y h:i A", strtotime($row['date_created'])); ?></td>
                        <td>
                          <a class="btn btn-info btn-sm" href="inventory_mgmt.php?page=<?php echo $row['Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </td> 
                    </tr>
                    <?php include 'inventory_delete.php'; } ?>
                  </tbody>
                 
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->