<?php
require "registerdbcon.php";

$name = $_POST['name'] ?? '';
$action = $_POST['action'] ?? '';

if ($action === 'add') {
    $description = $_POST['description'];
    $project_title = $_POST['project_title'];
    $image = $_POST['image'];
    $project_link = $_POST['project_link'];

    $stmt = $conn->prepare("
      INSERT INTO project (name, description, project_title, image, project_link)
      VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("sssss", $name, $description, $project_title, $image, $project_link);
    $stmt->execute();
    $stmt->close();
}
elseif ($action === 'delete' && isset($_POST['delete_sno'])) {
    $sno = intval($_POST['delete_sno']);
    $stmt = $conn->prepare("DELETE FROM project WHERE sno = ? AND name = ?");
    $stmt->bind_param("is", $sno, $name);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: achieve.php?id=" . urlencode($name));
exit();