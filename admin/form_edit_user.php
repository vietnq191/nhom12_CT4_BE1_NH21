<?php include "header.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Edit User<</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <?php
   if(isset($_GET['user_id'])):
    $getAllUser = $user->getAllUser();
    foreach($getAllUser as $value):
      if($value['user_id']==$_GET['user_id']):
    ?>
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
              <input type="hidden" name="user_id" value="<?php echo $value['user_id'] ?>">
              <div class="form-group">
                <label for="inputName">Full Name</label>
                <input type="text" id="inputFullName" class="form-control" name="fname" placeholder="Enter FullName" value="<?php echo $value['name'] ?>" required>
              </div>
      
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $value['email'] ?>" required>
              </div>
              
              <div class="form-group">
                <label for="">Phone</label>
                <input type="number" id="inputPhone" class="form-control" name="phone" placeholder="Enter Phone" value="<?php echo $value['phone'] ?>" required>
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
          <input type="submit" name="updateUser" value="Update User" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <?php endif; endforeach; else:
    echo "<script>window.location='user.php'</script>";
  endif;?>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html"; ?>