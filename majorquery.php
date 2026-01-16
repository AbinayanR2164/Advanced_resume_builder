<?php
require"registerdbcon.php";

$name =$_POST['name'];
$skill1 =$_POST['skill1'];
$skill2 =$_POST['skill2'];
$skill3 =$_POST['skill3'];
$skill4 =$_POST['skill4'];
$skill5 =$_POST['skill5'];
$skill6 =$_POST['skill6'];




$sql = "INSERT INTO `majorskills`( `name`,`skill1`,`skill2`,`skill3`,`skill4`,`skill5`,`skill6`) VALUES ('$name','$skill1','$skill2','$skill3','$skill4','$skill5','$skill6')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

    require 'searchquery.php';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



?>