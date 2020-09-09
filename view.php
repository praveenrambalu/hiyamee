<?php session_start();
include "db.php";
if (!isset($_SESSION["RECRUITERID"])) {
	header("Location:index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Candidates - Hiyamee</title>

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
					<h1>Candidates</h1>

				</div>
			</div>
		</header> <!-- end #header -->

		<div id="page-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 page-content">
						<!-- <div class="white-container candidates-search">
							<div class="row">
								<div class="col-sm-5">
									<input type="text" class="form-control" placeholder="Location">
								</div>

								<div class="col-sm-5">
									<input type="text" class="form-control" placeholder="Industry / Role">
								</div>

								<div class="col-sm-2">
									<input type="submit" class="btn btn-default btn-block" value="Search">
								</div>
							</div>
						</div> -->

						<div class="title-lines">
							<h3 class="mt0">Available Candidates</h3>
						</div>

						<?php
						$sql = "SELECT * FROM candidates";
						if ($res = $db->query($sql)) {

							if ($res->num_rows > 0) {
								while ($row = $res->fetch_assoc()) {
									echo "<div class='candidates-item'>

										<h6 class='title text-uppercase' style='text-transform:uppercase;'><a href='#'>{$row["candidate_name"]}</a></h6>
										<span class='meta'>{$row["job_title"]} - {$row["primary_skill"]}</span>
										<p class='description'>
											<ul class='list-unstyled'>
												<li><strong>Customer:</strong> {$row["customer"]}</li>
												<li><strong>Recruiter:</strong> {$row["recuiter"]}</li>
												<li><strong>Interview Status:</strong> {$row["interview_status"]}</li>
												<li><strong>Interview Outcome:</strong> {$row["interview_outcome"]}</li>
											</ul>
										</p>
										<ul class='top-btns'>
											<li><a href='#' class='btn btn-gray fa fa-plus toggle'></a></li>
										</ul>
			
			
			
										<div class='clearfix'></div>
			
										<div class='content'>
			
			
											<ul class='list-unstyled'>
												<li><strong>Candidate Email:</strong> {$row["candidate_email"]}</li>
												<li><strong>Candidate Phone No:</strong> {$row["candidate_phone"]}</li>
												<li><strong>Interviewer Name:</strong> {$row["interviewer_name"]}</li>
												<li><strong>Interviewer Phone No:</strong> {$row["interviewer_phone"]}</li>
												<li><strong>Profile Received On:</strong> {$row["profile_received"]}</li>
												<li><strong>Scheduled On:</strong> {$row["scheduled_on"]}</li>
												<li><strong>Notes:</strong> {$row["notes"]}</li>
												<li><strong>Reschedule Count:</strong> {$row["reschedule_count"]}</li>
											</ul>
			
			
			
			
			
											<hr>
			
											<div class='clearfix'>
												<a href='mailto:{$row["candidate_email"]}' class='btn btn-default pull-left'><i class='fa fa-envelope-o'></i>
													Contact Candidate</a>
			
											</div>
										</div>
									</div>";
								}
							} else {
								echo "<div class='alert alert-danger' style='background:tomato; color:white;'>Sorry ! No Records Found</div>";
							}
						} else {
							echo "<div class='alert alert-danger' style='background:tomato; color:white;'>Sorry ! Something went wrong Please try after some time</div>";
						}


						?>





					</div>
				</div>
			</div> <!-- end .container -->
		</div> <!-- end #page-content -->

		<footer id="footer">


			<div class="copyright">
				<div class="container ">
					<p>&copy; Copyright 2020 <a href="#">Hiyamee</a> | All Rights Reserved | Developed by
						<a href="https://nyxwolves.com">Nyx Wolves</a> </p>
				</div>
			</div>
		</footer> <!-- end #footer -->

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