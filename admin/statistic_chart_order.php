<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Statistic</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Statistic</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Statistic orders by month</h3>
      </div>
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
              var barColors = ["green", "green", "green", "green", "green", "green", "green", "green", "green", "green", "green", "green"];

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


      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html" ?>