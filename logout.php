
<?php

session_start();
session_unset();
session_destroy();
ob_start();
header("location:guestMain.php");
ob_end_flush(); 
include 'guestMain.php';
//include 'home.php';
exit();

?>
