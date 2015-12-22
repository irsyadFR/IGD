<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "IGD"; 

	$conn = mysqli_connect( $server, $username, $password, $database );

	if( !$conn ) {
		die( mysqli_connect_error() );
	}
?>	