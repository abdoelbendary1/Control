<?php
include '../login/conncection.php';
if (isset($_GET['deleteResource'])) {
    $title = $_GET['deleteResource'];
    $type = $_GET['type'];
    $sql = "DELETE FROM `$type` WHERE resource_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title]);
    if ($stmt) {
        header('Location: add resource.php');
    } else {
        echo "failed";
    }
}