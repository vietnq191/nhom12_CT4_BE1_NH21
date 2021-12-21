<?php include "header.php" ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
          <h3 class="card-title">Users</h3>

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
                          ID
                      </th>
                      <th style="width: 20%">
                          Full Name
                      </th>
                      <th style="width: 10%">
                          UserName
                      </th>
                      <th style="width: 20%">
                        Password
                      </th>
                      <th style="width: 15%">
                          Email
                      </th>
                      <th style="width: 8%" class="text-center">
                         Phone
                      </th>
                      <th style="width: 20%" class="text-center">
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $getAllUser = $user->getAllUser();
                  foreach($getAllUser as $value):
                  ?>
                  <tr>
                      <td>
                          <?php echo $value['user_id'] ?>
                      </td>
                      <td>
                        <?php echo $value['name'] ?>
                      </td>
                      <td>
                          <?php echo $value['username'] ?>
                      </td>
                      <td>
                      <?php echo $value['password'] ?>
                      </td>
                      <td>
                      <?php echo $value['email'] ?>
                      </td>
                      <td>
                      <?php echo $value['phone'] ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="form_edit_user.php?user_id=<?php echo $value['user_id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="action.php?user_id=<?php echo $value['user_id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
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
