<?php

include 'core/init.php';
include 'includes/overall/header.php';

$userID = $_SESSION['user_id'];
$results = userInfo($userID);

$name 		= 	$results['first_name']." ".$results['last_name'];
$username 	=   $results['username'];
$email      =   $results['email'];
$password   =   $results['password'];
$passwordRepresentation   =  "***********";

?>

<html>
<body>

	<div class="row">
		<!-- left side -->
		<div class="col-md-3"></div>

		<!-- center side						 -->
		<div class = "col-md-6">
			<h1>General Account Settings</h1>

			<form action = " " method = "POST">
				<label for="inputn3" class="col-sm-4 control-label"> Name</label>
				<input type="text" class="form-control" id="inputfn3" placeholder="<?php echo $name; ?>" name="name"/>
				<br>
				<label for="inputus3" class="col-sm-4 control-label">Username</label>
				<input type="text" class="form-control" id="inputus3" placeholder="<?php echo $username; ?>" name="username"/>
				<br>
				<label for="inputem3" class="col-sm-4 control-label"> Email</label>
				<input type="text" class="form-control" id="inputem3" placeholder="<?php echo $email; ?>" name="email"/>
				<br>
				<label for="inputpass3" class="col-sm-4 control-label">Password</label>
				<input type="password" class="form-control" id="inputpass3" placeholder="<?php echo $passwordRepresentation; ?>" name="password"/>

				<center>
					<br/>
					<input type = "submit" name= "update" value= "update"><br/>
					<br />

				<input type = "submit" name= "delete" value= "delete Account"><br/>
			
				</center>
			</form>
		</div>
		<!-- right side -->
		<div class="col-md-3"></div>
	</div>

	<!-- update response -->
	<div class="row">
		<!-- left side -->
		<div class="col-md-3"></div>

		<!-- middle -->
		<div class="col-md-3">
			<?php 
			
			
			
			if( count($_POST) > 0)
			{
				$nameProvided 		= $_POST['name'];
				$usernamerovided	= $_POST['username'];
				$emailProvided 		= $_POST['email'];
				$passwordProvided 	= $_POST['password'];
				$deleteRequested 	= $_POST['delete'];			
			

				if(!empty($nameProvided))
				{

					echo "<p>changing name </p>";
					//unprepare
					echo "seperate ME PLEASE  ".$name;
					$firstName = "";
					$lastName = "";
					$name 		= 	$results['first_name']." ".$results['last_name'];

					updateUserName($userID, $firstName, $lastName);
				}

				if(!empty($usernamerovided))
				{
					
					echo "<p>changing username </p>";

					updateUserUsername($userID, $usernamerovided);
				}


				if(!empty($emailProvided))
				{
					echo "<p>changing email </p>";
					updateUserEmail($userID, $emailProvided);
				}


				if(!empty($passwordProvided) )
				{
					echo "<p>changing password </p>";

					updateUserPassword($userID, $passwordProvided);
				}
			
				if($deleteRequested)
				{
					delete_user_account($userID);
				}
			}
			?>
		</div>
		<!-- right side -->
		<div class="col-md-3"></div>
	</div>

</body>
</html>
<?php include 'includes/overall/footer.php';?>

