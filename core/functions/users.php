<?php 

$GLOBALS['dbConnection'] = mysqli_connect("localhost", "root", "", "lr") or die("Cannot connect to database.");

mysqli_query ( $GLOBALS['dbConnection'], 'SET NAMES utf8' );

function register_user($register_data){

	if(!$GLOBALS['dbConnection'])
    {
      echo "Unable to connect to MySQL.".PHP_EOL;
      return 0;
    }
	
	array_walk($register_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	$result  = mysqli_query($GLOBALS['dbConnection'], "INSERT INTO `users` ($fields) VALUES ($data)");
	
    if($result)
    {
      return 1;
    }
    
    return -2;
}

/* function register_user($register_data){
	array_walk($register_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';

	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
} */

function user_count()
{
	
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT COUNT(`user_id`) FROM `users` WHERE active = 1");
	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return $datarow[0];
}

/* function user_count(){
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE active = 1"), 0);
} */

function user_data($user_id){

	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1){
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysqli_fetch_assoc(mysqli_query($GLOBALS['dbConnection'], "SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;
	}
}

/* function user_data($user_id){

	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1){
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;
	}
} */

function userInfo($user_id){

	$user_id = (int)$user_id;

	$data = mysqli_fetch_assoc(mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM `users` WHERE `user_id` = $user_id"));

	return $data;

}

/* function userInfo($user_id){

	$user_id = (int)$user_id;

	$data = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `user_id` = $user_id"));

	return $data;

} */

function updateUserName($user_id, $firstName, $lastName){

	$user_id = (int)$user_id;

	$query = 	"UPDATE `users` SET `first_name` = '$firstName', `last_name` = '$lastName' WHERE `user_id` = $user_id";

	$data = mysqli_query($GLOBALS['dbConnection'], $query);
	return $data;
}//eom

/* function updateUserName($user_id, $firstName, $lastName){

	$user_id = (int)$user_id;

	$query = 	"UPDATE `users` SET `first_name` = '$firstName', `last_name` = '$lastName' WHERE `user_id` = $user_id";

	$data = mysql_query($query);
	return $data;
}//eom */

function updateUserUsername($user_id, $username){

	$user_id = (int)$user_id;

	$query = 	"UPDATE `users` SET `username` = '$username' WHERE `user_id` = $user_id";

	$data = mysqli_query($GLOBALS['dbConnection'], $query);
	return $data;
}//eom

/* function updateUserUsername($user_id, $username){

	$user_id = (int)$user_id;

	$query = 	"UPDATE `users` SET `username` = '$username' WHERE `user_id` = '$user_id'";

	$data = mysql_query($query);
	return $data;
}//eom */

function updateUserEmail($user_id, $email){

	$user_id = (int)$user_id;

	$query = 	"UPDATE `users` SET `email` = '$email' WHERE `user_id` = $user_id";

	$data = mysqli_query($GLOBALS['dbConnection'], $query);
	return $data;
}//eom

/* function updateUserEmail($user_id, $email){

	$user_id = (int)$user_id;

	$query = 	"UPDATE `users` SET `email` = '$email' WHERE `user_id` = $user_id";

	$data = mysql_query($query);
	return $data;
}//eom */

function updateUserPassword($user_id, $password){	

	$user_id = (int)$user_id;

	$query = 	"UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id";

	$data = mysqli_query($GLOBALS['dbConnection'], $query);
	return $data;
}//eom

/* function updateUserPassword($user_id, $password){	

	$user_id = (int)$user_id;

	$query = 	"UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id";

	$data = mysql_query($query);
	return $data;
}//eom */


function logged_in(){
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username){
	$username = sanitize($username);
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'") or die(mysqli_error($GLOBALS['dbConnection']));
	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return ($datarow[0] > 0) ? true : false;
}

/* function user_exists($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
} */

function email_exists($email){
	$email = sanitize($email);
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'") or die(mysqli_error($GLOBALS['dbConnection']));
	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return ($datarow[0] > 0) ? true : false;
}

/* function email_exists($email){
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
	return (mysql_result($query, 0) == 1) ? true : false;
} */

function user_active($username){
	$username = sanitize($username);
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1")or die(mysqli_error($GLOBALS['dbConnection']));
	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return ($datarow[0] == 1) ? true : false;
}

/* function user_active($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
	return (mysql_result($query, 0) == 1) ? true : false;
} */

function user_id_from_username($username){
	$username = sanitize($username);
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT `user_id` FROM `users` WHERE `username` = '$username'")or die(mysqli_error($GLOBALS['dbConnection']));
	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return $datarow['user_id'];
}

/* function user_id_from_username($username){
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, 'user_id');
} */

function login($emailOrUsername, $password)
{
      //preparing the mysql query for the user account lookup
      $query      = "SELECT *
                     FROM `users` 
                     WHERE username ='".$emailOrUsername."' or email='".$emailOrUsername."'";
      //querying database
      $result     = mysqli_query($GLOBALS['dbConnection'], $query)or die(mysqli_error($GLOBALS['dbConnection']));
      $row        = mysqli_fetch_array( $result, MYSQLI_ASSOC );
      $rowResult  = array_filter($row);
      //check if no user exist with credentials provided
      if( empty($row) )
      {
       // return -1;
      	  return false;
      }
      //check if password provided is Valid
      
        //cleaning provided password
        $cleanpass        = mysqli_real_escape_string($GLOBALS['dbConnection'], $password);
        $DB_Password      = $row['password'];
        $passwordResults  = password_verify($cleanpass, $DB_Password);

        if($passwordResults) 
        {
            echo 'Password is valid!';

        	$userID = $row['user_id'];

        	echo "user id:".$userID;
        	return $row['user_id'];
          // return 1;
        } 
      // echo "invalid password";
      //return -1;
	  
      return false;
}//eom

/* function login($username, $password){
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = sanitize($password);
	
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return ($datarow[0] == 1) ? $user_id : false;
} */

/* function login($username, $password){
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = sanitize($password);
	
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
	
	return (mysql_result($query, 0) == 1) ? $user_id : false;
} */

function get_questions($user_id, $survey_id)
{
	$questionIDList = array();

	$query = "SELECT * FROM survey_questions WHERE survey_id='$survey_id'";
	$res = mysqli_query($GLOBALS['dbConnection'], $query)or die(mysqli_error($GLOBALS['dbConnection']));
	if($res)
	{
?>
	<form action="" method="post">
<?php
		while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
		{
			$body = $row['question_body'];
			$q_id = $row['question_id'];
			
			//adding current question to questionIDList
			array_push($questionIDList, $q_id);

			?>
			<div class="entry">
			<h3 class="qTitle">
				<?php echo ($body); ?>
			</h3><!-- 
				<form action="" method="post"> -->
					<Strong>Strongly Disagree</Strong>
					<input type="radio" name="<?php echo $q_id; ?>" value="1" />
					<input type="radio" name="<?php echo $q_id; ?>" value="2" />
					<input type="radio" name="<?php echo $q_id; ?>" value="3" />
					<input type="radio" name="<?php echo $q_id; ?>" value="4" />
					<input type="radio" name="<?php echo $q_id; ?>" value="5" />
					<Strong>Strongly Agree</Strong>
				<!-- </form> -->
			</div>
			<br>
			<?php
		}//eowl
		?>
			<br><br>
			<center>
				<!-- <form action="" method="post"> -->
					<input type="submit" value="Submit" name="submit" />
				<!-- </form> -->
			</center>
	</form>
		<?php
	}
		//print_r($_POST);

		if(isset($_POST['submit'])){
		$questionAnswers = array();

		for($iter = 0 ; $iter < count($questionIDList) ; $iter++)
		{
			//current question ID
			$currQuestionID = $questionIDList[$iter];

			//current answer
			$curr_answer 	= $_POST[$currQuestionID];

			array_push($questionAnswers, $curr_answer);
		}//eofl

		//echo "<p>total questions answers ".count($questionAnswers)."</p>";

		for($iter = 0 ; $iter < count($questionAnswers) ; $iter++)
		{
			//current question ID
			$currQuestionID = $questionIDList[$iter];

			//current answer
			$curr_answer 	= $questionAnswers[$iter];

			echo "<p> [".$iter."]"." '".$curr_answer."'</p>";

			$query2 = "INSERT INTO survey_answers (question_id, user_id, answer_body) 
						VALUES ('".$currQuestionID."', '".$user_id."', '".$curr_answer."')";
			mysqli_query($GLOBALS['dbConnection'], $query2)or die(mysqli_error($GLOBALS['dbConnection']));
		}
		// while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		// {
		// 	//current question ID
		// 	$currQuestionID = $row['question_id'];

		// 	//current answer
		// 	$curr_answer 	= $_POST[$q_id];

		// 	echo "<p> [".$q_id."]"." '".$curr_answer."'</p>";

		// 	$query = "INSERT INTO survey_answers (question_id, user_id, answer_body) 
		// 				VALUES ('".$currQuestionID."', '".$user_id."', '".$curr_answer."')";
		// 	mysql_query($query);
		// }
		
		?>
			<script type="text/javascript">location.href = 'http://localhost/DynaMathVersion1.3/index.php';</script>
		<?php
	}
}

/* function get_questions($user_id, $survey_id)
{
	$questionIDList = array();

	$query = "SELECT * FROM survey_questions WHERE survey_id='$survey_id'";
	$result = mysql_query($query);
	if($result)
	{
?>
	<form action="" method="post">
<?php
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$body = $row['question_body'];
			$q_id = $row['question_id'];
			
			//adding current question to questionIDList
			array_push($questionIDList, $q_id);

			?>
			<div class="entry">
			<h3 class="qTitle">
				<?php echo $body; ?>
			</h3><!-- 
				<form action="" method="post"> -->
					<Strong>Strongly Disagree</Strong>
					<input type="radio" name="<?php echo $q_id; ?>" value="1" />
					<input type="radio" name="<?php echo $q_id; ?>" value="2" />
					<input type="radio" name="<?php echo $q_id; ?>" value="3" />
					<input type="radio" name="<?php echo $q_id; ?>" value="4" />
					<input type="radio" name="<?php echo $q_id; ?>" value="5" />
					<Strong>Strongly Agree</Strong>
				<!-- </form> -->
			</div>
			<br>
			<?php
		}//eowl
		?>
			<br><br>
			<center>
				<!-- <form action="" method="post"> -->
					<input type="submit" value="Submit" name="submit" />
				<!-- </form> -->
			</center>
	</form>
		<?php
	}
		//print_r($_POST);

		if(isset($_POST['submit'])){
		$questionAnswers = array();

		for($iter = 0 ; $iter < count($questionIDList) ; $iter++)
		{
			//current question ID
			$currQuestionID = $questionIDList[$iter];

			//current answer
			$curr_answer 	= $_POST[$currQuestionID];

			array_push($questionAnswers, $curr_answer);
		}//eofl

		//echo "<p>total questions answers ".count($questionAnswers)."</p>";

		for($iter = 0 ; $iter < count($questionAnswers) ; $iter++)
		{
			//current question ID
			$currQuestionID = $questionIDList[$iter];

			//current answer
			$curr_answer 	= $questionAnswers[$iter];

			echo "<p> [".$iter."]"." '".$curr_answer."'</p>";

			$query2 = "INSERT INTO survey_answers (question_id, user_id, answer_body) 
						VALUES ('".$currQuestionID."', '".$user_id."', '".$curr_answer."')";
			mysql_query($query2);
		}
		// while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		// {
		// 	//current question ID
		// 	$currQuestionID = $row['question_id'];

		// 	//current answer
		// 	$curr_answer 	= $_POST[$q_id];

		// 	echo "<p> [".$q_id."]"." '".$curr_answer."'</p>";

		// 	$query = "INSERT INTO survey_answers (question_id, user_id, answer_body) 
		// 				VALUES ('".$currQuestionID."', '".$user_id."', '".$curr_answer."')";
		// 	mysql_query($query);
		// }
		}
	
} */

function delete_user_account($userID)
{
$del_from_db= mysqli_query($GLOBALS['dbConnection'], "DELETE FROM users WHERE user_id = '$userID'")or die(mysqli_error($GLOBALS['dbConnection']));
echo"<p>Deleted";

}

/* function delete_user_account($userID)
{
$del_from_db= mysql_query("DELETE FROM users WHERE user_id = '$userID'");
echo
"<p>Deleted";

} */

function confirmcode_from_username($username){
	$username = sanitize($username);
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT `confirmcode` FROM `users` WHERE `username` = '$username'")or die(mysqli_error($GLOBALS['dbConnection']));
	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return $datarow['confirmcode'];
}

function activateUser($username){	

	$username = sanitize($username);

	$query = 	"UPDATE users SET active = '1' WHERE username = '$username'";

	$data = mysqli_query($GLOBALS['dbConnection'], $query) or die(mysqli_error($GLOBALS['dbConnection']))or die(mysqli_error($GLOBALS['dbConnection']));
	return $data;
}

function update_quiz_answers($quiz_id, $question, $type){
	
	$question = strip_tags($question);
	$question = mysqli_real_escape_string($GLOBALS['dbConnection'], $question);
	mysqli_query($GLOBALS['dbConnection'], "INSERT INTO quiz_questions (quiz_id, question, type) VALUES ('$quiz_id', '$question', '$type')")or die(mysqli_error($GLOBALS['dbConnection']));
	$lastId = mysqli_insert_id($GLOBALS['dbConnection']);
	mysqli_query($GLOBALS['dbConnection'], "UPDATE quiz_questions SET question_id='$lastId' WHERE id='$lastId' LIMIT 1")or die(mysqli_error($GLOBALS['dbConnection']));
	return $lastId;
}

function record_choice_correct($quiz_id, $lastId, $answer){
	
	$answer = strip_tags($answer);
	$answer = mysqli_real_escape_string($GLOBALS['dbConnection'], $answer);
	
	mysqli_query($GLOBALS['dbConnection'], "INSERT INTO quiz_answers (quiz_id, question_id, answer, correct) VALUES ('$quiz_id', '$lastId', '$answer', '1')")or die(mysqli_error($GLOBALS['dbConnection']));
	
}

function record_choice_incorrect($quiz_id, $lastId, $answer){
	
	$answer = strip_tags($answer);
	$answer = mysqli_real_escape_string($GLOBALS['dbConnection'], $answer);
	
	mysqli_query($GLOBALS['dbConnection'], "INSERT INTO quiz_answers (quiz_id, question_id, answer, correct) VALUES ('$quiz_id', '$lastId', '$answer', '0')")or die(mysqli_error($GLOBALS['dbConnection']));
}

function reset_quiz(){
	
	mysqli_query($GLOBALS['dbConnection'], "TRUNCATE TABLE quiz_questions")or die(mysqli_error($GLOBALS['dbConnection']));
	
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT id FROM quiz_questions LIMIT 1")or die(mysqli_error($GLOBALS['dbConnection']));
	
	//return mysqli_num_rows($sql);

	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return $datarow[0];
}

function reset_choices(){
	
	mysqli_query($GLOBALS['dbConnection'], "TRUNCATE TABLE quiz_answers")or die(mysqli_error($GLOBALS['dbConnection']));
	
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT id FROM quiz_answers LIMIT 1")or die(mysqli_error($GLOBALS['dbConnection']));
	
	//return mysqli_num_rows($sql);
	
	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return $datarow[0];
}

function reset_this_quiz($quiz_id){
	
	mysqli_query($GLOBALS['dbConnection'], "DELETE quiz_questions WHERE quiz_id=$quiz_id")or die(mysqli_error($GLOBALS['dbConnection']));
	mysqli_query($GLOBALS['dbConnection'], "DELETE quiz_answers WHERE quiz_id=$quiz_id")or die(mysqli_error($GLOBALS['dbConnection']));
	
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT id FROM quiz_questions LIMIT 1")or die(mysqli_error($GLOBALS['dbConnection']));
	
	//return mysqli_num_rows($sql);

	$res->data_seek(0);
    $datarow = $res->fetch_array();
	return $datarow[0];
}

function num_of_questions(){
	
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT id FROM quiz_questions");
	return mysqli_num_rows($res);
	
	/* $query = $GLOBALS['dbConnection']->prepare("SELECT id FROM questions");
	$query->execute();
	$query->store_result();

	return $query->num_rows; */

	
	/* $res->data_seek(0);
    $datarow = $res->fetch_array();
	return $datarow[0]; */
}

function get_quiz_questionsINGRIDSOUL($question, $answers){
	
	$singleSQL = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM quiz_questions WHERE id='$question' LIMIT 1");
	while($row = mysqli_fetch_array($singleSQL)){
		$id = $row['id'];
		$thisQuestion = $row['question'];
		$type = $row['type'];
		$question_id = $row['question_id'];
		$q = '<h2>'.$thisQuestion.'</h2>';
		$sql2 = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM quiz_answers WHERE question_id='$question' ORDER BY rand()");

				while($row2 = mysqli_fetch_array($sql2)){
					$answer = $row2['answer'];
					$correct = $row2['correct'];
					$answers .= '<label style="cursor:pointer;"><input type="radio" name="rads" value="'.$correct.'">'.$answer.'</label> 
					<input type="hidden" id="qid" value="'.$id.'" name="qid"><br /><br />
					';
				
				}//eowl

				$output = ''.$q.','.$answers.',<span id="btnSpan"><button onclick="post_answer()">Submit</button></span>';
			echo $output;		
	}
}


function get_quiz_question($questionID){
	
	$singleSQL = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM quiz_questions WHERE question_id='$questionID'")or die(mysqli_error($GLOBALS['dbConnection']));
	while($row = mysqli_fetch_array($singleSQL)){
		
			$thisQuestion 	= $row['question'];
			$type 			= $row['type'];
			?>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="page-header " style = "margin-top:5px; ">
									<h2><?php echo $thisQuestion; ?></h2>
								</div>
								<form action="" method="POST">
			<?php
			
			//fetching answers
			$sql2 = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM quiz_answers WHERE question_id='$questionID' ORDER BY rand()");

					while($row2 = mysqli_fetch_array($sql2))
					{
						$answerID   = $row2['id'];
						$answer 	= $row2['answer'];
						$correct 	= $row2['correct'];
			
						?>
									<input type="radio" name="choice" value="<?php echo $answerID; ?>"/>
									<?php echo $answer; ?>
									<br>
						<?php
					}//eowl
					?>
					
									<input type="submit" value="Submit">
								</form>
							</div>
						</div>
					</div>
				</div>
					<?php
	}//eo-outer wl
	
	/* $row = mysqli_fetch_array($singleSQL);
	$thisQuestion 	= $row['question'];
	$type 			= $row['type'];
	$questionID		= $row['question_id'];
	//print("THIS HAPPENED!".$questionID);
	?>
		
		<h2>
			<?php echo $thisQuestion; ?>
		</h2>
	
	<form action="" method="POST">
	<?php
	
	//fetching answers
	$sql2 = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM quiz_answers WHERE question_id='$questionID' ORDER BY rand()");

			while($row2 = mysqli_fetch_array($sql2))
			{
				$answerID   = $row2['id'];
				$answer 	= $row2['answer'];
				$correct 	= $row2['correct'];
	
				?>
					<input type="radio" name="choice" value="<?php echo $answerID; ?>"/>
					<?php echo $answer; ?>
					<br>
				<?php
			}//eowl
			?>
			
			 <input type="submit" value="Submit">
			</form>
			<?php  */
			
			return $questionID;
}//eom

function is_correct($answerID){
	
	$res = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM quiz_answers WHERE id='$answerID'");
	$row = mysqli_fetch_array($res);
	return $row['correct'];
}



function question_count($quiz_id){
	
	$countCheck = mysqli_query($GLOBALS['dbConnection'], "SELECT id FROM quiz_questions WHERE quiz_id='$quiz_id'")or die(mysqli_error($GLOBALS['dbConnection']));
	return mysqli_num_rows($countCheck);
}

function record_quiz_results($quiz_id, $username, $percent){
	
	return mysqli_query($GLOBALS['dbConnection'], "INSERT INTO quiz_takers (quiz_id, username, percentage, date_time) VALUES ('$quiz_id', '$username', '$percent', now())")or die(mysqli_error($GLOBALS['dbConnection']));
}

function create_quiz($name, $description){
	
	mysqli_query($GLOBALS['dbConnection'], "INSERT INTO quizes (quiz_name, quiz_description) VALUES ('$name', '$description')")or die(mysqli_error($GLOBALS['dbConnection']));

	return mysqli_insert_id($GLOBALS['dbConnection']);
}

function choose_quiz(){
	
	$singleSQL = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM quizes");
	
	?>
		<p>
		Choose a quiz:
		<select name="formQuiz">
		<option value="">Select...</option>
	<?php
	  
	
	while($row = mysqli_fetch_array($singleSQL)){
		?>
			<option value=<?php echo $row['quiz_id']; ?>><?php echo $row['quiz_name'];?></option>
		<?php
	}
	?>
		</select>
		</p>
	<?php
}

function first_question($quiz_id){
	
	$singleSQL = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM quiz_questions WHERE quiz_id='$quiz_id' LIMIT 1");
	$row = mysqli_fetch_array($singleSQL);
	return $row['question_id'];
}

function get_activities(){
	
	$singleSQL = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM pages WHERE page_type='a'")or die(mysqli_error($GLOBALS['dbConnection']));
	while($row = mysqli_fetch_array($singleSQL)){
		
		$name 			= $row['name'];
		$description 	= $row['description'];
		$location		= $row['location'];
		?>
			
			<h3><a href=<?php echo $location; ?>><?php echo $name; ?></a></h3>
			<?php echo $description; ?>
			<br>
			<?php
	}
}

function get_funfacts(){
	
	$singleSQL = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM pages WHERE page_type='f'")or die(mysqli_error($GLOBALS['dbConnection']));
	while($row = mysqli_fetch_array($singleSQL)){
		
		$name 			= $row['name'];
		$description 	= $row['description'];
		$location		= $row['location'];
		?>
			
			<h3><a href=<?php echo $location; ?>><?php echo $name; ?></a></h3>
			<?php echo $description; ?>
			<br>
			<?php
	}
}

function get_history(){
	
	$singleSQL = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM pages WHERE page_type='h'")or die(mysqli_error($GLOBALS['dbConnection']));
	while($row = mysqli_fetch_array($singleSQL)){
		
		$name 			= $row['name'];
		$description 	= $row['description'];
		$location		= $row['location'];
		?>
			
			<h3><a href=<?php echo $location; ?>><?php echo $name; ?></a></h3>
			<?php echo sanitize($description); ?>
			<br>
			<?php
	}
}

function search_results($keyword){
	
	$search_query = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM pages WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%'") or die(mysqli_error($GLOBALS['dbConnection']));

	if(mysqli_num_rows($search_query) != 0){
		$search_rs = mysqli_fetch_assoc($search_query);
	}
	
	if(mysqli_num_rows($search_query)!=0){
		do{ ?>
	<h3><a href=<?php echo $search_rs['location']; ?>><?php echo $search_rs['name']; ?></a></h3>
			<?php echo sanitize($search_rs['description']); ?>
			<br>
	<?php	}
	
	while($search_rs = mysqli_fetch_assoc($search_query));

	}else {
		echo "No results found";
	}
}

function rate($page){
	
	$find_data = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM rates WHERE activity='$page'")or die(mysqli_error($GLOBALS['dbConnection']));

	$row = mysqli_fetch_assoc($find_data);
	$id = $row['id'];
	$name_of_activity = $row['nameofactivity'];
	$activity = $row['activity'];
	if($row['hits'] != 0){
		$current_rating = $row['rating']/$row['hits'];
	}else{
		$current_rating = 0;
	}
	$current_hits = $row['hits'];

	echo "

	<form  action = 'rate.php' method= 'POST'>
			<select name = 'rating'>
				<option>1</option>
				<option>2</option>	
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>

	</select>		
		<input type = 'hidden' value = '$activity' name = 'activity'>
		<input type = 'hidden' value = '$page' name = 'page'>
		<input type = 'submit'value = 'Rate!'></br> Current Rating:"; echo round ($current_rating,1); echo "
			</form>

	";
	
}

function rating(){

	$activity = $_POST['activity'];
	$post_rating = $_POST['rating'];

	$find_data = mysqli_query($GLOBALS['dbConnection'], "SELECT * FROM  rates WHERE activity ='$activity'");

	$row = mysqli_fetch_assoc($find_data);
	
	$id = $row['id'];
	$current_rating = $row['rating'];
	$current_hits = $row['hits'];


		

	$new_hits = $current_hits + 1;
	$update_hits = mysqli_query($GLOBALS['dbConnection'], "UPDATE rates  SET hits = '$new_hits' WHERE id ='$id'");

	$new_rating = $post_rating + $current_rating;

	$update_rating =mysqli_query($GLOBALS['dbConnection'], "UPDATE rates SET rating = '$new_rating' WHERE id = '$id'");


	header("location:".$_POST['page'].".php");
}
?>