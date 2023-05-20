<?php
    require "server.php";
?>
<!DOCTYPE html>
<html>
<head>
<title> Siddiqui Medical Store</title>
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
    color: #fff;
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
	height: calc(100vh - 10px);
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

	<header>
		Siddiqui Medical Store
		<div class="left">
			<a href="index.php"><i class="fa fa-plus"></i> Add</a>
		</div>
	</header>

	<div>
		<form action="invoice.php" method="post">
			<input type="text" name="id" placeholder="Enter Invoice No." required>
			<input type="submit" name="view" value="Search">
		</form>
	</div>

	<div class="table">
		<table>
			<tr>
				<th>Invoice #</th>
                <th>Name</th>
                <th>Date</th>
				<th>View</th>
			</tr>
			<?php
				$query = mysqli_query($con, "SELECT * FROM `final`");
				if(mysqli_num_rows($query) > 0){
					while($row = mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $row['final_id']; ?></td>
				<td><?php echo $row['final_name']; ?></td>
                <td><?php echo $row['final_date']; ?></td>
				<td><form action="invoice.php" method="post">
					<input type="hidden" name="id" value="<?php echo $row['final_id']; ?>">
					<button type="submit" name="view"><i class="fa fa-eye"></i></button>
				</form></td>
			</tr>
			<?php
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
