<?php include "header.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Change Password Account For Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="action.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Change Password</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <input type="hidden" name="admin_uname" value="<?php echo $_SESSION["AdminUsername"] ?>">
              <div class="form-group">
                <label for="inputName">Password Old</label>
                <input type="password"  class="form-control" name="oldPass" placeholder="Enter FullName" required>
              </div>
      
              <div class="form-group">
                <label for="">Password New</label>
                <input type="password"  class="form-control" name="newPass" placeholder="Enter Email"  required>
              </div>
              
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password"  class="form-control" name="cfPass" placeholder="Enter Phone"  required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
        <a href="index.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="changePass" value="Change password" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html"; ?>