<?php
	require "server.php";
?>
<!DOCTYPE html>
<html>
<head>
<title> Siddiqui Pharmacy</title>
<style>

*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

header{
    position: relative;
    width: 100%;
    padding: 12px;
    background: #000;
    color: black;
    text-align: center;
    font-weight: bold;
}

.form{
    position: relative;
    width: 100%;
    padding: 10px;
    background: #ddd;
}

input{
    padding: 10px 14px;
    border: 1px solid black;
}

div.name input{
    width: 25%;
}

div.name, div.details, div.btn{
	margin-bottom: 30px;
}

button{
    padding: 10px 14px;
    background: black;
    color: #fff;
    border: 1px solid black;
}

div.details input{
    margin: 0px;
}

.table{
	position: relative;
	width: 100%;
	padding: 10px;
	height: 60vh;
	background: #eee;
	overflow-x: hidden;
	overflow-y: scroll;
}

table{
	width: 100%;
	border-collapse: collapse;
}

th{
	background: #000;
	padding: 10px;
	color: #fff;
}

td{
	padding: 10px;
	text-align: center;
}

.left{
	position: absolute;
	top: 0;
	right: 0;
	padding: 12px;
}

.left a{
	text-decoration: none;
	color: #fff;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<header >
		Siddiqui Medical Store
		<div class="left">
			<a href="view.php"><i class="fa fa-eye"></i> View</a>
		</div>
	</header>

	<div class="form">

		<h2>Add Invoice</h2><br>

		<form action="invoice.php" target="_blank" method="post">
			<div class="name">
				<input type="text" name="name" placeholder="Enter Customer Name" required>
				<input type="number" name="disc" placeholder="Enter Discount" required>
				<button type="submit" name="print">Print</button>
			</div>
		</form>
		<form action="" method="post">
		<div class="details">
			<input type="text" name="item" placeholder="Enter Item Name" required>
			
			<input type="float" id="cost" name="cost" placeholder="Enter Cost" required>
			<input type="number" id="qty" name="qty" placeholder="Enter Quantity" required>
			<input type="float" name="price" id="price" onclick="getPrice()" placeholder="Enter Price" readonly required>
			<button type="submit" name="addrow"><i class="fa fa-plus"></i></button>
		</div>
		</form>
	</div>

	<div class="table">
		<table>
			<tr>
				<th>Sr#</th>
				<th>Item</th>
				
				<th>Cost</th>
				<th>QTY</th>
				<th>Price</th>
				<th>Delete</th>
			</tr>
			<?php
				$query = mysqli_query($con, "SELECT * FROM `inv` WHERE inv_del = 0");
				if(mysqli_num_rows($query) > 0){
					$sr = 1;
					while($row = mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $sr; ?></td>
				<td><?php echo $row['inv_item']; ?></td>
				
				<td><?php echo $row['inv_cost']; ?></td>
				<td><?php echo $row['inv_qty']; ?></td>
				<td><?php echo $row['inv_price']; ?></td>
				<td><form action="" method="post" onsubmit="return confirm('Delete item?');">
					<input type="hidden" name="id" value="<?php echo $row['inv_id']; ?>">
					<button type="submit" name="delete"><i class="fa fa-times"></i></button>
				</form></td>
			</tr>
			<?php
				$sr++;
					}
				} else {
			?>
				<tr>
					<td colspan="6">Empty List</td>
				</tr>
			<?php
				}
			?>
		</table>
	</div>
	

</body>
<script>
	function getPrice(){
		var qty = document.getElementById('qty').value;
		var cost = document.getElementById('cost').value;
		var price = qty * cost;
		document.getElementById('price').value = price;
	}
</script>
</html>
