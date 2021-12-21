<?php
if (isset($_GET['type_id'])) {
	include "header.php";
} else {
	header("location: index.php");
}
?>
<!-- Section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

		<?php
			foreach ($getAllProtype as $value) {
				if ($value['type_id'] == $_GET['type_id']) {?>
					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Products of <?php echo $value['type_name'] ?></h3>
						</div>
					</div>
			<?php
				}
			}
			?>

			<!-- product -->
			<?php if (isset($_GET['type_id'])) :
				$type_id = $_GET['type_id'];
				$getProductByTypeId= $product->getProductByTypeId($type_id);
				// hiển thị 8 sản phẩm trên 1 trang
				$perPage = 8;
				// Lấy số trang trên thanh địa chỉ
				$page = isset($_GET['page']) ? $_GET['page'] : 1;
				// Tính tổng số dòng
				$total = count($getProductByTypeId);
				// lấy đường dẫn đến file hiện hành
				$url = $_SERVER['PHP_SELF'];
				$get8ProductBytypeID = $product->get8ProductByID($type_id, $page, $perPage);
				foreach ($get8ProductBytypeID as $value) :
			?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/<?php echo $value['image1'] ?>" width="250" height="200" alt="">
								<div class="product-label">
								</div>
							</div>
							<div class="product-body">
								<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name']?></p>
								<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if(strlen($value['name'])>10){ echo substr($value['name'], 0, 20).'...'; }else{ echo $value['name']; }?></a></h3>
								<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
								<div class="product-rating">
								</div>
							</div>
							<div class="add-to-cart">
								<form class="form-submit" action="action.php" method="">
									<input type="hidden" class="url" name="url" value="<?php echo $_SERVER['SCRIPT_NAME']."?type_id=".$value['type_id'] ?>">
									<input type="hidden" class="pid" name="pid" value="<?php echo $value['id'] ?>">
									<input type="hidden" class="pname" name="pname" value="<?php echo $value['name'] ?>">
									<input type="hidden" class="pprice" name="pprice" value="<?php echo $value['price'] ?>">
									<input type="hidden" class="pimg" name="pimg" value="<?php echo $value['image1'] ?>">
									<input type="hidden" class="pcode" name="pcode" value="<?php echo $value['product_code'] ?>">
									<button class="add-to-cart-btn addItemBtn" type="submit" name="submit"><i class="fa fa-shopping-cart"></i>add to cart</button>
								</form>
							</div>
						</div>
					</div>

			<?php endforeach;
			endif; ?>
			<!-- /product -->

		</div>
		<!-- /row -->
		<!-- store bottom filter -->
		<div class="store-filter clearfix">
			<ul class="store-pagination">
				<?php (isset($_GET['page'])) ? $currentPage = $_GET['page'] : $currentPage = 1; ?>
				<?php echo $product->paginateForTypeid($type_id, $currentPage, $url, $total, $perPage) ?>
			</ul>
		</div>
		<!-- /store bottom filter -->
	</div>
	<!-- /container -->
</div>
<!-- /Section -->

<?php include "footer.php"; ?>