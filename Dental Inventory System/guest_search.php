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
	<style type="text/css">
    	.brand{
    		background: #6086FF !important;
    	}
    	.brand-text{
    		color: #6086FF !important;
    	}
    	.box
		{
		  display: flex;
		  margin: auto;
		  width: 250px;
		}
	</style>
</head>
<body class="blue lighten-4">
	<nav class="white z-depth-0">
		<a class="center brand-logo brand-text">&#129463;Dental Inventory&#129463;</a>
		<ul id="nav-mobile" class="right hide-on-small-and-down">
			<li><a href="login.php" class="btn brand z-depth-0">Logout</a></li>
	</nav>
</head>
<body>	
	<div class="box center">
		<ul>
			  <div class="center">
			    <form action="guest_search.php" method="GET">
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
				
			</tr>
		<?php } ?>
		<?php } ?>
			</table>
	</div>
</body>
</html>