<?php include "header.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Manufacture</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Edit Manufacture</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <?php
   if(isset($_GET['manu_id'])):
    $getAllManufactures = $manufacture->getAllManufactures();
    foreach($getAllManufactures as $value):
      if($value['manu_id'] == $_GET['manu_id']):
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
              <input type="hidden" name="manu_id" value="<?php echo $value['manu_id'] ?>">
              <div class="form-group">
                <label for="inputName">Manufacture Name</label>
                <input type="text" id="inputName" class="form-control" name="manu_name" placeholder="Enter Manufacture Name" value="<?php echo $value['manu_name'] ?>" required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="manufactures.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="updateManufacture" value="Update Manufacture Name" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <?php endif; endforeach; else:
    echo "<script>window.location='manufactures.php'</script>";
  endif;?>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html"; ?>