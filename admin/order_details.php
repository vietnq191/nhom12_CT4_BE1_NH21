<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Orders Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Orders detail</li>
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
        <h3 class="card-title">Total: <?php if (isset($_GET['totalPaid'])) {
                                        echo "$ " . number_format($_GET['totalPaid']);
                                      } else {
                                        echo "0";
                                      }  ?> </h3>
        <hr>
        <?php 
          if (isset($_GET['id_order'])) :
          $dem = 1;
          $getOrderDetails = $orders->getOrderDetails($_GET['id_order']);
        ?>
          <h3 class="card-title">UserName: <?php echo $getOrderDetails[0]['username'] ?> </h3>
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
                Product Name
              </th>
              <th style="width: 20%">
                image
              </th>
              <th style="width: 10%">
                Price
              </th>
              <th style="width: 20%">
                Quantity
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($getOrderDetails as $values) :
            ?>
              <tr>
                <td class="text-center">
                  <?php echo $dem++; ?>
                </td>
                <td class="text-center">
                  <?php echo $values['name'] ?>
                </td>
                <td class="text-center">
                  <img style="width: 100px;" src="../img/<?php echo $values['image1'] ?>" alt="">
                </td>
                <td class="text-center">
                  <?php echo "$" . number_format($values['price']) ?>
                </td>
                <td class="text-center">
                  <?php echo $values['quantity'] ?>
                </td>

              </tr>
          <?php endforeach;
          endif; ?>
          </tbody>
        </table>

      </div>
      <!-- /.card-body -->
      <tr>
        <td>
          <a href="view_orders.php" class="btn btn-secondary">Cancel</a>
        </td>
      </tr>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html" ?>