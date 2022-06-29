<?php 
	$conn = mysqli_connect('localhost','root','','dental_db');

	if (!$conn) {
		echo "connection error ".mysqli_connect_error();
	}
	 ?>