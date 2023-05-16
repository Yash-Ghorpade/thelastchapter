<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=c70bd49896dfd10fc3b47752d9a7d8c5">
    <title>Employee pannel</title>
    <!-- Fav icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                <img class="logo-abbr" src="assets/images/logo.png" alt="">
                <img class="logo-compact" src="assets/images/logo-text.png" alt="">
                <img class="brand-title" src="assets/images/logo-text.png" alt="">
            </a>

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand" style="display:flex; justify-content:right">

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-account"></i>
                            </a>
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" style="padding-top:22px;margin-left:-5px">
                                <p> <?php require 'connection.php';
                                    $sql =  "SELECT * from `login` where login_srno = '".$_SESSION['id']."';";
                                    $result = mysqli_query($conn, $sql);
                                    $display = mysqli_fetch_array($result);
                                    echo $display['login_username']; ?> </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
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
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="jumbotron">
            
        <a href ="employeeDelivery.php"
            <button class='btn btn-primary'>
                Out For Delivery !!
            </button>
            </a>

        <a href='employeeReturning.php'>
            <button class='btn btn-primary'>
                Returning
            </button>
        </a>

                <div id='outForDelivery' class='tab-pane fade in active'>
                <?php
                require 'connection.php';
                $counter = 1;
                
                $sql5 = "select * from employee where login_srno = '".$_SESSION['id']."';";
                $result5 = mysqli_query($conn, $sql5);
                $display5 = mysqli_fetch_array($result5);
                $sql = "select * from `issue` where employee_srno = '".$display5['employee_srno']."' and issue_status = 'd' group by customer_srno;";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num > 0)
                {
                    while($display = mysqli_fetch_array($result))
                    {
                        $sql4 = "select * from `customer` inner join location on location.address_srno = customer.address_srno where customer_srno = '".$display['customer_srno']."'";
                        $result4 = mysqli_query($conn, $sql4);
                        $display4 = mysqli_fetch_array($result4);
                        $sql2 = "select * from `issue` where customer_srno = '".$display['customer_srno']."';";
                        $result2 = mysqli_query($conn, $sql2);
                        $date = $display['issue_date'];
                        $date2 = date('Y-m-d', strtotime($date. ' + 30 days'));
                        // $sql10 = "SELECT DATE_ADD(".$display['issue_date'].", INTERVAL 10 DAY);";
                        // $result10 = mysqli_query($conn, $sql10);
                        // $display10 = mysqli_fetch_array($result10);
                        echo"<div class='accordion' id='myAccordion".$counter."'>
                                <div class='accordion-item'>
                                    <button type='button' class='accordion-button collapsed' data-bs-toggle='collapse' data-bs-target='#thi".$counter."'>
                                    <div class='col'>
                                            <p style='color:red'>".$date2."</p>
                                        </div>
                                        <div class='col'>
                                            <p>".$display4['customer_name']."</p>
                                            <p>".$display4['customer_contact']."</p>
                                        </div>
                                        <div class='col'>
                                            <p>".$display4['address']."</p>
                                            <p>".$display4['City']." - ".$display4['Pincode']."</p>
                                        </div>
                                    </button>
                                    <div id='thi".$counter."' class='accordion-collapse collapse' data-bs-parent='#myAccordion".$counter."'>
                                        <div class='card-body'>";
                        while($display2 = mysqli_fetch_array($result2))
                        {
                            $sql3 = "select * from book where book_srno = '".$display2['book_srno']."'";
                            $result3 = mysqli_query($conn, $sql3);
                            $display3 = mysqli_fetch_array($result3);
                        
                                            echo "<p>".$display3['book_title']."</p>";
                                        
                        }
                        echo "<div style='display:flex;justify-content:right'>
                            <form method='POST' action ='return.php'>
                                                <button class='btn btn-primary' name = 'butto' value='".$display['customer_srno']."'>Returned</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        $counter = $counter +1;
                    }
                }
                echo "</div>";
                
                ?>
                </div>
                <!--<div id="menu1" class="tab-pane fade">-->
                <!--    <h3>Menu 1</h3>-->
                <!--    <p>Some content in menu 1.</p>-->
                <!--</div>-->

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