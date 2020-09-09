 <?php session_start();
	include "db.php";
	// if (isset($_SESSION["ADMINID"])) {
	//     header("Location:handler_home.php");
	// }
	?>
 <!doctype html>
 <html lang="en">

 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">

 	<title>Login - Hiyamee</title>

 	<!-- Stylesheets -->
 	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
 	<link rel="stylesheet" href="css/bootstrap.css">
 	<link rel="stylesheet" href="css/font-awesome.min.css">
 	<link rel="stylesheet" href="css/flexslider.css">
 	<link rel="stylesheet" href="css/style.css">
 	<link rel="stylesheet" href="css/responsive.css">

 	<!--[if IE 9]>
		<script src="js/media.match.min.js"></script>
	<![endif]-->
 </head>

 <body>
 	<div id="main-wrapper">

 		<header id="header" class="header-style-1">


 			<div class="header-nav-bar">
 				<div class="container">

 					<!-- Logo -->
 					<div class="css-table logo">
 						<div class="css-table-cell">
 							<a href="index.html">
 								<img src="img/header-logo.png" alt="">
 							</a> <!-- end .logo -->
 						</div>
 					</div>



 				</div> <!-- end .container -->

 				<div id="mobile-menu-container" class="container">
 					<div class="login-register"></div>
 					<div class="menu"></div>
 				</div>
 			</div> <!-- end .header-nav-bar -->

 			<div class="header-page-title">
 				<div class="container">
 					<h1>Login</h1>

 				</div>
 			</div>
 		</header> <!-- end #header -->

 		<div id="page-content">
 			<div class="container">
 				<div class="row">
 					<div class="col-sm-12 page-content">


 						<div class="white-container sign-up-form">
 							<div>
 								<?php
									if (isset($_POST["login"])) {
										// print_r($_POST);
										$email = $_POST["email"];
										$password = $_POST["password"];
										$password = md5($password);
										$sql = "SELECT * FROM users WHERE `email`='$email' AND `password`='$password'";
										// echo $sql;
										$res = $db->query($sql);
										if ($res->num_rows > 0) {
											$row = $res->fetch_assoc();
											if ($row["user_type"] == 'admin') {
												$_SESSION["ADMINID"] = $row["id"];
												echo "<script>window.open('add.php','_self');</script>";
											} else {
												$_SESSION["RECRUITERID"] = $row["id"];
												echo "<script>window.open('view.php','_self');</script>";
											}
										} else {
											echo "<div class='alert alert-danger' style='background:tomato; color:white;'>Sorry ! Invalid Credentials</div>";
										}
									}

									?>

 								<section>
 									<form action="" method="post">
 										<!-- <h6 class="bottom-line">Personal Info:</h6> -->
 										<div class="col-sm-12">
 											<h6 class="label">Email </h6>

 											<div class="row">
 												<div class="col-sm-12">
 													<input required type="email" name="email" class="form-control" placeholder="Email address">
 												</div>

 											</div>
 										</div>

 										<div class="col-sm-12">

 											<h6 class="label">Password </h6>

 											<div class="row">
 												<div class="col-sm-12">
 													<input required type="password" name="password" class="form-control" placeholder="Password">
 												</div>

 											</div>

 										</div>










 										<div class="row">

 										</div>
 										<hr class="mt60">

 										<div class="clearfix">
 											<div class="col-sm-12">

 												<button type='submit' name="login" class="btn btn-default btn-large pull-right">Login</button>
 											</div>
 										</div>

 									</form>
 								</section>


 							</div>
 						</div> <!-- end .page-content -->
 					</div>
 				</div> <!-- end .container -->
 			</div> <!-- end #page-content -->
 		</div>
 		<!-- <footer id="footer">


			<div class="copyright">
				<div class="container ">
					<p>&copy; Copyright 2020 <a href="#">Hiyamee</a> | All Rights Reserved | Developed by
						<a href="https://nyxwolves.com">Nyx Wolves</a> </p>
				</div>
			</div>
		</footer> end #footer -->

 	</div> <!-- end #main-wrapper -->

 	<!-- Scripts -->
 	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 	<script>
 		window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
 	</script>
 	<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>
 	<script src="js/maplace.min.js"></script>
 	<script src="js/jquery.ba-outside-events.min.js"></script>
 	<script src="js/jquery.responsive-tabs.js"></script>
 	<script src="js/jquery.flexslider-min.js"></script>
 	<script src="js/jquery.fitvids.js"></script>
 	<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
 	<script src="js/jquery.inview.min.js"></script>
 	<script src="js/script.js"></script>

 </body>

 </html>