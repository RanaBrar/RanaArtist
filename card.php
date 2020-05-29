<?php require_once("header.php"); ?>

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>

		</div>
		<div class="row">
			<div class="col-sm-6">
				<form action="card.php" method="post" enctype="multipart/form-data">
					<div class="chose_area signup-form">
						<ul class="user_option">
							<li>
								<label style="margin-right: 30px;" for="Title">Title : </label>
								<input required id="cardTitle" oninput="myTitle()" name="card_title" maxlength="15" type="text">
							</li>
							<li>
								<label for="Title">Phone no.</label>
								<input required maxlength="15" id="cardPh" oninput="myPh()" name="card_ph" type="text">
							</li>
							<li>
								<label style="margin-right: 25px;" for="Title">Email : </label>
								<input required maxlength="20" id="cardEmail" oninput="myEmail()" type="text" name="card_email">
							</li>
							<li>
								<label for="Title">Address : </label>
								<input required id="cardAddress" oninput="myAddress()" name="card_address" type="text">
							</li>
							<input required id="imgInp" type="file" name="card_img" id="">
						</ul>
						<button type="submit" name="submit" class="btn btn-default check_out" href="">Continue</button>
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<script type="text/javascript">
					$(document).ready(function() {
						$('#imgInp').on('change', function() {
							readPath(this);
						});
					});

					function readPath(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function(e) {
								$('#blah').attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
						}
					}
				</script>
				<img class="parent text-center" style="width: 100%;" src="images/Card.png" alt="" srcset="">
				<img id="blah" width="100px" height="100px" src="" class="over-img2 text-center" />
				<div class="card_title">
					<script>
						function myTitle() {
							var x = document.getElementById("cardTitle").value;
							document.getElementById("cTitle").innerHTML = x;
						}
					</script>
					<h3 id="cTitle"></h3>
				</div>
				<div class="ph1">
					<script>
						function myPh() {
							var x = document.getElementById("cardPh").value;
							document.getElementById("cPh").innerHTML = '<i style="margin-right: 6px;" class="fa fa-phone"> </i>' + x;
						}
					</script>
					<h4 id="cPh"></h4>
				</div>
				<div class="email">
					<script>
						function myEmail() {
							var x = document.getElementById("cardEmail").value;
							document.getElementById("cEmail").innerHTML = '<i style="margin-right: 6px;" class="fa fa-envelope"> </i>' + x;
						}
					</script>
					<h5 id="cEmail"></h5>
				</div>
				<div style="width: 170px;" class="email1">
					<script>
						function myAddress() {
							var x = document.getElementById("cardAddress").value;
							document.getElementById("cAddress").innerHTML = '<i style="margin-right: 4px;" class="fa fa-map-marker"></i>' + x;
						}
					</script>
					<h5 style="word-wrap: break-word;" id="cAddress"> </h5>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/#do_action-->

<?php require_once("footer.php"); ?>
<?php
if (isset($_POST['submit'])) {
	$cat_id = 3;
	$cname = "Visiting Cards";
	$price = 150;
	$card_title = $_POST['card_title'];
	$card_ph = $_POST['card_ph'];
	$card_address = $_POST['card_address'];
	$card_email = $_POST['card_email'];
	$img1 = $_FILES['card_img']['name'];
	$type = $_FILES['card_img']['type'];
	$random = rand(0, 999999999);
	$img = $random;
	$temp = $_FILES['card_img']['tmp_name'];
	move_uploaded_file($temp, "images/$img");

	if (isset($_SESSION['cardorder'])) {
		$count = count($_SESSION["cardorder"]);
		$item_array = array(
			'user_id' => $_SESSION['user_id'],
			'cat_id' => $cat_id,
			'cname' => $cname,
			'qty' => 1,
			'id' => $count,
			'price' => $price,
			'card_title' => $card_title,
			'card_ph' => $card_ph,
			'card_email' => $card_email,
			'card_address' => $card_address,
			'img' => $img,
		);
		$_SESSION["cardorder"][$count] = $item_array;
		echo "<script>
        window.location.assign('cart.php');
        </script>";
	} else {
		$item_array = array(
			'user_id' => $_SESSION['user_id'],
			'cat_id' => $cat_id,
			'cname' => $cname,
			'qty' => 1,
			'id' => 0,
			'price' => $price,
			'card_title' => $card_title,
			'card_ph' => $card_ph,
			'card_email' => $card_email,
			'card_address' => $card_address,
			'img' => $img,
		);
		$_SESSION["cardorder"][0] = $item_array;
		echo "<script>
        window.location.assign('cart.php');
        </script>";
	}
}
?>