<?php
require"registerdbcon.php";

$name =$_POST['name'];
$phonenumber =$_POST['phonenumber'];
$address =$_POST['address'];



$sql = "INSERT INTO `registers`(`name`, `phonenumber`, `address`) VALUES ('$name','$phonenumber','$address')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



?>