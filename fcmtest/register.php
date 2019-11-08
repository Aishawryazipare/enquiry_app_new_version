<?php 
    if (isset($_POST["token"])) {
        
           $token=$_POST["token"];
           $conn = mysqli_connect("localhost","ipinguser","iPing@321","enquiry_app") or die("Error connecting");
           $q="INSERT INTO tbl_employees (token) VALUES ( '$token') "
              ." ON DUPLICATE KEY UPDATE token = '$token';";
              
      mysqli_query($conn,$q) or die(mysqli_error($conn));
      mysqli_close($conn);
    }
 ?>