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
  <title>ADMIN PANNEL</title>
  <!-- Fav icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
  <link href="assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
  <link href="assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/maintheme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
  <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css?h=34f9b351b7076f97babcdac3c1081100">
  <script src="jquery-3.3.1.js" type="text/javascript"></script>

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

    .yash {
      width: 110vh;
      height: auto;
      overflow-x: hidden;
      overflow-y: auto;
      justify-content: center;
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
        <img class="logo-abbr" src="assets/images/logo.png" alt="">
        <img class="logo-compact" src="assets/images/logo-text.png" alt="">
        <img class="brand-title" src="assets/images/logo-text.png" alt="">
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
            <div class="header-center">
              <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" method=post action=test3.php>
                <div class="input-group"><input class="bg-light form-control border-0 small" type="text" id="autocomp" placeholder="Search for ..." name="search"><button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit"><i class="fas fa-search"></i></button></div>
              </form>
            </div>

            <ul class="navbar-nav header-right">
              <li class="nav-item dropdown header-profile">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                  <i class="mdi mdi-account"></i>
                </a>
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" style="padding-top:22px;margin-left:-5px">
                  <p><?php require 'connection.php';
                      $sql =  "SELECT * from login where login_srno = " . $_SESSION['id'] . "";
                      $result = mysqli_query($conn, $sql);
                      $display = mysqli_fetch_array($result);
                      echo $display['login_username']; ?></p>
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
          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
            <ul aria-expanded="false">
              <li><a href="./index.html">Dashboard 1</a></li>
              <li><a href="./index2.html">Dashboard 2</a></li>
            </ul>
          </li>

          <li class="nav-label">Apps</li>
          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Apps</span></a>
            <ul aria-expanded="false">
              <li><a href="./app-profile.html">Profile</a></li>
              <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                <ul aria-expanded="false">
                  <li><a href="./email-compose.html">Compose</a></li>
                  <li><a href="./email-inbox.html">Inbox</a></li>
                  <li><a href="./email-read.html">Read</a></li>
                </ul>
              </li>
              <li><a href="./app-calender.html">Calendar</a></li>
            </ul>
          </li>
          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span class="nav-text">Charts</span></a>
            <ul aria-expanded="false">
              <li><a href="./chart-flot.html">Flot</a></li>
              <li><a href="./chart-morris.html">Morris</a></li>
              <li><a href="./chart-chartjs.html">Chartjs</a></li>
              <li><a href="./chart-chartist.html">Chartist</a></li>
              <li><a href="./chart-sparkline.html">Sparkline</a></li>
              <li><a href="./chart-peity.html">Peity</a></li>
            </ul>
          </li>


          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-plug"></i><span class="nav-text">Plugins</span></a>
            <ul aria-expanded="false">
              <li><a href="./uc-select2.html">Select 2</a></li>
              <li><a href="./uc-nestable.html">Nestedable</a></li>
              <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
              <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
              <li><a href="./uc-toastr.html">Toastr</a></li>
              <li><a href="./map-jqvmap.html">Jqv Map</a></li>
            </ul>
          </li>
          <li><a href="widget-basic.html" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Widget</span></a></li>
          <li class="nav-label">Forms</li>
          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-form"></i><span class="nav-text">Forms</span></a>
            <ul aria-expanded="false">
              <li><a href="./form-element.html">Form Elements</a></li>
              <li><a href="./form-wizard.html">Wizard</a></li>
              <li><a href="./form-editor-summernote.html">Summernote</a></li>
              <li><a href="form-pickers.html">Pickers</a></li>
              <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
            </ul>
          </li>
          <li class="nav-label">Table</li>
          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
            <ul aria-expanded="false">
              <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
              <li><a href="table-datatable-basic.html">Datatable</a></li>
            </ul>
          </li>

          <li class="nav-label">Extra</li>
          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
            <ul aria-expanded="false">
              <li><a href="./page-register.html">Register</a></li>
              <li><a href="./page-login.html">Login</a></li>
              <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                <ul aria-expanded="false">
                  <li><a href="./page-error-400.html">Error 400</a></li>
                  <li><a href="./page-error-403.html">Error 403</a></li>
                  <li><a href="./page-error-404.html">Error 404</a></li>
                  <li><a href="./page-error-500.html">Error 500</a></li>
                  <li><a href="./page-error-503.html">Error 503</a></li>
                </ul>
              </li>
              <li><a href="./page-lock-screen.html">Lock Screen</a></li>
            </ul>
          </li>
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
      <div class="container yash" style="margin-bottom:40px;">
        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" method=post action=test3.php>
          <div class="input-group"><input class="bg-light form-control border-0 small" type="text" id="autocomp" placeholder="Search for ..." name="search"><button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit"><i class="fas fa-search"></i></button></div>
        </form>
      </div>
      <div class="container" style="display:flex;z-index : 2; margin-top:-35px;position:fixed;">
        <div id="autocomplist" style="margin-left:25px;z-index:2;width:50vh"></div>
      </div>
      <div class="container yash" style="z-index :1;margin-top:35px;">
        <div style="display:flex; justify-content:center">

            <?php
            require 'connection.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              if (isset($_POST['search'])) {
                unset($_SESSION['search']);
                $search = $_POST['search'];
                $_SESSION['search'] = $search;
                $divisor = 3;
                $search = htmlspecialchars($search);
                $sql = "SELECT * FROM `book` WHERE (`book_title` LIKE '%" . $search . "%') OR (`book_author` LIKE '%" . $search . "%')";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                  while ($display = mysqli_fetch_array($result)) {
                    if ($display['book_quantity'] > 0) {
                      $sql2 = "SELECT * FROM cart WHERE book_srno = '" . $display['book_srno'] . "' and customer_srno = '" . $_SESSION['cust_no'] . "'";
                      $result2 = mysqli_query($conn, $sql2);
                      $num2 = mysqli_num_rows($result2);
                      if ($num2 == 0) {
                        if ($divisor % 3 == 0) {
                          echo "</div>
                                    <div class='card-group'>
                                    <div class='card' style='max-width: 35vh;'>
                                <div class='card-body'>
                                    <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                    <p class='card-text'>by " . $display['book_author'] . "</p>
                                    <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                    <form method='POST' action='test.php'>
                                    <div style='bottom:2vh;'>
                                    <button class='btn peach-gradient' name='butto' value='" . $display['book_srno'] . "' type='submit'>Add to cart</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>";
                        } else {
                          echo "<div class='card' style='max-width: 35vh;'>
                                <div class='card-body'>
                                    <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                    <p class='card-text'>by " . $display['book_author'] . "</p>
                                    <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                    <form method='POST' action='test.php'>
                                    <div style='bottom:2vh;'>
                                    <button class='btn peach-gradient' name='butto' value='" . $display['book_srno'] . "' type='submit'>Add to cart</button>
                                    </div> 
                                    </form>
                                    </div>
                                </div>
                            </div>";
                        }
                        $divisor = $divisor + 1;
                      } else {
                        if ($divisor % 3 == 0) {
                          echo "</div>
                                    <div class='card-group'>
                                    <div class='card' style='max-width: 35vh;'>
                                <div class='card-body'>
                                    <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                    <p class='card-text'>by " . $display['book_author'] . "</p>
                                    <div class='alert alert-success' role='alert'>already added to the cart</div>
                                    <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                    <form method='POST' action='test.php'>
                                    <div style='bottom:2vh;'>
                                    <button class='btn btn-danger' name='rem' value='" . $display['book_srno'] . "' type='submit'>Remove from cart</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>";
                        } else {
                          echo "<div class='card' style='max-width: 35vh;'>
                                <div class='card-body'>
                                    <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                    <p class='card-text'>by " . $display['book_author'] . "</p>
                                    <div class='alert alert-success' role='alert'>already added to the cart</div>
                                    <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                    <form method='POST' action='test.php'>
                                    <div style='bottom:2vh;'>
                                    <button class='btn btn-danger' name='rem' value='" . $display['book_srno'] . "' type='submit'>Remove from cart</button>
                                    </div> 
                                    </form>
                                    </div>
                                </div>
                            </div>";
                        }
                        $divisor = $divisor + 1;
                      }
                    }
                  }
                  if (($divisor - 1) % 3 != 0) {
                    echo "</div>";
                  }
                } else {
                  echo "NO RESULTS FOUND";
                }
              } elseif (isset($_POST['butto'])) {
                $value = $_POST['butto'];
                if ($value != 0) {
                  $sql3 = "INSERT INTO cart(cart_book_count, book_srno, customer_srno) VALUES ('1', '" . $value . "', '" . $_SESSION['cust_no'] . "');";
                  $result3 = mysqli_query($conn, $sql3);
                }
                if (isset($_SESSION['search'])) {
                  $divisor = 3;
                  $_SESSION['search'] = htmlspecialchars($_SESSION['search']);
                  $sql = "SELECT * FROM `book` WHERE (`book_title` LIKE '%" . $_SESSION['search'] . "%') OR (`book_author` LIKE '%" . $_SESSION['search'] . "%')";
                  $result = mysqli_query($conn, $sql);
                  $num = mysqli_num_rows($result);
                  if ($num > 0) {
                    while ($display = mysqli_fetch_array($result)) {
                      if ($display['book_quantity'] > 0) {
                        $sql2 = "Select * from cart where book_srno = '" . $display['book_srno'] . "' and customer_srno = '" . $_SESSION['cust_no'] . "'";
                        $result2 = mysqli_query($conn, $sql2);
                        $num2 = mysqli_num_rows($result2);
                        if ($num2 == 0) {
                          if ($divisor % 3 == 0) {
                            echo "</div>
                                            <div class='card-group'>
                                            <div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                            <p class='card-text'>" . $display['book_author'] . "</p>
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test.php'>
                                            <div>
                                            <button class='btn peach-gradient' name='butto' value='" . $display['book_srno'] . "' type='submit'>Add to cart</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                          } else {
                            echo "<div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                            <p class='card-text'>" . $display['book_author'] . "</p>
                                            <div class='container' style='display:flex;justify-content:center;max-width:35vh;'>
                                            <form method='POST' action='test.php'>
                                            <div>
                                            <button class='btn peach-gradient' name='butto' value='" . $display['book_srno'] . "' type='submit'>Add to cart</button>
                                            </div> 
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                          }
                          $divisor = $divisor + 1;
                        } else {
                          if ($divisor % 3 == 0) {
                            echo "</div>
                                            <div class='card-group'>
                                            <div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                            <p class='card-text'>" . $display['book_author'] . "</p>
                                            <div class='alert alert-success' role='alert'>already added to the cart</div>
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test.php'>
                                            <div>
                                            <button class='btn btn-danger' name='rem' value='" . $display['book_srno'] . "' type='submit'>Remove from cart</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                          } else {
                            echo "<div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                            <p class='card-text'>" . $display['book_author'] . "</p>
                                            <div class='alert alert-success' role='alert'>already added to the cart</div>   
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test.php'>
                                            <div>
                                            <button class='btn btn-danger' name='rem' value='" . $display['book_srno'] . "' type='submit'>Remove from cart</button>
                                            </div> 
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                          }
                          $divisor = $divisor + 1;
                        }
                      }
                    }
                    if (($divisor - 1) % 3 != 0) {
                      echo "</div>";
                    }
                  }
                }
              } elseif (isset($_POST['rem'])) {
                $value = $_POST['rem'];
                if ($value != 0) {
                  $sql3 = "DELETE FROM cart WHERE customer_srno = " . $_SESSION['cust_no'] . " and book_srno = '$value'";
                  $result3 = mysqli_query($conn, $sql3);
                }
                if (isset($_SESSION['search'])) {
                  $divisor = 3;
                  $_SESSION['search'] = htmlspecialchars($_SESSION['search']);
                  $sql = "SELECT * FROM `book` WHERE (`book_title` LIKE '%" . $_SESSION['search'] . "%') OR (`book_author` LIKE '%" . $_SESSION['search'] . "%')";
                  $result = mysqli_query($conn, $sql);
                  $num = mysqli_num_rows($result);
                  if ($num > 0) {
                    while ($display = mysqli_fetch_array($result)) {
                      if ($display['book_quantity'] > 0) {
                        $sql2 = "Select * from cart where book_srno = '" . $display['book_srno'] . "' and customer_srno = '" . $_SESSION['cust_no'] . "'";
                        $result2 = mysqli_query($conn, $sql2);
                        $num2 = mysqli_num_rows($result2);
                        if ($num2 == 0) {
                          if ($divisor % 3 == 0) {
                            echo "</div>
                                            <div class='card-group'>
                                            <div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                            <p class='card-text'>" . $display['book_author'] . "</p>
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test.php'>
                                            <div>
                                            <button class='btn peach-gradient' name='butto' value='" . $display['book_srno'] . "' type='submit'>Add to cart</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                          } else {
                            echo "<div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                            <p class='card-text'>" . $display['book_author'] . "</p>
                                            <div class='container' style='display:flex;justify-content:center;max-width:35vh;'>
                                            <form method='POST' action='test.php'>
                                            <div>
                                            <button class='btn peach-gradient' name='butto' value='" . $display['book_srno'] . "' type='submit'>Add to cart</button>
                                            </div> 
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                          }
                          $divisor = $divisor + 1;
                        } else {
                          if ($divisor % 3 == 0) {
                            echo "</div>
                                            <div class='card-group'>
                                            <div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                            <p class='card-text'>" . $display['book_author'] . "</p>
                                            <div class='alert alert-success' role='alert'>already added to the cart</div>
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test.php'>
                                            <div>
                                            <button class='btn btn-danger' name='rem' value='" . $display['book_srno'] . "' type='submit'>Remove from cart</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                          } else {
                            echo "<div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>" . $display['book_title'] . "</h4>
                                            <p class='card-text'>" . $display['book_author'] . "</p>
                                            <div class='alert alert-success' role='alert'>already added to the cart</div>   
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test.php'>
                                            <div>
                                            <button class='btn btn-danger' name='rem' value='" . $display['book_srno'] . "' type='submit'>Remove from cart</button>
                                            </div>
                                            </form> 
                                            </div>
                                        </div>
                                    </div>";
                          }
                          $divisor = $divisor + 1;
                        }
                      }
                    }
                    if (($divisor - 1) % 3 != 0) {
                      echo "</div>";
                    }
                  }
                }
              }
            }
            ?>
          </div>
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