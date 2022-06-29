<?php 
	include 'config/db_conn.php';

	$name = '';	

	if(isset($_POST['submit'])){

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$qty = mysqli_real_escape_string($conn, $_POST['qty']);	
		
		$sql = "INSERT INTO inventory(Product_Name, Product_Stock) VALUES ('$name', '$qty')";

			if(mysqli_query($conn, $sql)){
				header('location: home.php');

				}else{
					echo '';			
		}
	}
 ?> 

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="config/style.css">

	<?php include('header.php'); ?>

	<section class="container">
		<h4 class="center">Add Supplies</h4>
		<form class="white" action="add.php" method="POST">
			<label><h5>Product Name:</label>
				<input type="text" name="name" value="">
			<label><h5>Product Qty :</label>
				<input type="number" name="qty" value="">
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand">
			</input>
			</div>
		</form>
	</section>

</html>