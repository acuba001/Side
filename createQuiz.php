<?php
include 'core/init.php';

$_SESSION['creating_quiz'] = 1;

$name = sanitize(strip_tags($_POST['name']));
$description = sanitize(strip_tags($_POST['description']));

//print("name=".$name." descrip=".$description);
$_SESSION['quiz_id'] = create_quiz($name, $description);

header('Location: http://localhost/DynaMathVersion1.3/addQuestions.php');

?>