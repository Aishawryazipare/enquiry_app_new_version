<?php 
    if (isset($_POST["mobile_no"])) {
        
		//print_r($_POST);
		$mobileno=$_POST["mobile_no"];
		$password=$_POST["password"];
		$conn = mysqli_connect("localhost","ipinguser","iPing@321","enquiry_app");
		if($conn === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$sql="select * from tbl_employees where mobile_no='".$mobileno."' and android_password='".$password."'";
	
		if($result = mysqli_query($conn, $sql)){
			if(mysqli_num_rows($result) > 0){
				echo "Success";
			}else{
				echo "Fail";
			}
		}else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		mysqli_close($conn);		
    }
 ?>