<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
  <form class="form-inline my-2 my-lg-0">
      <input style="width: 80%;" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button style="width: 19%;" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <hr>
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Products</h3>
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
              <th style="width: 5%">
                Name
              </th>
              <th style="width: 10%">
                Image
              </th>
              <th style="width: 20%">
                Description
              </th>
              <th style="width: 10%">
                Price
              </th>
              <th style="width: 8%" class="text-center">
                Manufacture
              </th>
              <th style="width: 8%" class="text-center">
                Protype
              </th>
              <th style="width: 5%">
              Feature
              </th>
              <th style="width: 8%">
              Created at	
              </th>
              <th style="width: 15%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProducts = $product->getAllProducts();
            foreach ($getAllProducts as $value) :
            ?>
              <tr>
                <td>
                  <?php echo $value['id'] ?>
                </td>
                <td>
                  <?php echo $value['name'] ?>
                </td>
                <td>
                  <img style="width: 50px;" src="../img/<?php echo $value['image1'] ?>" alt="">
                </td>
                <td>
                  <?php if (strlen($value['description']) > 50) {
                    echo substr($value['description'], 0, 100) . '...';
                  } else {
                    echo $value['description'];
                  } ?>
                </td>
                <td>
                  <?php echo number_format($value['price']) . " VNĐ" ?>
                </td>
                <td>
                  <?php echo $value['manu_name'] ?>
                </td>
                <td>
                  <?php echo $value['type_name'] ?>
                </td>
                <td>
                  <?php echo $value['feature'] ?>
                </td>
                <td>
                  <?php echo $value['created_at'] ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="edit-product.php?id=<?php echo $value['id'] ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="del.php?id=<?php echo $value['id'] ?>">
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