<?php 
	session_start();
	$connect = mysqli_connect('localhost','root','','librarydb');

	if (!$connect) {
		echo "Can't connect with Database!". mysqli_connect();
	}
?>