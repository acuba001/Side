<?php

include 'core/init.php';
include 'includes/overall/header.php';

	$newpass = $_POST['newpass'];
	$newpass1 = $_POST['newpass1'];
	$post_username = $_POST['username'];
	$code = $_GET['code'];

if($newpass == $newpass1)
	{
		$options = array('cost' => 10);
		$enc_pass = password_hash(sanitize($newpass), PASSWORD_BCRYPT, $options);
		//$enc_pass = md5($newpass);

		updateUserNPassword($post_username, $enc_pass);
		updatePasscode('0', $post_username);
	?>
		 Your password has been updated
		 <a href='http://localhost/DynaMathVersion1.3/login.php'>
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
