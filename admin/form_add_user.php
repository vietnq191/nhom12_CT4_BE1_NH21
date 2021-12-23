<?php include "header.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Add User</li>
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
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Full Name</label>
                <input type="text" id="inputFullName" class="form-control" name="fname" placeholder="Enter FullName" required>
              </div>
       
              <div class="form-group">
                <label for="">User Name</label>
                <input type="text" id="inputUserName" class="form-control" name="username" placeholder="Enter UserName" required>
              </div>
            
              <div class="form-group">
									<label for="inputpassword">Password</label>
										<input type="password" name="password" class="form-control" placeholder="Enter Password"  required>
									</div>

             
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Enter Email" required>
              </div>
              
              <div class="form-group">
                <label for="">Phone</label>
                <input type="number" id="inputPhone" class="form-control" name="phone" placeholder="Enter Phone" required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="user.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="AddOneUser" value="Create new User" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html"; ?>