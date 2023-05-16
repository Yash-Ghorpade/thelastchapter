<?php
     session_start();
    require 'connection.php';
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $cpass = $_POST['cpass'];
                    $phone = $_POST['phone'];
                    $pin = $_POST['pin'];

                    if(empty($_POST['name']))
                    {
                        echo "Please enter Username";
                    }
                    elseif(empty($_POST['realname']))
                    {
                        echo "Please enter Name";
                    }
                    elseif(empty($_POST['email']))
                    {
                        echo "Please enter valid Email";
                    }
                    elseif(empty($_POST['pass']))
                    {
                        echo "Please enter Password";
                    }
                    elseif(empty($_POST['cpass']))
                    {
                        echo "Please enter Password";
                    }
                    elseif((empty($_POST['phone'])) || (($_POST['phone'] < 999999999) || ($_POST['phone'] > 9999999999)))
                    {
                        echo "Please enter valid phone number";
                    }
                    elseif(empty($_POST['pin']))
                    {
                        echo "Please enter valid pincode";
                    }
                    else
                    {
                        $sql="SELECT * FROM `login` WHERE email='$email' or username='$name'";
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
                                $phone = $_POST['phone'];
                                $pin = $_POST['pin'];
                                $realname = $_POST['realname'];
                                $hash = md5($pass);
                                if($pass == $cpass)
                                {
                                    $num=rand(100001, 999999);
                                    $code = strval($num);
                                    $_SESSION['code'] = $code;
                                    $_SESSION['pass'] = $hash;
                                    $_SESSION['email'] = $email;
                                    $_SESSION['name'] = $name;
                                    $_SESSION['realname'] = $realname;
                                    $_SESSION['phone'] = $phone;
                                    $_SESSION['pin'] = $pin;
                                    $msg = "Dear User,\n\t\tYour Verification code for  the account activation is :\n\t\t\t".$code."\nHope te receive good service from you.";
                                    $subject = "Email Verification !!!";
                                    mail($email,$subject,$msg);
                                    header("location:emailverify3.php");
                                }
                                else
                                {
                                    echo "Mismatching passwords ";
                                }
                            }
                        }
                        else
                        {
                            echo "Account with the same username/email exists, try loging in instead!";
                        }
                    }
                }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=c70bd49896dfd10fc3b47752d9a7d8c5">
    <title>ADMIN PANNEL</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="admin.php" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form method=post action=index2.html>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" style="padding-top:25px;margin-left:-5px">
                                    <p><?php require 'connection.php'; $sql =  "select customer_name from customer where login_srno = ".$_SESSION['id'].""; $result = mysqli_query($conn, $sql); $display=mysqli_fetch_array($result); echo $display['customer_name'];?></p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="logout.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                            <!-- <li class="nav-item dropdown header-profile" style="padding-top:12px;margin-left:-20px">
                                <a class="nav-link" href="#">
                                    <p></p>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Actions</span></a>
                        <ul aria-expanded="false">
                            <li><a href="bookEdit.php">Book Details Edit</a></li>
                            <li><a href="addBook.php">Add book</a></li>
                            <li><a href="deleteBook.php">Delete book</a></li>
                            <li><a href="addemp.php">Add employee</a></li>
                            <li><a href="customerHistory.php">Customer Purchase History</a></li>
                            <li><a href="bookHistory.php">Book Rental History</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                                class="nav-text">logout</span></a></li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid" style="display:flex;justify-content:center">
            <div class="wrap-login100" style="margin-bottom:4vh">
				<form class="login100-form validate-form" method='POST' action='addemp.php'>
					<span class="login100-form-title p-b-34 p-t-27">
						NEW EMPLOYEE REGISTRATION
					</span>
                
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="name" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Full name">
						<input class="input100" type="text" name="realname" placeholder="Full Name">
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

                    <div class="wrap-input100 validate-input" data-validate = "Enter phone number">
						<input class="input100" type="text" name="phone" placeholder="Contact no.">
						<span class="focus-input100" data-placeholder="&#xf2b9;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter phone number">
						<input class="input100" type="text" name="pin" placeholder="Preferred Pincode">
						<span class="focus-input100" data-placeholder="&#xf276;"></span>
                    </div>

					<div class="col" style="display:flex;justify-content:center; margin-bottom:4vh;margin-top:5vh">
						<button class="login100-form-btn" type='submit'>
							Add
						</button>
					</div>
				</form>
			</div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="assets/vendor/global/global.min.js"></script>
    <script src="assets/js/quixnav-init.js"></script>
    <script src="assets/js/custom.min.js"></script>

    <script src="assets/vendor/chartist/js/chartist.min.js"></script>

    <script src="assets/vendor/moment/moment.min.js"></script>
    <script src="assets/vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="assets/js/dashboard/dashboard-2.js"></script>
    <!-- Circle progress -->

</body>

</html>