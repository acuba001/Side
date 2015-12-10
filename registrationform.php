<?php 
	include 'includes/overall/header.php'; 
	include 'core/init.php';
?>
<!-- header -->
<html>
	<body>
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="page-header " style = "margin-top:5px; ">
							<h3> Registration Form </h3>
						</div>
						<form class="form-horizontal" action="registrationBackend.php" method="post">
							<div class="form-group">
								<label for="inputfn3" class="col-sm-2 control-label">Name*</label>
								<div class = "col-sm-10">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1"> <span class="glyphicon glyphicon-user" id="basic-addon1"></span></span>
										<input type="text" class="form-control" id="inputfn3" placeholder="First Name" name="first_name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Email*</label>	
								<div class = "col-sm-10">
									<div class="input-group">         
										<span class="input-group-addon" id="basic-addon1">@</span>
										<input type="text" class="form-control" id="inputfn3" placeholder="Email" name="email">	
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputGender2" class= "col-sm-2 control-label">Gender</label>
								<div class = "col-sm-10">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1"> <span class="glyphicon glyphicon-user" id="basic-addon1"></span></span>
										<input type="gender" class="form-control" id="inputGender2" placeholder="Gender">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputUserName2" class= "col-sm-2 control-label">Username*</label>
								<div class = "col-sm-10">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1"> <span class="glyphicon glyphicon-user" id="basic-addon1"></span></span>
										<input type="text" class="form-control" id="inputUsername2" placeholder="Username" name="username">
									</div>
								</div>
							</div>


							<div class="form-group">
								<label for="inputPassword3" class= "col-sm-2 control-label">Password*</label>
								<div class = "col-sm-10">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1"> <span class="glyphicon glyphicon-star" id="basic-addon1"></span></span>
										<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword4" class= "col-sm-2 control-label">Confirm Password*</label>
								<div class = "col-sm-10">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1"> <span class="glyphicon glyphicon-star" id="basic-addon1"></span></span>
										<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password_again">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class = "col-sm-offeset-2 col-sm-10">
									<button type="submit" name= "submit" class="btn btn-primary">Register</button>
									<a class="btn btn-success" type="button" href = "login.php">
										Back to Login
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
<?php 
var_dump($_SESSION);

if(isset($_SESSION['register_error'])){
	echo output_errors($_SESSION['register_error']);
	unset($_SESSION['register_error']);
}
if(isset($_SESSION['check_email'])){
	unset($_SESSION['check_email']);
	echo "<p>Please Check your Email</p>";
}
if(isset($_SESSION['email_error'])){
	unset($_SESSION['email_error']);
	echo "<p>Email verification failed to send</p>";
}





// include 'core/init.php'; 


// /* /* if(empty($_POST) === false){
	// $required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
	// foreach($_POST as $key=>$value){
		// if(empty($value) && in_array($key, $required_fields) === true){
			// $errors[] = 'Fields with an asterisk are required.';
			// break 1;
		// }
	// }
	
	// if(empty($errors) === true){
		// if(user_exists($_POST['username']) === true){
			// $errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		// }
		// if(preg_match("/\\s/", $_POST['username']) == true){
			// $errors[] = 'Your username must not contain any spaces.';
		// }
		// if(strlen($_POST['password']) < 6){
			// $errors[] = 'Your password must be at least 6 characters.';
		// }
		// if($_POST['password'] !== $_POST['password_again']){
			// $errors[] = 'The passwords do not match.';
		// }
		// if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === true){
			// $errors[] = 'A valid email address is required.';
		// }
		// if(email_exists($_POST['email']) === true){
			// $errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use.';
		// }
	// }
// }


// if(isset($_GET['success']) && empty($_GET['success'])){
	// echo 'Registration is a success.';
// }else{


	// if(empty($_POST) === false && empty($errors) === true){
		// $register_data = array(
			// 'username' 		=> $_POST['username'],
			// 'password' 		=> $_POST['password'],
			// 'first_name' 	=> $_POST['first_name'],
			// 'last_name' 	=> $_POST['last_name'],
			// 'email' 		=> $_POST['email']
			// );
		
		// register_user($register_data);
		// header('Location: register.php?success');
		// exit();
		
	// }else if(empty($errors) === false){
		// echo output_errors($errors);
	// }

	// if(isset($_POST['submit']))
	// {
		// $options = array('cost' => 10);
		// $password = password_hash(sanitize($_POST['password']), PASSWORD_BCRYPT, $options);
		// $info = array();
		// $info['username'] = sanitize($_POST['username']);
		// $info['password'] = $password;
		// $info['first_name'] = sanitize($_POST['first_name']);
		// $info['last_name'] = "Last";
		// $info['email'] = sanitize($_POST['email']);

		// /* $enc_password = md5($password);
 // */

		// if($info['username'] && $info['email'] && $info['password'] && empty($errors))
		// {

			// $info['confirmcode'] = rand();
			// /* $confirmcode = = rand(); */			
			
			// register_user($info);
			
			// /* $query = "INSERT INTO users (username, password, first_name, last_name, email, confirmcode) 
				// VALUES ('".$username."', '".$password."','".$first_name."','".$last_name."','".$email."','".$confirmcode."')";
			// $queryResults = mysql_query($query); */
			

				// body of email
				// $message = 
				// "
				// This is an automated email.Please Do Not reply  to this email
				// Click on the link below or pasted into your browser
				// http://localhost/DynaMathVersion1.3/emailconfirm.php?username=".$info['username']."&code=".$info['confirmcode']
				// ;

				// $subject = "Please confirm your email";
				// $headers = "From:dynamicmathematicsprinciples@gmail.com";

				// if(mail($info['email'], $subject, $message, $headers)){
					// echo "<p>Please Check your Email</p>";
				// } else{
					// echo "<p>Email verification failed to send</p>";
				// }

			    
		// }
		// echo output_errors($errors);
	// }	 */ */





	?>


	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		</html>
	</body>





	<?php
//}

	include 'includes/overall/footer.php';
	?>