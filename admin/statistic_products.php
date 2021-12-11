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
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr class="text-center">
                      <th style="width: 20%">
                          protypes Name
                      </th>
                      <th style="width: 20%">
                          Quantity
                      </th>
                      <th style="width: 10%">
                          Highest price
                      </th>
                      <th style="width: 20%">
                          Lowest price
                      </th>
                      <th style="width: 15%">
                          Average price
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $statisticProducts = $product->statisticProducts();
                  foreach($statisticProducts as $value):
                  ?>
                  <tr>
                      <td class="text-center">
                        <?php echo $value['type_name'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo $value['Số Lượng'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo number_format($value['Giá cao']) ?>
                      </td>
                      <td class="text-center">
                      <?php echo number_format($value['Giá thấp']) ?>
                      </td>
                      <td class="text-center">
                      <?php echo number_format($value['Giá Trung bình']) ?>
                      </td>
                  </tr>
                  <?php endforeach ?>
              </tbody>
             <tfoot>
               <tr>
                 <td><a href="statistic_chart_products.php" class="btn btn-success" > Show chart</a></td>
               </tr>
             </tfoot>
          </table>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.html" ?>
