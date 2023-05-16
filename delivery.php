<?php
session_start();
    require 'connection.php';
    if(isset($_POST['butto']))
    {
        $cust_no = $_POST['butto'];
        $date = date("Y-m-d");
        $sql = "Update `issue` set issue_status = 'd', issue_date = '$date' where customer_srno = '$cust_no';";
        $result = mysqli_query($conn, $sql);
    }
    location("location:employeeDelivery.php");
?>