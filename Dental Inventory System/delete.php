<?php 
	include('config/db_conn.php');

	if (isset($_POST['delete'])) {
		
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

		$sql = "DELETE FROM inventory WHERE id = $delete_id";

		if (mysqli_query($conn, $sql)) {
			header('Location: home.php');
		}else{
			echo 'error' . mysql_error($conn);
		}
	}
 ?>

