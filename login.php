<?php session_start();

if (isset($_SESSION['user_id'])) {
	echo '<script>
    window.location.assign("index.php");
    </script>';
}
?>
<!DOCTYPE php>
<php lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Home | Rana</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<!--[if lt IE 9]>
    <script src="js/php5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<!--/head-->

	<body>
		<header id="header">
			<!--header-->
			<div class="header_top">
				<!--header_top-->
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="contactinfo">
								<ul class="nav nav-pills">
									<li><a href="#"><i class="fa fa-phone"></i>7814803099</a></li>
									<li><a href="#"><i class="fa fa-envelope"></i> rana167326@gmail.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/header_top-->
		</header>
		<!--/header-->
		<section id="">
			<!--form-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
						<div class="login-form">
							<!--login form-->
							<h2>Login to your account</h2>
							<form method="post" action="login.php">
								<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

								<button type="submit" name="login" value="login" class="btn btn-default">Login</button>
							</form>
						</div>
						<!--/login form-->
					</div>
					<div class="col-sm-1">
						<h2 class="or">OR</h2>
					</div>
					<div class="col-sm-4">
						<div class="signup-form">
							<!--sign up form-->
							<h2>New User Signup!</h2>
							<form method="post" action="login.php">
								<input required type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User Name">
								<input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
								<input required type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone no.">


								<select style="margin-bottom: 6px;" class="form-control" required name="country">
									<option selected disabled value="">---Select Country---</option>
									<?php
									require_once('conn.php');
									$sql21 = "select * from countries";
									$result21 = $conn->prepare($sql21);
									$result21->execute();

									while ($row21 = $result21->fetch(PDO::FETCH_ASSOC)) {


									?>
										<option value="<?php
														echo $row21["country_name"]; ?>">
											<?php
											echo $row21["country_name"]; ?></option>
									<?php

									}


									?>
								</select>

								<select style="margin-bottom: 6px;" class="form-control" required name="state">
									<option selected disabled value="">---Select State---</option>
									<?php
									require_once('conn.php');
									$sql2 = "select * from state_list";
									$result2 = $conn->prepare($sql2);
									$result2->execute();

									while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {


									?>
										<option value="<?php
														echo $row2["state"]; ?>">
											<?php
											echo $row2["state"]; ?></option>
									<?php

									}


									?>
								</select>
								<input required type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter City">
								<input required type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
								<input required type="text" name="pincode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Pincode">
								<input required type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								<button type="submit" name="reg" value="reg" class="btn btn-default">Signup</button>
							</form>
						</div>
						<!--/sign up form-->
					</div>
				</div>
			</div>
		</section>
		<!--/form-->


		<?php include('footer.php'); ?>
		<?php
		if (isset($_POST['login'])) {
			if (empty($_POST['email']) || empty($_POST['password'])) {
				echo "Fill All Feilds !!!";
			} else {
				$email = $_POST['email'];
				$password = md5($_POST['password']);

				$sql = "select * from user where email = ? and password = ?";
				$result = $conn->prepare($sql);
				$result->execute(array($email, $password));
				if ($result->rowCount() > 0) {
					$row = $result->fetch(PDO::FETCH_ASSOC);
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['username'] = $row['username'];
					echo '<script>
            window.location.assign("index.php");
            </script>';
				} else {
					echo "Record Not Found";
				}
			}
		}
		?>
		<?php
		if (isset($_POST['reg'])) {
			$username = $_POST['username'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$country = $_POST['country'];
			$state = $_POST['state'];
			$city = $_POST['city'];
			$address = $_POST['address'];
			$pincode = $_POST['pincode'];
			$password = md5($_POST['password']);
			require_once('conn.php');
			$sql = "select * from user where email = ?";
			$result = $conn->prepare($sql);
			$result->execute(array($email));
			if ($result->rowCount() > 0) {
				echo '<script>
                alert("Email Already exist");
            window.location.assign("login.php");
            </script>';
			} else {
				print_r($_POST);
				$sql1 = "INSERT INTO user (username,password,email,address,city,phone,country,state,pincode) VALUE (?,?,?,?,?,?,?,?,?)";
				$result1 = $conn->prepare($sql1);
				if ($result1->execute(array($username, $password, $email, $address, $city, $phone, $country, $state, $pincode))) {
					echo "<script>
                    alert('Registred');
                    window.location.assign('login.php');
                    </script>";
				}
			}
		}
		?>