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
        <h3 class="card-title">Statistic Product</h3>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-6">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <div id="myChart" style="width:100%; max-width:600px; height:500px;">
      </div>
    <?php $statisticProducts = $product->statisticProducts(); ?>
      <script>
        google.charts.load('current', {
          'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Thống kê hàng hoá'],
            
            <?php
              $i = 1;
              $sumCat = count($statisticProducts);
              foreach($statisticProducts as $value){

                if($i==$sumCat)
                {
                  $comma = "";
                }else{
                  $comma = ",";
                }

                echo " ['".$value['type_name']."', ".$value['Số Lượng']."]".$comma;
              }
            ?>
          ]);

          var options = {
            title: 'Product statistics chart',
            width: 800,
            height : 500,
          };

          var chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);
        }
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