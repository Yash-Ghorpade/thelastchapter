<?php
     session_start();
    if(!isset($_SESSION['id']))
    {
        header("location:login.php");
    } 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search book</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=c70bd49896dfd10fc3b47752d9a7d8c5">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css?h=34f9b351b7076f97babcdac3c1081100">
    <link rel="stylesheet" href="assets/css/16-scrollbar-styles-1.css?h=3dfba5d835a5da3ba8ad96bd14ca2ea0">
    <link rel="stylesheet" href="assets/css/16-scrollbar-styles.css?h=e841049ca87541115dd69c419f2676a8">
    <!-- <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/compiled-4.20.0.min.css?ver=4.20.0"> -->
    <link rel="stylesheet" href="assets/css/maintheme.css">
    <style>
        .wrap-login100 {
  background: #ec9f05;
  background: -webkit-linear-gradient(top, #ff4e00, #ec9f05);
  background: -o-linear-gradient(top, #ff4e00, #ec9f05);
  background: -moz-linear-gradient(top, #ff4e00, #ec9f05);
  background: linear-gradient(top, #ff4e00, #ec9f05);
}
.yash {
                width: 110vh;
                height: auto;
                overflow-x: hidden;
                overflow-y: auto;
                justify-content: center;
}

.yash::-webkit-scrollbar {
  width: 10px;
  background-color: #F5F5F5;
}

.yash::-webkit-scrollbar-thumb {
  background-color: #F90;
  background-image: -webkit-linear-gradient(90deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
}

.yash::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: #F5F5F5;
}
        </style>

</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark p-0" style="background-color:#ff4e00">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-book" style="width: 15px;height: 16px;left:0;"></i></div>
                    <div class="sidebar-brand-text mx-3" style="color:black"><span >The last chapter</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.html" style="color:black"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html" style="color:black"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.html" style="color:black"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html" style="color:black"><i class="fas fa-user-circle"></i><span>Login</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="test2.php" style="color:black"><i class="fas fa-user-circle"></i><span>Cart</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" method=post action=test4.php>
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." name="search"><button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100" method=post action=test4.php>
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." name="search">
                                            <div class="input-group-append"><button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <span>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small" style="font-weight: bold; color:black;">Welcome <?php require 'connection.php'; $sql =  "select customer_name from customer where login_srno = ".$_SESSION['id'].""; $result = mysqli_query($conn, $sql); $display=mysqli_fetch_array($result); echo $display['customer_name'];?></span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
</span>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid yash">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Search for books....</h3>
                    </div>
                    <div>

                    <?php
            require 'connection.php';
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(isset($_POST['search']))
                {
                    unset($_SESSION['search']);
                    $search = $_POST['search'];
                    $_SESSION['search'] = $search;
                    $divisor = 3;
                    $search = htmlspecialchars($search);
                    $sql = "SELECT * FROM `book` WHERE (`book_title` LIKE '%".$search."%') OR (`book_author` LIKE '%".$search."%')";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if($num > 0)
                    {
                        while($display = mysqli_fetch_array($result))
                        {
                            if($display['book_quantity'] > 0){
                            $sql2 = "SELECT * FROM cart WHERE book_srno = '".$display['book_srno']."' and customer_srno = '".$_SESSION['id']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $num2 = mysqli_num_rows($result2);
                            if($num2 == 0)
                            {
                                if($divisor % 3 == 0)
                                {
                                    echo "</div>
                                    <div class='card-group'>
                                    <div class='card' style='max-width: 35vh;'>
                                <div class='card-body'>
                                    <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                    <p class='card-text'>by ".$display['book_author']."</p>
                                    <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                    <form method='POST' action='test4.php'>
                                    <div style='bottom:2vh;'>
                                    <button class='btn peach-gradient' name='butto' value='".$display['book_srno']."' type='submit'>Add to cart</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>";
                                }
                                else{
                                echo "<div class='card' style='max-width: 35vh;'>
                                <div class='card-body'>
                                    <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                    <p class='card-text'>by ".$display['book_author']."</p>
                                    <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                    <form method='POST' action='test4.php'>
                                    <div style='bottom:2vh;'>
                                    <button class='btn peach-gradient' name='butto' value='".$display['book_srno']."' type='submit'>Add to cart</button>
                                    </div> 
                                    </form>
                                    </div>
                                </div>
                            </div>";
                                }
                                $divisor = $divisor + 1;
                            }
                            else
                            {
                                if($divisor % 3 == 0)
                                {
                                    echo "</div>
                                    <div class='card-group'>
                                    <div class='card' style='max-width: 35vh;'>
                                <div class='card-body'>
                                    <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                    <p class='card-text'>by ".$display['book_author']."</p>
                                    <div class='alert alert-success' role='alert'>already added to the cart</div>
                                    <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                    <form method='POST' action='test4.php'>
                                    <div style='bottom:2vh;'>
                                    <button class='btn btn-danger' name='rem' value='".$display['book_srno']."' type='submit'>Remove from cart</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>";
                                }
                                else{
                                echo "<div class='card' style='max-width: 35vh;'>
                                <div class='card-body'>
                                    <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                    <p class='card-text'>by ".$display['book_author']."</p>
                                    <div class='alert alert-success' role='alert'>already added to the cart</div>
                                    <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                    <form method='POST' action='test4.php'>
                                    <div style='bottom:2vh;'>
                                    <button class='btn btn-danger' name='rem' value='".$display['book_srno']."' type='submit'>Remove from cart</button>
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
                        if(($divisor-1) %3 != 0)
                        {
                            echo"</div>";
                        }
                    }
                }
                elseif(isset($_POST['butto']))
                {
                    $value = $_POST['butto'];
                    if($value != 0)
                    {
                        $sql3 = "INSERT INTO cart(cart_book_count, book_srno, customer_srno) VALUES ('1', '".$value."', '".$_SESSION['id']."');";
                        $result3 = mysqli_query($conn, $sql3);
                    }
                    if(isset($_SESSION['search']))
                    {
                        $divisor = 3;
                        $_SESSION['search'] = htmlspecialchars($_SESSION['search']);
                        $sql = "SELECT * FROM `book` WHERE (`book_title` LIKE '%".$_SESSION['search']."%') OR (`book_author` LIKE '%".$_SESSION['search']."%')";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        if($num > 0)
                        {
                            while($display = mysqli_fetch_array($result))
                            {
                                if($display['book_quantity'] > 0)
                                {
                                    $sql2 = "Select * from cart where book_srno = '".$display['book_srno']."' and customer_srno = '".$_SESSION['id']."'";
                                    $result2 = mysqli_query($conn, $sql2);
                                    $num2 = mysqli_num_rows($result2);
                                    if($num2 == 0)
                                    {
                                        if($divisor % 3 == 0)
                                        {
                                            echo "</div>
                                            <div class='card-group'>
                                            <div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                            <p class='card-text'>".$display['book_author']."</p>
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test4.php'>
                                            <div>
                                            <button class='btn peach-gradient' name='butto' value='".$display['book_srno']."' type='submit'>Add to cart</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                        else
                                        {
                                        echo "<div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                            <p class='card-text'>".$display['book_author']."</p>
                                            <div class='container' style='display:flex;justify-content:center;max-width:35vh;'>
                                            <form method='POST' action='test4.php'>
                                            <div>
                                            <button class='btn peach-gradient' name='butto' value='".$display['book_srno']."' type='submit'>Add to cart</button>
                                            </div> 
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                        $divisor = $divisor + 1;
                                    }
                                    else
                                    {
                                        if($divisor % 3 == 0)
                                        {
                                            echo "</div>
                                            <div class='card-group'>
                                            <div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                            <p class='card-text'>".$display['book_author']."</p>
                                            <div class='alert alert-success' role='alert'>already added to the cart</div>
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test4.php'>
                                            <div>
                                            <button class='btn btn-danger' name='rem' value='".$display['book_srno']."' type='submit'>Remove from cart</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                        else
                                        {
                                        echo "<div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                            <p class='card-text'>".$display['book_author']."</p>
                                            <div class='alert alert-success' role='alert'>already added to the cart</div>   
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test4.php'>
                                            <div>
                                            <button class='btn btn-danger' name='rem' value='".$display['book_srno']."' type='submit'>Remove from cart</button>
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
                            if(($divisor-1) %3 != 0)
                            {
                                echo"</div>";
                            }
                        }
                    }
                }
                elseif(isset($_POST['rem']))
                {
                    $value = $_POST['rem'];
                    if($value != 0)
                    {
                        $sql3 = "DELETE FROM cart WHERE customer_srno = ".$_SESSION['id']." and book_srno = '$value'";
                        $result3 = mysqli_query($conn, $sql3);
                    }
                    if(isset($_SESSION['search']))
                    {
                        $divisor = 3;
                        $_SESSION['search'] = htmlspecialchars($_SESSION['search']);
                        $sql = "SELECT * FROM `book` WHERE (`book_title` LIKE '%".$_SESSION['search']."%') OR (`book_author` LIKE '%".$_SESSION['search']."%')";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        if($num > 0)
                        {
                            while($display = mysqli_fetch_array($result))
                            {
                                if($display['book_quantity'] > 0)
                                {
                                    $sql2 = "Select * from cart where book_srno = '".$display['book_srno']."' and customer_srno = '".$_SESSION['id']."'";
                                    $result2 = mysqli_query($conn, $sql2);
                                    $num2 = mysqli_num_rows($result2);
                                    if($num2 == 0)
                                    {
                                        if($divisor % 3 == 0)
                                        {
                                            echo "</div>
                                            <div class='card-group'>
                                            <div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                            <p class='card-text'>".$display['book_author']."</p>
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test4.php'>
                                            <div>
                                            <button class='btn peach-gradient' name='butto' value='".$display['book_srno']."' type='submit'>Add to cart</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                        else
                                        {
                                        echo "<div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                            <p class='card-text'>".$display['book_author']."</p>
                                            <div class='container' style='display:flex;justify-content:center;max-width:35vh;'>
                                            <form method='POST' action='test4.php'>
                                            <div>
                                            <button class='btn peach-gradient' name='butto' value='".$display['book_srno']."' type='submit'>Add to cart</button>
                                            </div> 
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                        $divisor = $divisor + 1;
                                    }
                                    else
                                    {
                                        if($divisor % 3 == 0)
                                        {
                                            echo "</div>
                                            <div class='card-group'>
                                            <div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                            <p class='card-text'>".$display['book_author']."</p>
                                            <div class='alert alert-success' role='alert'>already added to the cart</div>
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test4.php'>
                                            <div>
                                            <button class='btn btn-danger' name='rem' value='".$display['book_srno']."' type='submit'>Remove from cart</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                        else
                                        {
                                        echo "<div class='card' style='max-width: 35vh;'>
                                        <div class='card-body'>
                                            <h4 class='card-title' style='color:black'>".$display['book_title']."</h4>
                                            <p class='card-text'>".$display['book_author']."</p>
                                            <div class='alert alert-success' role='alert'>already added to the cart</div>   
                                            <div class='container' style='display:flex;justify-content:center;max-width: 35vh;'>
                                            <form method='POST' action='test4.php'>
                                            <div>
                                            <button class='btn btn-danger' name='rem' value='".$display['book_srno']."' type='submit'>Remove from cart</button>
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
                            if(($divisor-1) %3 != 0)
                            {
                                echo"</div>";
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/theme.js?h=79f403485707cf2617c5bc5a2d386bb0"></script>
</body>

</html>