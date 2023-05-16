<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("location:home.php");
}
$warn=false;
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pin = $_POST['pincode'];
  $adder = $_POST['adder'];
  $stat = $_POST['stat'];
  $city = $_POST['city'];
  $date = date("Y-m-d");
  $sql = "UPDATE `location` set `address` = '$adder' , `State` = '$stat' ,`City` = '$city' ,`Pincode` = '$pin' where `address_srno` = '".$_SESSION['cust_no']."';";
  $result = mysqli_query($conn, $sql);
  $sql2 = "SELECT * from `employee` where preferred_pin = '$pin';";
  $result2 = mysqli_query($conn, $sql2);
  $num = mysqli_num_rows($result2);
  if ($num > 0) {
    while ($display = mysqli_fetch_array($result2)) {
      $sql3 = "Select * from `issue` where (`issue_status` = 'o' or `issue_status` = 'd') and `employee_srno` = '" . $display['employee_srno'] . "';";
      $result3 = mysqli_query($conn, $sql3);
      $num3 = mysqli_num_rows($result3);
      if ($num3 > 5) {
          $warn = true;
        continue;
      } else {
        $sql4 = "select * from `cart` where customer_srno = '" . $_SESSION['cust_no'] . "';";
        $result4 = mysqli_query($conn, $sql4);
        while ($display2 = mysqli_fetch_array($result4)) {
          $sql5 = "INSERT INTO `issue`(order_date, issue_status, book_srno, customer_srno, employee_srno) VALUES ('$date', 'o', '" . $display2['book_srno'] . "', '" . $display2['customer_srno'] . "', '" . $display['employee_srno'] . "');";
          $result5 = mysqli_query($conn, $sql5);
          $sql7 = "select * from `book` where `book_srno` ='".$display2['book_srno']."';";
          $result7 = mysqli_query($conn, $sql7);
          $display3 = mysqli_fetch_array($result7); 
            $book_cnt = $display3['book_quantity'];
            $book_cnt = $book_cnt - 1;
            $sql6 = "update `book` set `book_quantity`='$book_cnt' where `book_srno`='" . $display3['book_srno'] . "';";
            $result6 = mysqli_query($conn, $sql6);
        }
        $sql4 = "delete from `cart` where customer_srno = '" . $_SESSION['cust_no'] . "'";
        $result4 = mysqli_query($conn, $sql4);
        header("location:ordersuccess.php");
        break;
      }
      break;
    }
  }
  else
  {
  $warn = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <link href="assets/css/theme.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/maintheme.css">
</head>

<body>
  <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
  </div>
  <!-- <main class="main" id="top"> 
   require navbar code
  </main> -->

  <div class="container my-7">
      <?php
      if($warn){
      echo "
<div class = 'alert alert-danger'>
    Currently none of our employee is available to deliver at your location. Please try again in few days. 
</div>";}
?>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span>Your cart</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li> -->
          <?php
          require 'connection.php';
          $sql = "select * from cart where customer_srno = '" . $_SESSION['cust_no'] . "'";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if ($num != 0) {
          while ($display = mysqli_fetch_array($result)) {
            $sql2 = "select * from book where book_srno = '" . $display['book_srno'] . "'";
            $result2 = mysqli_query($conn, $sql2);
            $display2 = mysqli_fetch_array($result2);
            echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>
                <div>
                  <h6 class='my-0'>" . $display2['book_title'] . "</h6>
                  <small class='text-muted'>" . $display2['book_author'] . "</small>
                </div>
                <span class='text-muted'>Rs.20</span>
              </li>";
          }
            $num = $num * 20;
            echo "<li class='list-group-item d-flex justify-content-between'>
                <span>Total (INR)</span>
                <strong>Rs." . $num . "</strong>
              </li>";
          }
          else
          {
              echo "The cart is empty";
          }

          ?>
          <!-- <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li> -->
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" method='POST' action='cart.php'>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="First name" value="" required="" style="background-color:white">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="Last name" value="" required="" style="background-color:white">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" style="background-color:white">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="adder" placeholder="1234 Main St" required="" style="background-color:white">
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>


          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="zip">State</label>
              <input type="text" class="form-control" placeholder="State" name="stat" required="" style="background-color:white">
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">City</label>
              <input type="text" class="form-control" placeholder="City" name="city" required="" style="background-color:white">
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" name="pincode" placeholder="Pincode" required="" style="background-color:white">
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="same-address">
            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="save-info">
            <label class="custom-control-label" for="save-info">Save this information for next time</label>
          </div>
          <hr class="mb-4">
          <div style="display:flex;justify-content:center;">
            <button class="btn btn-primary" name="purch" value="1" type="submit">Purchase</button>
          </div>
        </form>
      </div>

     </div>
     </div>

      <!-- Bootstrap core JavaScript
    ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="vendors/@popperjs/popper.min.js"></script>
      <script src="vendors/bootstrap/bootstrap.min.js"></script>
      <script src="vendors/is/is.min.js"></script>
      <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
      <script src="vendors/fontawesome/all.min.js"></script>
      <script src="assets/js/theme2.js"></script>

      <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
      <!-- <iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe><div id="GOOGLE_INPUT_CHEXT_FLAG" style="display: none;" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:false,&quot;ss&quot;:true}"> -->
    </div>
    <!-- <form method='POST' action='test.php'>
      <div style="display:flex;justify-content:center;">
        <button name="purch" value="1" type="submit">Purchase</button>
      </div>
    </form> -->
</body>

</html>