<?php
function array_sanitize(&$item){
	$item = $GLOBALS['dbConnection']->real_escape_string($item);
}

function sanitize($data){
	return $GLOBALS['dbConnection']->real_escape_string($data);
}

function output_errors($errors){
	$output = array();
	
	foreach($errors as $error){
		$output[] = '<li>' . $error . '</li>';
	}
	
	return '<ul>' . implode('', $output) . '</ul>';
}
?>