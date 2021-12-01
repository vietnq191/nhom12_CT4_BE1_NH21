<?php include "header.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Protype Edit</h1>
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
  <?php
   if(isset($_GET['type_id'])):
    $getAllProtype = $protype->getAllProtype();
    foreach($getAllProtype as $value):
      if($value['type_id'] == $_GET['type_id']):
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
              <input type="hidden" name="type_id" value="<?php echo $value['type_id'] ?>">
              <div class="form-group">
                <label for="inputName">Protype Name</label>
                <input type="text" id="inputFullName" class="form-control" name="typename" placeholder="Enter Protype Name" value="<?php echo $value['type_name'] ?>" required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="updateProtype" value="Update Protype Name" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <?php endif; endforeach; endif; ?>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html"; ?>