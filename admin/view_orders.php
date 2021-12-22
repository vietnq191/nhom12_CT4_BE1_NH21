<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Orders</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <hr>
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Total Orders: <?php echo count($orders->getAllOrders()); ?></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                STT
              </th>
              <th style="width: 5%">
                UserName
              </th>
              <th style="width: 10%">
                Phone
              </th>
              <th style="width: 20%">
                Order Date
              </th>
              <th style="width: 10%">
                Payment mode
              </th>
              <th style="width: 8%" class="text-center">
                Amount paid
              </th>
              <th style="width: 15%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
          <?php $getAllOrder=$orders->getAllOrders(); $dem =1;
          foreach($getAllOrder as $values):
          ?>
            <tr>
              <td>
                <?php echo $dem++; ?>
              </td>
              <td>
               <?php echo $values['username'] ?>
              </td>
              <td>
              <?php echo $values['phone'] ?>
              </td>
              <td>
              <?php echo $values['order_date'] ?>
              </td>
              <td>
              <?php echo $values['payment_mode'] ?>
              </td>
              <td class="project-actions text-center">
              <?php echo "$". number_format($values['amount_paid'])  ?>
              </td>

              <td class="project-actions text-center">
                <a class="btn btn-success btn-sm" href="order_details.php?id_order=<?php echo $values['order_id']?>&totalPaid=<?php echo $values['amount_paid'] ?>">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Details
                </a>

              </td>
            </tr>
            <?php endforeach; ?>
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