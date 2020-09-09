<?php session_start();
include "db.php";
if (!isset($_SESSION["ADMINID"])) {
	header("Location:index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Add Candidate - Hiyamee</title>

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
					<h1>Sign Up</h1>

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

								if (isset($_POST['submit'])) {
									$sql = "INSERT INTO `candidates` ( `customer`, `recuiter`, `job_title`, `primary_skill`, `candidate_name`, `candidate_email`, `candidate_phone`, `interviewer_name`, `interviewer_phone`, `profile_received`, `scheduled_on`, `interview_status`, `notes`, `reschedule_count`, `interview_outcome`, `created_at`) VALUES ( '{$_POST["customer"]}', '{$_POST["recuiter"]}','{$_POST["job_title"]}','{$_POST["primary_skill"]}','{$_POST["candidate_name"]}','{$_POST["candidate_email"]}','{$_POST["candidate_phone"]}','{$_POST["interviewer_name"]}','{$_POST["interviewer_phone"]}','{$_POST["profile_received"]}','{$_POST["scheduled_on"]}','{$_POST["interview_status"]}','{$_POST["notes"]}','{$_POST["reschedule_count"]}','{$_POST["interview_outcome"]}',current_timestamp());";


									if ($db->query($sql)) {
										echo "<div class='alert alert-danger' style='background:green; color:white;'>Uploaded Successfully !</div>";
									} else {
										echo "<div class='alert alert-danger' style='background:tomato; color:white;'>Sorry ! Something went wrong Please try after some time</div>";
									}
								}

								?>

								<section>
									<form action="" method="post">
										<!-- <h6 class="bottom-line">Personal Info:</h6> -->
										<div class="col-sm-6">
											<h6 class="label">Customer </h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="customer" class="form-control" placeholder="Customer">
												</div>

											</div>
										</div>

										<div class="col-sm-6">

											<h6 class="label">Recuiter </h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="recuiter" class="form-control" placeholder="Recuiter">
												</div>

											</div>

										</div>

										<div class="col-sm-6">
											<h6 class="label">Job Title </h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="job_title" class="form-control" placeholder="Job Title">
												</div>

											</div>

										</div>

										<div class="col-sm-6">
											<h6 class="label">Primary Skill </h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="primary_skill" class="form-control" placeholder="Primary Skill">
												</div>

											</div>
										</div>



										<div class="col-sm-6">

											<h6 class="label">Candidate Name</h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="candidate_name" class="form-control" placeholder="Candidate Name">
												</div>

											</div>

										</div>

										<div class="col-sm-6">

											<h6 class="label">Candidate Email</h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="email" name="candidate_email" class="form-control" placeholder="Candidate Email">
												</div>

											</div>

										</div>

										<div class="col-sm-6">

											<h6 class="label">Candidate Phone</h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="candidate_phone" class="form-control" placeholder="Candidate Phone">
												</div>

											</div>

										</div>



										<div class="col-sm-6">

											<h6 class="label">Interviewer Name</h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="interviewer_name" class="form-control" placeholder="Interviewer Name">
												</div>

											</div>

										</div>


										<div class="col-sm-6">

											<h6 class="label">Interviewer Phone</h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="interviewer_phone" class="form-control" placeholder="Interviewer Phone">
												</div>

											</div>

										</div>

										<div class="col-sm-6">

											<h6 class="label">Profile Received at </h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="datetime-local" name="profile_received" class="form-control" placeholder="Profile Received at ">
												</div>

											</div>

										</div>

										<div class="col-sm-6">

											<h6 class="label">Scheduled On </h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="datetime-local" name="scheduled_on" class="form-control" placeholder="Scheduled On ">
												</div>

											</div>

										</div>

										<div class="col-sm-6">

											<h6 class="label">Interview Status </h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="interview_status" class="form-control" placeholder="Interview Status ">
												</div>

											</div>

										</div>

										<div class="col-sm-6">

											<h6 class="label">Notes </h6>

											<div class="row">
												<div class="col-sm-12">
													<input type="text" name="notes" class="form-control" placeholder="Notes ">
												</div>

											</div>

										</div>

										<div class="col-sm-6">

											<h6 class="label">Reschedule Count </h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="number" min="0" name="reschedule_count" class="form-control" placeholder="Reschedule Count ">
												</div>

											</div>

										</div>


										<div class="col-sm-6">

											<h6 class="label">Interview Outcome</h6>

											<div class="row">
												<div class="col-sm-12">
													<input required type="text" name="interview_outcome" class="form-control" placeholder="Interview Outcome ">
												</div>

											</div>

										</div>




										<div class="row">

										</div>
										<hr class="mt60">

										<div class="clearfix">
											<div class="col-sm-12">

												<button type='submit' name="submit" class="btn btn-default btn-large pull-right">Submit</button>
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