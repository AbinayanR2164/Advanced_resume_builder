<?php 
$name = isset($_POST['name']) ? $_POST['name'] : '';
include('registerdbcon.php');
$sql=mysqli_query($conn, "select * from register WHERE name='$name'");
 $row=mysqli_fetch_array($sql);

?>







<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Information</title>
</head>
<body>
	<h1>Update Information</h1>
	<form action="update.php" method="POST">
		<input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>"> <br>
		<label for="phonenumber">Phone Number:</label><br>
		<input type="text" id="phonenumber" name="mobilenumber" value="<?php echo "$row[mobilenumber]"; ?>"> <br>
		<label for="address">email id:</label><br>
		<input type="text" id="address" name="emailid" value="<?php echo "$row[emailid]"; ?>"> <br>
		<button type="submit">Update</button>
	</form>
 </body>
</html>