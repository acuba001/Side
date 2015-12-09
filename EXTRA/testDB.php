<?php
$connection_error = 'Sorry, we\'re experiencing connection problems.';
mysql_connect('localhost', 'root', 'root');
mysql_select_db('lr') or die($connection_error);


$query = 'INSERT INTO users
			(username, password, first_name, last_name, email) 
			VALUES 
			("ingrid", "ingrid123","Ingrid","Troche","itroc001@fiu.edu")';
			$queryResults = mysql_query($query);
			echo "query results = $queryResults";


?>