

	<?php
	require 'includes/overall/header.php'; 
		$first_name = $_POST['first_name'];
		$email= $_POST['email'];
		$last_name = $_POST['last_name'];
		$message = $email.": ".$_POST['message'];

		$to = "dynamicmathematicsprinciples@gmail.com";
		$subject = "Feedback";

		mail($to,$subject,$message,"From:".$first_name . $last_name);

		echo "Your message has been sent";
		
		
	?>

