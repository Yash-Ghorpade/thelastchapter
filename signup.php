<?php
    session_start();
    require 'connection.php';
    $usrerr = false;
         $exist = false;
         $passerr = false;
         $emerr = false;
         
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars ($data);
        return $data;
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
         
        $email = $_POST['email'];
        $sql="SELECT * FROM `login` WHERE login_username='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if(empty($_POST['name']))
        {
            $usrerr = true;
        }
        elseif($result && $num > 0)
        {
            $exist = true;
        }
        elseif(empty($_POST['pass']))
        {
            $passerr = true;
        }
        elseif(empty($_POST['cpass']))
        {
            $passerr = true;
        }
        elseif(empty($_POST['email']))
        {
            $emerr = true;
        }
        else
        {
            $name = $_POST['name'];
            $sql="SELECT * FROM `login` WHERE login_email='$email' or login_username='$name'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 0)
            {
                $email = test_input($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    $emailErr = "Invalid email format";
                    echo $emailErr;
                }
                else
                {
                    $name = $_POST['name'];
                    $pass = $_POST['pass'];
                    $cpass = $_POST['cpass'];
                    $hash = md5($pass);
                    if($pass == $cpass)
                    {
                        $num=rand(100001, 999999);
                        $code = strval($num);
                        $_SESSION['code'] = $code;
                        $_SESSION['pass'] = $hash;
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $name;
                        $msg = "Dear User,\n\t\tYour Verification code for  the account activation is :\n\t\t\t".$code."\nThankyou for registering. Hope you enjoy our services.";
                        $subject = "Email Verification !!!";
                        mail($email,$subject,$msg);
                        header("location:emailverify.php");
                    }
                    else
                    {
                        echo "Mismatching passwords ";
                    }
                }
            }
            else
            {
                $exist = true;
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
    <title>Sign Up</title>
</head>
<body>
    <div>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/icons/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method='POST' action="signup.php">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-book"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Sign Up
					</span>
					
					<?php
					if($usrerr)
					{
                        echo "<div class = 'alert alert-danger'>Please enter Username</div>";
                    }
                    else if($emerr)
                    {
                         echo "<div class = 'alert alert-danger'>Please enter Email</div>";
                    }
                    else if($exist)
                    {
                         echo "<div class = 'alert alert-danger'>Account with same username/email exists, try using different username or try loging in instead</div>";
                    }
                    else if($passerr)
                    {
                         echo "<div class = 'alert alert-danger'>Please enter Password</div>";
                    }
                ?>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="name" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password to confirm again">
						<input class="input100" type="password" name="cpass" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <div class="row" style="margin-top:8vh;margin-bottom:3vh">
                    <div class="col" style="position:static; display:flex; justify-content:left;">
                        <a href="login.php" style="text-decoration: none;">
                            <button class="login100-form-btn" type="button">
                                Login instead
                            </button>
                        </a>
                        <div class="col" style="display:flex;justify-content:right">
                            <button class="login100-form-btn" type='submit'>
                                Sign Up
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