<?php
     session_start();
    if(!isset($_SESSION['id']))
    {
        header("location:login.php");
    }
    else
    {
        require 'connection.php';
        $sql = "SELECT * from customer where login_srno = '".$_SESSION['id']."'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num == 1)
        {
            $display = mysqli_fetch_array($result);
            $_SESSION['cust_no'] = $display['customer_srno'];
            header("location:bookFinder.php");
        }
        else
        {
            header("location:customerDetails.php");
        }
    }
?>