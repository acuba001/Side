

	<?php
		$first_name = $_POST['first_name'];
		$email= $_POST['email'];
		$username = $_POST['username'];
		$message = $_POST['message'];

		$to = "itroc001@fiu.edu";
		$subject = "New Message";

		mail($to,$subject,$message,"From:".$first_name . $last_name);

		echo "Your message has been sent";
		
		
	?>

