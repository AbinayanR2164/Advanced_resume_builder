<?php
require "registerdbcon.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $_POST['name'];

// Fetch existing data before updating
$sql_fetch = "SELECT * FROM `workexp` WHERE `name` = ?";
$stmt = $conn->prepare($sql_fetch);
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Use existing values if new ones are not provided
    $events = !empty($_POST['events']) ? $_POST['events'] : $row['events'];
    $courses = !empty($_POST['courses']) ? $_POST['courses'] : $row['courses'];
    $certificates = !empty($_POST['certificates']) ? $_POST['certificates'] : $row['certificates'];
    $projects = !empty($_POST['projects']) ? $_POST['projects'] : $row['projects'];

    // Update the record
    $sql = "UPDATE `workexp` SET 
            `events` = ?, 
            `courses` = ?, 
            `certificates` = ?, 
            `projects` = ? 
            WHERE `name` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $events, $courses, $certificates, $projects, $name);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
        $conn->close();
        header("Location: searchquery.php"); // ✅ Redirect to avoid errors
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Insert new record if the user doesn't exist
    $linkedin = $_POST['events'];
    $instagram = $_POST['courses'];
    $facebook = $_POST['certificates'];
    $github = $_POST['projects'];

    $sql = "INSERT INTO `workexp` (`events`, `courses`, `certificates`, `name`,`projects`) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $events, $courses, $certificates, $name, $projects);

    if ($stmt->execute()) {
        echo "New record created successfully!";
        $conn->close();
        header("Location: searchquery.php"); // ✅ Redirect to avoid errors
        exit();
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

$conn->close();
?>
