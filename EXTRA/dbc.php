<?php 
$connection_error = 'Sorry, we\'re experiencing connection problems.';
mysql_connect('localhost', 'root', 'root');
mysql_select_db('lr') or die($connection_error);
?>