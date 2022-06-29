<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="config/style.css">

	<?php include('header.php'); ?>
<style>
.box
{
  display: flex;
  margin: auto;
  width: 250px;
  height: 25px;
}
</style>
  <div class="box center">
    <form action="home.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" class="btn brand">Submit</button>
    </form>
  </div>
</div>


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