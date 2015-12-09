<?php

session_start();
require "dbc.php";

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$enc_password = md5($password);

if($username&&$password)
{
	$query = mysql_query("SELECT * FROM tutorial WHERE username ='$username'");

	if($numrow!=0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$db_username = $row['username'];
			$db_password = $row['password'];
			$db_confirmed = $row['confirmed '];
		}
		if($username == $db_username&&$enc_password==$db_password)
		{
			if($db_confirmed == 1)
			{

				//echo logged in <a href = 'members.php'>click gere to ebter the members area </a>";
			$_SESSION['username'] = $db_username;
			header("location: members.php");

			}
			else
			{
				header("location: index.php?error=Incorrect Password");
			}

		}
		else
		{
			header("location: index.php?error=Your account is not activated");
		}
	}
	else
	{
		header("location: index.php?error=that user doesnt exits");
	}

}

?>