<?php



include "../login/conncection.php";
if (isset($_GET['deleteEmail'])) {
    $email = $_GET['deleteEmail'];
    $type = $_GET['type'];
    $sql = "DELETE FROM `$type` WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    if ($stmt) {
        if ($type == "student") {
            header('Location: add-removeStudent.php');
        } else {
            header('Location: add-removeStuff.php');
        }
    } else {
        echo "failed";
    }
}


if (isset($_GET['course_name'])) {
    $name = $_GET['course_name'];
    $type = $_GET['type'];
    $sql = "DELETE FROM `$type` WHERE course_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name]);
    if ($stmt) {
        header('Location: courses.php');
    } else {
        echo "failed";
    }
}

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $type = $_GET['type'];
    $sql = "DELETE FROM `$type` WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title]);
    if ($stmt) {
        header('Location: library.php');
    } else {
        echo "failed";
    }
}
if (isset($_GET['deleteResource'])) {
    $title = $_GET['deleteResource'];
    $type = $_GET['type'];
    $sql = "DELETE FROM `$type` WHERE resource_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title]);
    if ($stmt) {
        header('Location: library.php');
    } else {
        echo "failed";
    }
}