<?php

include 'core/init.php';
include 'includes/overall/header.php';

	$newpass = $_POST['newpass'];
	$newpass1 = $_POST['newpass1'];
	$post_username = $_POST['username'];
	$code = $_GET['code'];

if($newpass == $newpass1)
	{
		
		$enc_pass = md5($newpass);

		mysql_query("UPDATE users SET password='$newpass' WHERE username ='$post_username'");
		mysql_query("UPDATE users SET passreset='0' WHERE username ='$post_username'");
	?>
		 Your password has been updated
		 <a href='http://localhost/DynaMathVersion1/login.php'>
		 	Click here to login
		 </a>
	 <?php
	}
	else
	{
			?>
		 Passwords must match
		  <a href = 'forgot_pass.php?code=<?php echo $code; ?>&username=<?php echo $post_username; ?>'> 
		  	click here to go back 
		  	<a/>
		<?php	
	}
	include 'includes/overall/footer.php';
?>
