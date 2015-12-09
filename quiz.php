<?php
include 'core/init.php';
include 'includes/overall/header.php';

$quiz_id = $_SESSION['quizID'];
$doWeStartQuiz = $_SESSION['startQuiz'];
$prevQuestionID =  $_SESSION['last_id'];

//print("HERE:".$prevQuestionID);
/* session_start(); */
//if(isset($_GET['question'])){
	

if($doWeStartQuiz){
	
	/* $question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$next = $question + 1;
	$prev = $question - 1;
	
	
	print("  INSIDE QUIZ, the qid:");
	print_r($_SESSION['qid_array']);
	print("");

	if(!isset($_SESSION['qid_array']) && $question != 1){
		$msg = "Sorry! No cheating.";
		//header("location: quizIndex.php?msg=$msg");
		//exit();
	}
	if(isset($_SESSION['qid_array']) && in_array($question, $_SESSION['qid_array'])){
		print("this is the first");
		$msg = "Sorry, Cheating is not allowed. You will now have to start over. Haha.";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		//header("location: quizIndex.php?msg=$msg");
		//exit();
	}
	if(isset($_SESSION['lastQuestion']) && $_SESSION['lastQuestion'] != $prev){
		print("Sorry, Cheating is not allowed. You will now have to start over. Haha.");
		$msg = "Sorry, Cheating is not allowed. You will now have to start over. Haha.";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		//header("location: quizIndex.php?msg=$msg");
		//exit();
	} */
}
?>
<html>
<header>
</header>
<body>
<?php
	/* print("question_count=".question_count($quiz_id));
	print(" ");
	print("questions done=".count($_SESSION['quiz_tally_array']));
	print(" ");
	print("questionID=".$_SESSION['questionID']); */
	
	$count = question_count($quiz_id);
	
	if(count($_SESSION['quiz_tally_array']) + 1 < question_count($quiz_id)){
		
		get_quiz_question($prevQuestionID);
		
		$_SESSION['last_id']++;
		
		if(isset($_POST['choice'])){
			$choice = $_POST['choice'];
			$correct = is_correct($choice);
			array_push($_SESSION['quiz_tally_array'], $correct);
			
			/* print("");
			print_r($_POST);
			print("");
			var_dump($_SESSION); */
		}
	}else{
		if(isset($_POST['choice'])){
			array_push($_SESSION['quiz_tally_array'], is_correct($_POST['choice']));
		}
		$numCorrect = 0;
		foreach($_SESSION['quiz_tally_array'] as $current){
			if($current > 0){
				$numCorrect++;
			}
		}
		$percent = $numCorrect / $count * 100;
		$percent = intval($percent);
		
		/* print_r($_SESSION);
		echo " percent=".$percent;
		echo " numcorrect=".$numCorrect; */
		
		?>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="page-header " style = "margin-top:5px; ">
								<h2>Please Input your name</h2>
							</div>
							<form action="" method="post">
								Name: <input type="text" name="name"><br>
								<input type="submit">
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php
		
		if(isset($_POST['name'])){
			if(!empty($_POST['name'])){
				record_quiz_results($quiz_id, $_POST['name'], $percent);
		
				unset($_SESSION['startQuiz']);
				unset($_SESSION['last_id']);
				unset($_SESSION['quiz_tally_array']);
				$_SESSION['startQuiz'] = 0;
				header("Location: ".$_SESSION['exiting']."?msg=$percent");
			}else{
				print("Please, input something.");
			}
		}
	}
	///check if user was correct or incorrect 
?>
</body>
</html>
<?php include 'includes/overall/footer.php';?>

