<?php 
		include('config/db_conn.php'); 

if(isset($_GET['search'])){
$filtervalues = $_GET['search'];
$query = "SELECT * FROM inventory WHERE Product_Name LIKE '%$filtervalues%' ";
$query_run = mysqli_query($conn, $query);
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>homepage</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="config/style.css">
	<?php include("header.php"); ?>	

<style>
.box
{
  display: flex;
  margin: auto;
  width: 250px;
}
</style>
</head>
<body>	
	<div class="box center">
		<ul>
			<a href="add.php" class="btn brand ">add a product</a>
			  <div class="center">
			    <form action="search.php" method="GET">
			      <input type="text" placeholder="Search..." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
			    	<button type="submit" name="" class="btn brand">Search</button>   
				 </form>
			 </div>
		</ul>
	</div>	

	<div class="container">
			<table class="table table-striped white">
			
			<tr>
				<th scope="col" class="center">Product Name</th>
				<th scope="col" class="center">Qty</th>
				<th scope="col" class="center">Last Updated</th>
				<th scope="col"></th>
			</tr>	

			<tr>
			<?php if(mysqli_num_rows($query_run) > 0){
				foreach($query_run as $items) { ?>
			<td class="center"><?php echo ($items['Product_Name']); ?></td>
			<td class="center"><?php echo ($items['Product_Stock']); ?></td>
			<td class="center"><?php echo ($items['Last_Updated']); ?></td>

			<td><a href="edit.php?id=<?php echo $items['id'] ?>" class="btn brand ">edit</a></td>
				<form action="delete.php" method="POST">
				<td>
				<input type="hidden" name="delete_id" value="<?php echo $items['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn z-depth-0" onclick="return confirm('Are you sure?');">				
				</input>
				</td>
				</form>		
			</tr>
		<?php } ?>
		<?php } ?>
			</table>
	</div>
</body>
</html>