<?php 
include 'includes/overall/header.php';
include 'core/init.php';

rate();

/* $find_data = mysql_query("SELECT * FROM rates");

while($row = mysql_fetch_assoc($find_data))
{
$id = $row['id'];
$name_of_activity = $row['nameofactivity'];
$activity = $row['activity'];
$current_rating = $row['rating'];
$current_hits = $row['hits'];

echo "

<center><h3>Rate Activity!</h3><form  action = 'rate.php' method= 'POST'>
		$name_of_activity: <select name = 'rating'>
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
	<input type = 'submit'value = 'Rate!'></br> Current Rating:"; echo round ($current_rating,1); echo "
		</center></form>

";
} */

?>