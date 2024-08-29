<title>Lunar | Chart</title>
<?php include 'navbar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chart</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Chart</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-around">

         <!--  <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='Admin'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Administrators</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="admin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='Staff'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Registered staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
        
          
          <div class="col-md-5 mt-4 card">
              <div class="card-header">
                <canvas id="system_users" style="min-height: 200px; max-height: 200px; max-width: 100%;"></canvas>
              </div>
              <div class="card-footer">
                <h5 class="text-center">System Users</h5>
              </div>
          </div>

          <div class="col-md-5 mt-4 card">
            <a href="detailedPopulation.php">
              <div class="card-header">
                <canvas id="product" style="min-height: 200px; max-height: 200px; max-width: 100%;"></canvas>
              </div>
              <div class="card-footer">
                <h5 class="text-center text-dark">Product info</h5>
              </div>
            </a>
          </div>
          

        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>



<script>
  $(function () {

   // POPULATION ****************************
    var donutChartCanvas = $('#product').get(0).getContext('2d')
    var donutData        = {

    labels: [ 'Sold', 'Received',],
     <?php 
      $sql = mysqli_query($conn, "SELECT count(Id) AS inv_Id FROM inventory GROUP BY prod_Id ");
      $row = mysqli_fetch_array($sql);

      $sql2 = mysqli_query($conn, "SELECT count(Id) AS rec_Id FROM received GROUP BY prod_Id ");
      $row2 = mysqli_fetch_array($sql2);

      echo " datasets: [ 
              { 
                data: [".$row['inv_Id'].", ".$row2['rec_Id']."], 
                backgroundColor : ['#f56954', '#00a65a'],
              } 
             ] ";
      ?>
    }

    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      // type: 'pie',
      data: donutData,
      options: donutOptions
    })





    // AGE *****************************
    var donutChartCanvas = $('#system_users').get(0).getContext('2d')
    var donutData        = {

    labels: [ 'Administrator', 'Staff',],
     <?php 
            $sql = mysqli_query($conn, "SELECT count(user_Id) AS admin FROM users WHERE user_type='Admin' ");
            $row = mysqli_fetch_array($sql);

            $sql2 = mysqli_query($conn, "SELECT count(user_Id) AS staff FROM users WHERE user_type='Staff' ");
            $row2 = mysqli_fetch_array($sql2);

      echo " datasets: [ 
              { 
                data: [".$row['admin'].", ".$row2['staff']."], 
                backgroundColor : ['#f56954', '#00a65a'],
              } 
             ] ";
      ?>
    }

    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      // type: 'pie',
      data: donutData,
      options: donutOptions
    })










  })
</script>