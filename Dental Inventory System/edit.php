<?php  

	include('config/db_conn.php');

	if(isset($_POST['submit'])){

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$qty = mysqli_real_escape_string($conn, $_POST['qty']);	
		$id = mysqli_real_escape_string($conn, $_POST['id']);	
		
		$sql = "UPDATE inventory 
						SET Product_Name='$name', Product_Stock='$qty' 
						WHERE id=$id ";

		$result = mysqli_query($conn, $sql);

			if($result){
				header('location: home.php');

				}else{
					echo '';			
		}
	}

		if (isset($_GET['id'])) {

		$id = mysqli_real_escape_string($conn, $_GET['id']);

		$sql = "SELECT * FROM inventory WHERE id = $id";

		$result = mysqli_query($conn, $sql);
		$edit = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}
 ?> 
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="config/style.css">

	<?php include('header.php'); ?>

	<section class="container">		
		<h4 class="center">Edit Supplies</h4>
		<form class="white" action="edit.php" method="POST">
			 <input type="text" name="id" value="<?php echo ($_GET['id']); ?>" hidden >
			<label><h5>Product Name:</label>
				<input type="text" name="name" value="">
			<label><h5>Product Qty :</label>
				<input type="number" name="qty" value="">
			<div class="center" method="POST">
				<input type="submit" name="submit" value="submit" class="btn brand">
			</input>
			</div>
		</form>
	</section>
</html>
