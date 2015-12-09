<html>
<body>
	<form action = "register.php" method = "POST">
			
			<input type = "text" name= "username" placeholder= "Enter a username..."><br />
			<input type = "password" name= "password" placeholder= "Enter a password..."><br />
			
			<input type = "text" name= "first_name" placeholder= "Enter a first name..."><br />
			<input type = "text" name= "last_name" placeholder= "Enter a last name..."><br />

			<input type = "email" name= "email" placeholder= "Enter a email address..."><br />

			<input type = "submit" name= "submit" value= "Register"><br />
		</form>

	<?php
	
	if(isset($_POST['submit']))
	{
		include 'dbc.php'; 

		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$first_name = mysql_real_escape_string($_POST['first_name']);
		$last_name = mysql_real_escape_string($_POST['last_name']);
		$email = mysql_real_escape_string($_POST['email']);

		$enc_password = md5($password);


		if($username && $email && $password)
		{

			$confirmcode = rand();

			// $query = 'INSERT INTO users (username, password, first_name, last_name, email) 
			// VALUES ("ingrid", "ingrid123","Ingrid","Troche","itroc001@fiu.edu")';

			$query = "INSERT INTO users (username, password, first_name, last_name, email, confirmcode) 
			VALUES ('".$username."', '".$password."','".$first_name."','".$last_name."','".$email."','".$confirmcode."')";
			$queryResults = mysql_query($query);
			echo "<p>query results = $queryResults</p>";
				//body of email
				$message = 
				"
				This is an automated email.Please Do Not reply  to this email
				Click on the link below or pasted into your browser
				http://localhost/DynaMathVersion1/EXTRA/emailconfirm.php?username=$username&code=$confirmcode
				";

				$subject = "Please confirm your email";
				$headers = "From: Do not reply";

				mail($email, $subject, $message, $headers); 

			    echo "<p>Please Check your Email</p>";
		}
	}	
?>
</body>
</html>