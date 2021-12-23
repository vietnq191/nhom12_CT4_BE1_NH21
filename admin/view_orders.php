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
              <th style="width: 8%">
                Order ID
              </th>
              <th style="width: 10%">
                UserName
              </th>
              <th style="width: 15%">
                Name
              </th>
              <th style="width: 8%">
                Phone
              </th>
              <th style="width: 15%">
                Order Date
              </th>
              <th style="width: 10%">
                Payment mode
              </th>
              <th style="width: 8%" class="text-center">
                Amount paid
              </th>
              <th style="width: 8%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
          <?php 
						// hiển thị 5 đơn hàng trên 1 trang
						$perPage = 5;
						// Lấy số trang trên thanh địa chỉ
						$page = isset($_GET['page']) ? $_GET['page'] : 1;
						// Tính tổng số dòng
            $getAllOrders = $orders->getAllOrders();
						$total = count($getAllOrders);
						// lấy đường dẫn đến file hiện hành
						$url = $_SERVER['PHP_SELF'];
						$getOders = $orders->getOrders($page, $perPage);
						foreach ($getOders as $values) :
          ?>
            <tr>
              <td>
                <?php echo $values['order_id'] ?>
              </td>
              <td>
               <?php echo $values['username'] ?>
              </td>
              <td>
               <?php echo $values['fullname'] ?>
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

<!-- store bottom filter -->
<div class="store-filter clearfix">
					<ul class="store-pagination">
						<?php (isset($_GET['page'])) ? $currentPage = $_GET['page'] : $currentPage = 1; ?>
						<?php echo $orders->paginate($currentPage, $url, $total, $perPage) ?>
					</ul>
				</div>
				<!-- /store bottom filter -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html" ?>