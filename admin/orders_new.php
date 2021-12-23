<?php include "header.php" ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">New Orders</li>
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
          <h3 class="card-title">Total New Orders: <?php $sum = $orders->Sum_orders_new(); echo $sum[0]['Qty orders']; ?></h3>
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
                  <th style="width: 10%">
                          Number
                      </th>
                      <th style="width: 20%">
                          Full name
                      </th>
                      <th style="width: 10%">
                          E-mail
                      </th>
                      <th style="width: 20%">
                          Number-phone
                      </th>
                      <th style="width: 15%">
                          Qty orders of the day
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $ordersNew = $orders->statistical_orders_new();
                  $stt=1;
                  foreach($ordersNew as $value):
                  ?>
                  <tr>
                  <td class="text-center">
                        <?php echo  $stt++; ?>
                      </td>
                      <td class="text-center">
                        <?php echo $value['fullname'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo $value['email'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo $value['phone'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo $value['Qty orders'] ?>
                      </td>
                  </tr>
                  <?php endforeach ?>
              </tbody>
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
