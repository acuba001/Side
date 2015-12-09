<?php
/* session_start(); */
include 'core/init.php';
$arrCount = "";
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$output = "";
	$answers = "";
	$q = "";
	
	$numQuestions = num_of_questions();
	/* $sql = mysql_query("SELECT id FROM questions");
	$numQuestions = mysql_num_rows($sql); */
	
	if(!isset($_SESSION['answer_array']) || count($_SESSION['answer_array']) < 1){
		$currQuestion = "1";
	}else{
		$arrCount = count($_SESSION['answer_array']);
	}
	
	echo "arrCount=".$arrCount;
	echo "numofQuestions=".$numQuestions;
	
	if($arrCount > $numQuestions){
		unset($_SESSION['answer_array']);
		header("location: quizIndex.php");
		exit();
	}
	if($arrCount >= $numQuestions){
		echo 'finished|<p>There are no more questions. Please enter your first and last name and click next</p>
				<form action="userAnswers.php" method="post">
				<input type="hidden" name="complete" value="true">
				<input type="text" name="username">
				<input type="submit" value="Finish">
				</form>';
		exit();
	}
	
	get_quiz_questions($question, $answers);
	
	print("");
	print_r($_POST);
	print("");
	
	
	/* $singleSQL = mysql_query("SELECT * FROM questions WHERE id='$question' LIMIT 1");
	while($row = mysql_fetch_array($singleSQL)){
		$id = $row['id'];
		$thisQuestion = $row['question'];
		$type = $row['type'];
		$question_id = $row['question_id'];
		$q = '<h2>'.$thisQuestion.'</h2>';
		$sql2 = mysql_query("SELECT * FROM answers WHERE question_id='$question' ORDER BY rand()");
		while($row2 = mysql_fetch_array($sql2)){
			$answer = $row2['answer'];
			$correct = $row2['correct'];
			$answers .= '<label style="cursor:pointer;"><input type="radio" name="rads" value="'.$correct.'">'.$answer.'</label> 
			<input type="hidden" id="qid" value="'.$id.'" name="qid"><br /><br />
			';
		
		}
		$output = ''.$q.','.$answers.',<span id="btnSpan"><button onclick="post_answer()">Submit</button></span>';
		echo $output;
	} */
}
	

?>