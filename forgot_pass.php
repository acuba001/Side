<?php
include 'includes/overall/header.php';
include 'core/init.php';


if(isset($_GET['code'])){
	$get_username = $_GET['username'];
	$get_code = $_GET['code'];
		
	reset_pass_init($get_username, $get_code);
	
	/* $query = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM users WHERE username='$get_username'")or die(mysqli_error($GLOBALS['dbConnection']));
	
	$row = mysqli_fetch_assoc($query);
	
	$db_code = $row['passreset'];
	$db_username = $row['username'];
		

	if($get_username == $db_username && $get_code == $db_code)
	{
		?>
			<form action ='pass_reset_complete.php?code=<?php echo $code; ?>' method = 'POST'>
				Enter a new password
				<br>
				<input type = 'password' name ='newpass'>
				<br>
				Re- enter your password
				<br>
				<input type = 'password' name='newpass1'>
				<br>
				<input type ='hidden' name = 'username' value = '<?php echo $db_username; ?>'>
				<input type ='submit' value ='Update Password!'>
			</form>
		<?php

	} */
}else{
	
			?>
				<form action = '' method= 'POST'>
					Enter your username
					<br>
					<input type = 'text' name= 'username'>
					<br>
					Enter your email
					<br>
					<input type = 'text' name ='email'>
					<br>
					<input type = 'submit' value = 'Submit' name = 'submit'>
				</form>
			<?php


if(isset($_POST['submit']))
{
	
	$username = $_POST['username'];
	$email = $_POST['email'];

	/* $query = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM users  WHERE username = '$username'")or die(mysqli_error($GLOBALS['dbConnection']));
	$numrow = mysqli_num_rows($query); */

	if(user_exists($username))
	{
		//$row = mysqli_fetch_assoc($query);
		$row = get_user_info($username);
		
		$db_email = $row['email'];

		
		if($email == $db_email)
		{   

			$code = rand(10000,1000000);

			$to = $db_email;
			$subject = "Password Reset";
			$body ="
			This is an automated email. Please Do Not reply  to this email
			Click on the link below or pasted into your browser
			http://localhost/DynaMathVersion1.3/forgot_pass.php?code=$code&username=$username

			";
			$headers = "From:dynamicmathematicsprinciples@gmail.com";
			
			updatePasscode($code, $username);
			
			/* $query = "UPDATE users SET passreset='$code' WHERE username='$username'";
			mysqli_query($GLOBALS['dbConnection'], $query)or die(mysqli_error($GLOBALS['dbConnection'])); */

			mail($to,$subject,$body,$headers); 

			echo "Please Check your Email";

		}

		else
		{
			echo "Email is incorrect";
		}

	}
	else 
	{
		echo "That username doesnt exits!";

		}	
	}
}
	include 'includes/overall/footer.php';
 ?>
