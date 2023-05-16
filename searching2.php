<?php
    require 'connection.php';
    if(isset($_POST['query']))
    {
        $output='';
        $query = "SELECT * FROM login WHERE login_email LIKE '%".$_POST['query']."%' limit 5";
        $result = mysqli_query($conn, $query);
        $output = "<ul class='list-unstyled autocompul'>";
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $output .= "<li class = 'autocompli'>".$row['login_email']."</li>";
            }
        }
        else
        {
            $output .= "<p class = 'autocompli'>No results found</p>";
        }
        $output .= "</ul>";
        echo $output;
    }
?>