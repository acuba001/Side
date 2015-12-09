<html>
<head>
<title>Email confirmation tutorial</title>
</head>
<body>

	<?php

		include "dbc.php";

		$username = $_GET['username'];
		$code = $_GET['code'];

		$query = "SELECT * FROM users WHERE username = '".$username."'";
		$queryResults = mysql_query($query);

		// echo "<p>query results = $queryResults</p>";//testing
		
		$numRows = mysql_num_rows($queryResults);
		// echo "<p>".$numRows."</p>";//testing
		for($iter = 0; $iter < $numRows; $iter++)
		{
			$row = mysql_fetch_assoc($queryResults);
			$rowData = $row['confirmcode'];
			// echo "<p>iter = ".$iter." | data = ".$rowData."</p>";//testing
			if( isset($rowData) && !empty($rowData) )
			{
				$db_code = $rowData;
			}
		}//eofl


		while($row = mysql_fetch_assoc($queryResults))
		{
			$db_code = $row['confirmcode'];
		}

		// echo "<p> code = ".$code." | db code =".$db_code."</p>";//testing
		if($code == $db_code)
		{
			
			$queryResults1 =mysql_query("UPDATE users SET confirmed ='1' ");
			$queryResults2 = mysql_query("UPDATE users SET confirmcode ='0' ");

			// echo "<p>1 query result = ".$queryResults1."</p>";//testing
			// echo "<p>2 query result = ".$queryResults2."</p>";//testing

			echo "Thank you. Your email has been confirmed";
		}
		else
		{
			echo "Username and code don't match";
		}
	?>
</body>
</html>