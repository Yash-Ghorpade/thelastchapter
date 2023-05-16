<?php
session_start();
    require 'connection.php';
    // $sql = "select * from customer inner join issue on issue.customer_srno = issue.customer_srno where customer_srno = '".$_SESSION['id']."'";
    // $result = mysqli_query($conn, $sql);
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
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css?h=34f9b351b7076f97babcdac3c1081100">
	
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="icon" type="image/png" href="assets/img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" href="assets/css/maintheme.css">
	
	<style>

        .autocompul {
            background-color: #f0f0f0;
            cursor: pointer;
            border-style: solid;
            border-width: 1px;
            border-radius: 5px;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .autocompli {
            padding: 12px;
            color: black;
        }

        .autocompli:hover {
            background-color: #d6d6d6;
        }
    </style>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#autocomp').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "searching.php",
                        method: "post",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#autocomplist').fadeIn();
                            $('#autocomplist').html(data);
                            document.getElementById("overlay").style.display = "block";
                        }
                    });
                } else {
                    $('#autocomplist').fadeOut();
                    $('#autocomplist').html("");
                    document.getElementById("overlay").style.display = "none";
                }
            });
            $(document).on('click', 'li', function() {
                $('#autocomp').val($(this).text());
                $('#autocomplist').fadeOut();
            });
        });
    </script>
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
                            <!--<div class="search_bar dropdown">-->
                            <!--    <span class="search_icon p-3 c-pointer" data-toggle="dropdown">-->
                            <!--        <i class="mdi mdi-magnify"></i>-->
                            <!--    </span>-->
                            <!--    <div class="dropdown-menu p-0 m-0">-->
                            <!--        <form method=post action=index2.html>-->
                            <!--            <input class="form-control" type="search" placeholder="Search" aria-label="Search">-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" style="padding-top:25px;margin-left:-5px">
                                    <!--<p> require 'connection.php'; $sql =  "select customer_name from customer where login_srno = ".$_SESSION['id'].""; $result = mysqli_query($conn, $sql); $display=mysqli_fetch_array($result); echo $display['customer_name'];</p>-->
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
              search by book title :
            <form class='d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search' method='post' action='bookHistory.php' style = 'display:flex;justify-content:center'>
                            <div class='input-group'><input class='bg-light form-control border-0 small' type='text' id='autocomp' placeholder='Search for ... 'name='search'><button class='btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light' type='submit'><i class='fas fa-search'></i></button></div>
                        </form>
                        <div class='container' style='display:flex;z-index : 2; position:fixed;'>
                    <div id='autocomplist' style='margin-left:25px;z-index:2;width:50vh'></div>
                </div>
                <br></br>
                
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $inp = $_POST['search'];
                $sql = "select * from issue inner join customer on customer.customer_srno = issue.customer_srno inner join book on issue.book_srno = book.book_srno inner join login on customer.login_srno = login.login_srno where book_title = '$inp';";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num > 0)
                {
                    echo "<div class='panel-body table-responsive'>
                    <table class='table'>
                        <thead> 
                            <tr>
                                <th>Sr. No.</th>
                                <th>Book Name</th>
                                <th>Customer Name</th>
                                <th>Issue Date</th>
                            </tr>
                            
                        </thead>
                        <tbody>";
                        $sr=1;
                while($display = mysqli_fetch_assoc($result))
                {
                    
                echo "<tr>
                        <td>".$sr."</td>
                        <td>".$display['book_title']."</td>
                        <td>".$display['customer_name']."</td>
                        <td>".$display['issue_date']."</td>
                    </tr>";
                $sr=$sr + 1;
                }
                echo "</tbody>
                    </table>
                </div>";
            }
            else
            {
                echo "no results found :(";
            }
            }
        ?>
        
            
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