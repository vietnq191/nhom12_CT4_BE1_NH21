<?php
session_start();
if (isset($_SESSION['AdminUsername'])) {
  include "header.php";
} else {
  header("location: login.php");
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
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
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php $sum = $orders->Sum_orders_new();
                  echo $sum[0]['Qty orders']; ?></h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="orders_new.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo count($orders->getAllOrders()); ?></h3>

              <p>Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="view_orders.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <?php $getAllUser = $user->statisticUsers(); ?>
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo count($getAllUser); ?></h3>

              <p>Order of users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="statistic_accounts.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <?php $getAllProduct = $product->getAllProducts(); ?>
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo count($getAllProduct); ?></h3>

              <p>Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="statistic_products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">


        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-xs-6">
              <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
              <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
              <?php $statistical_orders_Month = $orders->statistical_orders_Month(); ?>
              <script>
                var xValues = [<?php
                                $i = 1;
                                $sumCat = count($statistical_orders_Month);
                                foreach ($statistical_orders_Month as $value) {

                                  if ($i == $sumCat) {
                                    $comma = "";
                                  } else {
                                    $comma = ",";
                                  }
                                  echo $value['Month'] . $comma;
                                }
                                ?>];
                var yValues = [<?php
                                $i = 1;
                                $sumCat = count($statistical_orders_Month);
                                foreach ($statistical_orders_Month as $value) {

                                  if ($i == $sumCat) {
                                    $comma = "";
                                  } else {
                                    $comma = ",";
                                  }

                                  echo $value['Qty orders'] . $comma;
                                }
                                ?>];
                var barColors = ["#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8", "#D58BE8"];

                new Chart("myChart", {
                  type: "bar",
                  data: {
                    labels: xValues,
                    datasets: [{
                      backgroundColor: barColors,
                      data: yValues
                    }]
                  },
                  options: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: "Invoice statistics month by month in 2021"
                    }
                  }
                });
              </script>
            </div>
          </div>
        </div>

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.html" ?>