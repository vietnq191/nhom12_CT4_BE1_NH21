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
            if (isset($_GET['search'])) {
              $keyword = $_GET['search'];
              $getAllProductsSearch = $product->getAllProductsSearch($keyword);
              // hi???n th??? 10 s???n ph???m tr??n 1 trang
              $perPage = 10;
              // L???y s??? trang tr??n thanh ?????a ch???
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              // T??nh t???ng s??? d??ng
              $total = count($getAllProductsSearch);
              // l???y ???????ng d???n ?????n file hi???n h??nh
              $url = $_SERVER['PHP_SELF'];
              $get10Products = $product->get10ProductsSearch($keyword, $page, $perPage);
              foreach ($get10Products as $value) :
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
                    <?php echo "$". number_format($value['price']) ?>
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

              <?php endforeach;
            } else {
              $getAllProducts = $product->getAllProducts();
              // hi???n th??? 10 s???n ph???m tr??n 1 trang
              $perPage = 10;
              // L???y s??? trang tr??n thanh ?????a ch???
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              // T??nh t???ng s??? d??ng
              $total = count($getAllProducts);
              // l???y ???????ng d???n ?????n file hi???n h??nh
              $url = $_SERVER['PHP_SELF'];
              $get10Products = $product->get10Product($page, $perPage);
              foreach ($get10Products as $value) :
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
                    <?php echo "$". number_format($value['price']) ?>
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
            <?php endforeach;
            } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->

         <!-- store bottom filter -->
         <div class="store-filter clearfix">
          <ul class="store-pagination">
            <?php (isset($_GET['page'])) ? $currentPage = $_GET['page'] : $currentPage = 1; ?>
            <?php echo $product->paginate($currentPage, $url, $total, $perPage) ?>
          </ul>
        </div>
        <!-- /store bottom filter -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.html" ?>