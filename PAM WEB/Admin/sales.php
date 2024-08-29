<title>Lunar | Sales </title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Sales</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
                <!-- <a href="inventory_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Inventory</a> -->

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">

                 <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>PRODUCT NAME</th>
                    <th>PRICE</th>
                    <th>SOLD</th>
                    <th>SUBTOTAL</th>
                    <th>DATE SOLD</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sum = mysqli_query($conn, "SELECT SUM(total) as grand_total FROM inventory");
                        $r_sum = mysqli_fetch_array($sum);
                        $sql = mysqli_query($conn, "SELECT * FROM inventory JOIN product ON inventory.prod_Id=product.prod_Id ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $orig = $row['prod_stock_orig'];
                          $sold = $row['prod_stock'];
                          $price = $row['prod_price'];
                          $res = $orig - $sold;
                      ?>
                    <tr>
                        <td><?php echo $row['prod_name']; ?></td>
                        <td>₱ <?php echo number_format($row['prod_price'], 2, '.', ','); ?></td>
                        <td><?php echo $row['qty_sold']; ?></td>
                        <td>₱ <?php echo number_format($row['total'], 2, '.', ','); ?></td>
                        <td><?php echo date("F d, Y h:i A",strtotime($row['date_created'])) ?></td>
                    </tr>
                    <?php include 'inventory_delete.php'; } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="3"></th>
                      <th>₱ <?php echo number_format($r_sum['grand_total'], 2, '.', ','); ?></th>
                      <th></th>
                    </tr>
                  </tfoot>
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