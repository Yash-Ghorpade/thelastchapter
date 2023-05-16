<?php
	session_start();
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="icon" type="image/png" href="assets/img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <title>Order placed</title>
</head>
<body>
    <div>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/icons/bg-01.jpg');">
			<div class="" style="background-color:rgb(67, 181, 97); border-radius:40px; width:100vh">
			    <br></br>
				<form class="login100-form validate-form" action='bookFinder.php'>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-check-circle"></i>
					</span>
                        
					<span class="login100-form-title p-b-34 p-t-27">
						Your order has been placed successsfully
					</span>

					<div class="col" style="display:flex;justify-content:center">
						<button class="login100-form-btn" type='submit' href="bookFinder.php">
							Go back
						</button>
						</div>
						<br></br>
				</form>
			</div>
		</div>
	</div>
    </div>
</body>
</html>