<?php
    session_start();
    require 'connection.php';
                    if($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        if(empty($_POST['otp']))
                        {
                            echo "Please enter otp";
                        }
                        else
                        {
                            $otp = $_POST["otp"];
                            $email = $_SESSION['email'];
                            $pass = $_SESSION['pass'];
                            $name = $_SESSION['name'];
                            if($otp == $_SESSION['code'])
                            {
                                
                                $sql = "INSERT INTO `login` (`login_email`, `login_password`, `login_username`, `login_role`) VALUES ('$email', '$pass', '$name', 'c')";
                                $result = mysqli_query($conn, $sql);
                                session_unset();
                                session_destroy();
                                header("location: login.php"); 
                            }
                            else
                            {
                                echo "Wrong OTP !!!";
                            }
                        }
                    }
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
    <title>Email Verify</title>
</head>
<body>
    <div>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method='POST' action='emailverify.php'>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-book"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Email Verification
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter Verification code">
						<input class="input100" type="text" name="otp" placeholder="Verification Code">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type='submit'>
							Verify
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    </div>
</body>
</html>