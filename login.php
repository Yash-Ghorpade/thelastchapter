<?php
    
    	session_start();
	if(isset($_SESSION['id']))
	{
		session_unset();
		session_destroy();
	}
	require 'connection.php';
	$flag = false;
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $email = $_POST['name'];
                $pass = $_POST['pass'];
                $sql = "SELECT * FROM `login` WHERE login_email = '$email' or login_username = '$email'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num == 1)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        if($row['login_password'] == md5($pass))
                        {
                            $_SESSION['id'] = $row['login_srno'];
							if($row['login_role'] == 'c')
							{
								header("location:intermediate.php");
							}
							elseif($row['login_role'] == 'e')
							{
							    header("location:employeeDelivery.php");
							}
							elseif($row['login_role'] == 'o')
							{
								header("location:addemp.php");
							}
                        }
                        else
                        {
                            $flag = true;
                        }
                    }
                }
                else{
                    $flag = true;
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
    <title>Login</title>
</head>
<body>
    <div>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/icons/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method='POST' action='login.php'>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-book"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					
					<?php
					if($flag)
					{
                        echo "<div class = 'alert alert-danger'>Incorrect Credentials !!</div>";
                    }
                ?>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="name" placeholder="Email / Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="row">
					<div class="col" style="position:static; display:flex; justify-content:left;">
						<a href="signup.php" style="text-decoration: none;">
						<button class="login100-form-btn" type="button">
							Sign Up
						</button>
						</a>
						<!-- <div class="container-login100-form-btn"> -->
					<div class="col" style="display:flex;justify-content:right">
						<button class="login100-form-btn" type='submit'>
							Login
						</button>
						</div>
					</div>
</div>

					<div class="text-center p-t-50">
						<a class="txt1" href="forgotPassword.php">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    </div>
</body>
</html>