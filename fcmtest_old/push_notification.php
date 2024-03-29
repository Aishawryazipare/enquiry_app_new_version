<?php 
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $message
			);
			
		print_r($fields);
		
		$headers = array(
			'Authorization:key=AIzaSyC9US8Sm1i0JsBoQ7Z75L3xiGqjcV7jOBo',
			'Content-Type:application/json'
			);
	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}
	
	$conn = mysqli_connect("localhost","root","","fcmtest");
	$sql = " select token from users";
	$result = mysqli_query($conn,$sql);
	$tokens = array();
	if(mysqli_num_rows($result) > 0 ){
		while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["token"];
		}
	}
	mysqli_close($conn);
	$message = array("message" => "FCM Push Notification: Hello World!");
	$message_status = send_notification($tokens, $message);
	echo $message_status;
	
 ?>