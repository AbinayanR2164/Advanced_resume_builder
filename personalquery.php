<?php
require "registerdbcon.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $_POST['name'];
$mobilenumber = $_POST['mobilenumber'];
$address = $_POST['address'];
$mailid = $_POST['mailid'];
$aboutus = $_POST['aboutus'];
$website = $_POST['website'];

// File upload handling
$uploadDir = "uploads/"; // Make sure this folder exists

// Handle aboutimage (Resume PDF)
$aboutimagePath = "";
if (!empty($_FILES["aboutimage"]["name"])) {
    $aboutimagePath = $uploadDir . basename($_FILES["aboutimage"]["name"]);
    move_uploaded_file($_FILES["aboutimage"]["tmp_name"], $aboutimagePath);
}

// Handle homeimage (Wallpaper PDF)
$homeimagePath = "";
if (!empty($_FILES["homeimage"]["name"])) {
    $homeimagePath = $uploadDir . basename($_FILES["homeimage"]["name"]);
    move_uploaded_file($_FILES["homeimage"]["tmp_name"], $homeimagePath);
}

// Check if user exists
$sql_fetch = "SELECT * FROM `personal` WHERE `name` = ?";
$stmt = $conn->prepare($sql_fetch);
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update record
    $sql = "UPDATE `personal` SET 
            `mobilenumber` = ?, 
            `address` = ?, 
            `mailid` = ?, 
            `aboutus` = ?,
            `website` = ?,  
            `aboutimage` = COALESCE(NULLIF(?, ''), `aboutimage`), 
            `homeimage` = COALESCE(NULLIF(?, ''), `homeimage`)
            WHERE `name` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $mobilenumber, $address, $mailid, $aboutus, $website, $aboutimagePath, $homeimagePath, $name);
} else {
    // Insert new record
    $sql = "INSERT INTO `personal` (`name`, `mobilenumber`, `address`, `mailid`, `aboutus`, `aboutimage`, `homeimage`, `website`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $mobilenumber, $address, $mailid, $aboutus, $aboutimagePath, $homeimagePath, $website);
}

if ($stmt->execute()) {
    echo "Record saved successfully!";
    header("Location: searchquery.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
