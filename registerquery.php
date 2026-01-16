<?php
require"registerdbcon.php";

$name =$_POST['name'];
 $mobilenumber =$_POST['mobilenumber'];
$emailid =$_POST['emailid'];
$password =$_POST['password'];



$sql ="INSERT INTO `register` (`name`,`mobilenumber`, `emailid`, `password`) VALUES ('$name','$mobilenumber','$emailid','$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
header("Location: nearsearch.php?id=$name");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



?>

