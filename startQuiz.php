<?php
include 'core/init.php';

$_SESSION['startQuiz'] = 1;
$_SESSION['quizID'] = $_POST['formQuiz'];
$_SESSION['last_id'] = first_question($_SESSION['quizID']);
$_SESSION['quiz_tally_array'] = array();
$_SESSION['exiting'] = 'http://localhost/DynaMathVersion1.3/quizIndex.php';

header('Location: http://localhost/DynaMathVersion1.3/quiz.php');

?>