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
  <?php
   if(isset($_GET['id'])):
    $getAllProducts = $product->getAllProducts();
    foreach($getAllProducts as $valueProduct):
      if($valueProduct['id'] == $_GET['id']):
    ?>
  <section class="content">
    <form action="edit.php" method="post" enctype="multipart/form-data">
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
          <input type="hidden" name="id" value="<?php echo $valueProduct['id'] ?>">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input name="name" type="text" id="inputName" class="form-control" required value="<?php echo $valueProduct['name'] ?>">
            </div>
            <div class="form-group">
              <label for="inputManufacture">Manufacture</label>
              <select name="manu" id="inputManufacture" class="form-control custom-select" required>
                <option selected disabled value="">Select one</option>
                <?php
                $getAllManufactures = $manufacture->getAllManufactures();
                foreach ($getAllManufactures as $value) :
                ?>
                  <option value="<?php echo $value['manu_id'] ?>" <?php if($value['manu_id']==$valueProduct['manu_id']) echo "selected='selected'" ?>><?php echo $value['manu_name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="inputProtype">Protype</label>
              <select name="type" id="inputProtype" class="form-control custom-select" required>
                <option selected disabled value="">Select one</option>
                <?php
                $getAllProtypes = $protype->getAllProtypes();
                foreach ($getAllProtypes as $value) :
                ?>
                  <option value=<?php echo $value['type_id'] ?> <?php if($value['type_id']==$valueProduct['type_id']) echo "selected='selected'" ?>><?php echo $value['type_name'] ?></option>
                <?php endforeach ?>

              </select>
            </div>
            <div class="form-group">
              <label for="inputPrice">Price</label>
              <input name="price" type="number" id="inputPrice" class="form-control" required value="<?php echo $valueProduct['price'] ?>" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
            </div>
            <div class="form-group">
              <label for="inputDescription">Description</label>
              <textarea name="desc" id="inputDescription" class="form-control" rows="4"><?php echo $valueProduct['description'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="inputImage1">Image 1</label>
              <input type="file" name="image1" id="inputImage1" class="form-control" accept="image/png, image/jpeg" onchange="validateFileType('inputImage1')"/>
            </div>
            <div class="form-group">
              <label for="inputImage2">Image 2</label>
              <input type="file" name="image2" id="inputImage2" class="form-control" accept="image/png, image/jpeg" onchange="validateFileType('inputImage2')"/>
            </div>
            <div class="form-group">
              <label for="inputImage3">Image 3</label>
              <input type="file" name="image3" id="inputImage3" class="form-control" accept="image/png, image/jpeg" onchange="validateFileType('inputImage3')"/>
            </div>
            <div class="form-group">
              <label for="inputImage4">Image 4</label>
              <input type="file" name="image4" id="inputImage4" class="form-control" accept="image/png, image/jpeg" onchange="validateFileType('inputImage4')"/>
            </div>
            <div class="form-group">
              <label for="inputFeature">Feature</label>
              <select name="feature" id="inputFeature" class="form-control custom-select" required>
                <option selected disabled value="">Select one</option>
                <option value=1 <?php if($valueProduct['feature']==1) echo "selected='selected'" ?>>Yes</option>
                <option value=0 <?php if($valueProduct['feature']==0) echo "selected='selected'" ?>>No</option>
              </select>
          </div>
          <div class="form-group">
              <label for="inputCreatedAt">Created at</label>
              <input type="date" id="inputCreatedAt" name="createdAt" value="<?php echo date('Y-m-d',strtotime($valueProduct['created_at'])); ?>" min="2000-01-01" max="<?php echo date('Y-m-d'); ?>">
          </div>
          <div class="form-group">
              <label for="inputDimensions">Dimensions</label>
              <input type="text" id="inputDimensions" name="dimensions" class="form-control" value="<?php echo $valueProduct['dimensions'] ?>">
          </div>
          <div class="form-group">
              <label for="inputDisplay_Size">Display size</label>
              <input type="text" id="inputDisplay_Size" name="displaySize" class="form-control" value="<?php echo $valueProduct['display_size'] ?>">
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
        <input name="submit" type="submit" value="Update Product" class="btn btn-success float-right">
      </div>
    </div>
    </form>
  </section> 
  <!-- /.content -->
  <?php endif; endforeach; else:
    echo "<script>window.location='products.php'</script>";
  endif;?>
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">

    function validateFileType(name){
        var fileName = document.getElementById(name).value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById(name).value = "";
        }   
    }
</script>

<?php include "footer.html" ?>