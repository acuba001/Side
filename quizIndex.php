<?php 

include 'core/init.php';

$_SESSION['startQuiz'] = 0;
$_SESSION['question'] = 1;

$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	/* $msg = strip_tags($msg);
	$msg = addslashes($msg); */
	
	?>
	
	<h2>Quiz Score: <?php echo $msg."%"?></h2>
	
	<?php
}
?>

<html>
<header>
</header>
<body>
<h3>Click below when you are ready to start the quiz</h3>

<form action="startQuiz.php" method="POST">
  <?php choose_quiz(); ?>
  <span>
  <input type="submit" value="Submit">
  Click Here To Begin
  </span>
</form>

</body>
</html
