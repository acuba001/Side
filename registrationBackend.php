<?php  
include 'core/init.php';


if(empty($_POST) === false){
	$required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'Fields with an asterisk are required.';
			break 1;
		}
	}
	
	if(empty($errors) === true){
		if(user_exists($_POST['username']) === true){
			$errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		}
		if(preg_match("/\\s/", $_POST['username']) == true){
			$errors[] = 'Your username must not contain any spaces.';
		}
		if(strlen($_POST['password']) < 6){
			$errors[] = 'Your password must be at least 6 characters.';
		}
		if($_POST['password'] !== $_POST['password_again']){
			$errors[] = 'The passwords do not match.';
		}
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === true){
			$errors[] = 'A valid email address is required.';
		}
		if(email_exists($_POST['email']) === true){
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use.';
		}
	}
}


if(isset($_GET['success']) && empty($_GET['success'])){
	echo 'Registration is a success.';
}else{


	// if(empty($_POST) === false && empty($errors) === true){
	// 	$register_data = array(
	// 		'username' 		=> $_POST['username'],
	// 		'password' 		=> $_POST['password'],
	// 		'first_name' 	=> $_POST['first_name'],
	// 		'last_name' 	=> $_POST['last_name'],
	// 		'email' 		=> $_POST['email']
	// 		);
		
	// 	register_user($register_data);
	// 	header('Location: register.php?success');
	// 	exit();
		
	// }else if(empty($errors) === false){
	// 	echo output_errors($errors);
	// }

	if(isset($_POST['submit']))
	{
		$options = array('cost' => 10);
		$password = password_hash(sanitize($_POST['password']), PASSWORD_BCRYPT, $options);
		$info = array();
		$info['username'] = sanitize($_POST['username']);
		$info['password'] = $password;
		$info['first_name'] = sanitize($_POST['first_name']);
		$info['last_name'] = "Last";
		$info['email'] = sanitize($_POST['email']);

		/* $enc_password = md5($password);
 */

		if($info['username'] && $info['email'] && $info['password'] && empty($errors))
		{

			$info['confirmcode'] = rand();
			/* $confirmcode = = rand(); */			
			
			register_user($info);
			
			/* $query = "INSERT INTO users (username, password, first_name, last_name, email, confirmcode) 
				VALUES ('".$username."', '".$password."','".$first_name."','".$last_name."','".$email."','".$confirmcode."')";
			$queryResults = mysql_query($query); */
			

				//body of email
				$message = 
				"
				This is an automated email.Please Do Not reply  to this email
				Click on the link below or pasted into your browser
				http://localhost/DynaMathVersion1.3/emailconfirm.php?username=".$info['username']."&code=".$info['confirmcode']
				;

				$subject = "Please confirm your email";
				$headers = "From:dynamicmathematicsprinciples@gmail.com";

				if(mail($info['email'], $subject, $message, $headers)){
					$_SESSION['check_email'] = "true";
					//echo "<p>Please Check your Email</p>";
				} else{
					$_SESSION['email_error'] = "true";
					//echo "<p>Email verification failed to send</p>";
				}

			    header("Location: registrationform.php");
		}
		//echo output_errors($errors);
		$_SESSION['register_error'] = $errors;
		header("Location: registrationform.php");
	}		
}	
?>