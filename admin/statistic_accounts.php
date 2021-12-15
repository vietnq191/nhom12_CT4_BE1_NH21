<?php include "header.php" ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Statistic Accounts</h1>
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
          <h3 class="card-title">Total Accounts: <?php echo count($user->getAllUser()); ?></h3>
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
                          STT
                      </th>
                      <th style="width: 20%">
                          Full name
                      </th>
                      <th style="width: 20%">
                          User name
                      </th>
                      <th style="width: 10%">
                          E-mail
                      </th>
                      <th style="width: 20%">
                          Number-phone
                      </th>
                      <th style="width: 15%">
                         Number of orders
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $statisticUsers = $user->statisticUsers();
                  $stt=1;
                  foreach($statisticUsers as $value):
                  ?>
                  <tr>
                  <td class="text-center">
                        <?php echo  $stt++; ?>
                      </td>
                      <td class="text-center">
                        <?php echo $value['name'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo $value['username'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo $value['email'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo $value['phone'] ?>
                      </td>
                      <td class="text-center">
                      <?php echo $value['soLuong'] ?>
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
