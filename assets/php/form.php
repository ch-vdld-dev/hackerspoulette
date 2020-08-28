<?php
	if (isset($_POST["firstname"], $_POST["lastname"], $_POST["gender"], $_POST["email"], $_POST["message"])) {
/* 	print_r($_POST["submit"]);
	if (isset($_POST["submit"])){ */
		$firstname = utf8_decode(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
		$lastname = utf8_decode(filter_var($_POST['lastname'], FILTER_SANITIZE_STRING));
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$message = $_POST['message'];
		$headers = "From: support@hackerspoulette.com"; 
		$to = $email; 
		$subject = $subject . ' problem from ' . $lastname; 
		if ($gender == "male"){
			$gender = "Mr ";
		}else {
			$gender = "Mrs";
		}
		$bodymsg = "Dear $genter $lastname $firstname, We received a $subject problem. We will contact you within 24 hours\n
		Here the issue you describe: \n
		'$message'";
		// Check if email has been entered and is valid
		if (!$email) {
			$errEmail = 'Please enter a valid email address';
		}
		if (mail ($mail, $subject, $body, $headers)) {
			$result='<div class="alert alert-success">Thank You! We will give you a feedback within 24 hours</div>';
		} else {
			$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
			print_r($mail);
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Feedback</title>
		<link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
              crossorigin="anonymous">
	</head>
	<body>
	    <!-- Header menu -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
        <img src="../img/hackers-poulette-logo.png" width="90" height="90" class="d-inline-block align-center" alt="" loading="lazy">
        Hackers Poulette</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Webshop</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="support">Support<span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
        </nav>

		<h2><?php echo $result?></h2>
	</body>
</html>