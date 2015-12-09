<?php

include 'core/init.php';
include 'includes/overall/header.php';


if($_GET['code'])
{
	$get_username = $_GET['username'];
	$get_code = $_GET['code'];
		
		$query = mysql_query("SELECT * FROM users WHERE username='$get_username'");
		
		while($row = mysql_fetch_assoc($query))
		{
			$db_code = $row['passreset'];
			$db_username = $row['username'];
		}

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

		}
}



if(!$_GET['code'])
{
			?>
				<form action = 'forgot_pass.php' method= 'POST'>
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

	$query = mysql_query("SELECT * FROM users  WHERE username = '$username'");
	$numrow = mysql_num_rows($query);

	if($numrow != 0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$db_email = $row['email'];

		}
		if($email == $db_email)
		{   

			$code = rand(10000,1000000);

			$to = $db_email;
			$subject = "Password Reset";
			$body ="
			This is an automated email.Please Do Not reply  to this email
			Click on the link below or pasted into your browser
			http://localhost/DynaMathVersion1/forgot_pass.php?code=$code&username=$username

			";
			$query = "UPDATE users SET passreset='$code' WHERE username='$username'";
			mysql_query($query);

			mail($to,$subject,$body); 

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
