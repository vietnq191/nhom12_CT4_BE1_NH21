<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Update Product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="add.php" method="post" enctype="multipart/form-data">
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
              <label for="inputName">Name</label>
              <input name="name" type="text" id="inputName" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputManufacture">Manufacture</label>
              <select name="manu" id="inputManufacture" class="form-control custom-select">
                <option selected disabled>Select one</option>
                <?php
                $getAllManufactures = $manufacture->getAllManufactures();
                foreach ($getAllManufactures as $value) :
                ?>
                  <option value=<?php echo $value['manu_id'] ?>><?php echo $value['manu_name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="inputProtype">Protype</label>
              <select name="type" id="inputProtype" class="form-control custom-select">
                <option selected disabled>Select one</option>
                <?php
                $getAllProtypes = $protype->getAllProtypes();
                foreach ($getAllProtypes as $value) :
                ?>
                  <option value=<?php echo $value['type_id'] ?>><?php echo $value['type_name'] ?></option>
                <?php endforeach ?>

              </select>
            </div>

            <div class="form-group">
              <label for="inputPrice">Price</label>
              <input name="price" type="number" id="inputPrice" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Description</label>
              <textarea name="desc" id="inputDescription" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label for="inputImage">Image</label>
              <input type="file" name="image" id="inputImage" class="form-control">
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="products.php" class="btn btn-secondary">Cancel</a>
        <input name="submit" type="submit" value="Update Product" class="btn btn-success float-right">
      </div>
    </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html" ?>