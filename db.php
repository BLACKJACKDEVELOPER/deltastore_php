<?php 

function db($query) {
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'deltastore';

	// connect all together
	$conn = new mysqli($server,$username,$password,$database);

	if (!$conn) { return "Connect to database error"; }

	// send back query
	return $conn->query($query);
}

 ?>
