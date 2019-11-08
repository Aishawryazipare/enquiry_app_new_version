<?php 

	$conn = mysqli_connect("localhost","ipinguser","iPing@321","enquiry_app");
	$sql = " select * from tbl_employees";
	$result = mysqli_query($conn,$sql);
	$tokens = array();

	while($row = mysqli_fetch_array($result)){
    	array_push($tokens,array(
        	'id'=>$row['id'],
        	'token'=>$row['token']
    	));
	}

	echo json_encode(array('result'=>$tokens));
	mysqli_close($conn);
	
 ?>