<?php
	session_start();
	require 'connection.php';
	$exist = false;
	$ema = false;
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars ($data);
        return $data;
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(empty($_POST['email']))
        {
            $ema = true;
        }
        else{
            $email = test_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $emailErr = "Invalid email format";
                echo $emailErr;
            }
            else
            {
                $email = $_POST['email'];
				$sql = "SELECT * FROM `login` WHERE login_email = '$email'";
				$result = mysqli_query($conn, $sql);
				$num = mysqli_num_rows($result);
				if($num != 0)
				{
					$num=rand(100001, 999999);
					$code = strval($num);
					$_SESSION['code'] = $code;
					$msg = "Dear User,\n\t\tYour Verification code to reset the account password is :\n\t\t\t".$code."\nThank you for registering. Hope you enjoy our services.";
					$subject = "Password Reset !!!";
					mail($email,$subject,$msg);
					$_SESSION['email'] = $email;
					header("location:emailverify2.php");
				}
				else
				{
					$exist=true;
				}
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
    <title>Forgot Password</title>
</head>
<body>
    <div>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/icons/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method='POST' action='forgotPassword.php'>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-book"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Forgot Password
					</span>
					
					<?php if($exist){echo "<div class='alert alert-danger'>Entered email doesn't exist!</div>";} else if($ema) { echo "<div class='alert alert-danger'>Please enter email</div>"; }?>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email ID">
						<input class="input100" type="text" name="email" placeholder=" Email ID">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="col" style="display:flex;justify-content:center">
						<button class="login100-form-btn" type='submit' href="http://localhost/testing/emailverify.php">
							Send OTP
						</button>
						</div>
					</div>
                  </div>
				</form>
			</div>
		</div>
	</div>
    </div>
</body>
</html>