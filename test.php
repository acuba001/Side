<?php 
include 'includes/overall/header.php'; 
include 'core/init.php';

$db = mysqli_connect("localhost", "root", "", "lr");

/* if($res = mysqli_query($db, "INSERT INTO `lr`.`users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`, `passreset`, `code`, `confirmed`, `confirmcode`) VALUES (NULL, 'test', '123', 'test', 'last', 'andrescubas@yahoo.com', '1', '', '', '', '')")){
	echo "It worked";
}else{
	echo "It didn't work";
} */
?>