<?php require_once('header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian">
						<!--category-productsr-->
						<div class="panel panel-default">
							<?php
							require_once('conn.php');
							$sql = "select * from category";
							$result = $conn->prepare($sql);
							$result->execute();
							if ($result->rowCount() > 0) {
								while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
							?>
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="details.php?cat_id=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a>
										</h4>
									</div>
							<?php  }
							}
							?>
						</div>
					</div>
					<!--/category-products-->
				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Features Items</h2>
					<?php
					require_once('conn.php');
					$sql = "select * from category";
					$result = $conn->prepare($sql);
					$result->execute();
					if ($result->rowCount() > 0) {
						while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img class="black" width="200px" height="250px" src="images/<?php echo $row['img']; ?>" alt="" />
											<h2>$<?php echo $row['price']; ?></h2>
											<p><?php echo $row['category_name']; ?></p>
											<a href="details.php?cat_id=<?php echo $row['category_id']; ?>" class="btn btn-default add-to-cart">Get Started</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $row['price']; ?></h2>
												<p><?php echo $row['category_name']; ?></p>
												<a href="details.php?cat_id=<?php echo $row['category_id']; ?>" class="btn btn-default add-to-cart">Get Started</a>
											</div>
										</div>
										<img src="images/home/new.png" class="new" alt="" />
									</div>

								</div>
							</div>
					<?php  }
					}
					?>
				</div>
				<!--features_items-->
			</div>
		</div>
	</div>
</section>

<?php require_once("footer.php"); ?>