<?php

include "../login/conncection.php";
if (isset($_GET['email'])) {

    $email = $_GET['email'];
    $type = $_GET['type'];

    $sql = "SELECT * FROM `student` WHERE email='$email' ";

    $res = $conn->query($sql);
    $row = $res->fetch(PDO::FETCH_ASSOC);

    if ($type == 'promote') {

        if ($row['grade'] == 'First Rule') {
            $sql = "UPDATE `student` SET `grade`='Second Rule' where email ='$email'";
            $res = $conn->query($sql);
        } elseif ($row['grade'] == 'Second Rule') {
            $sql = "UPDATE `student` SET `grade`='Third Rule' where email ='$email'";
            $res = $conn->query($sql);
        } elseif ($row['grade'] == 'Third Rule') {
            $sql = "UPDATE `student` SET `grade`='Fourth Rule' where email ='$email'";
            $res = $conn->query($sql);
        }
    } else {
        if ($row['grade'] == 'Second Rule') {
            $sql = "UPDATE `student` SET `grade`='First Rule' where email ='$email'";
            $res = $conn->query($sql);
        } elseif ($row['grade'] == 'Third Rule') {
            $sql = "UPDATE `student` SET `grade`='Second Rule' where email ='$email'";
            $res = $conn->query($sql);
        } elseif ($row['grade'] == 'Fourth Rule') {
            $sql = "UPDATE `student` SET `grade`='Third Rule' where email ='$email'";
            $res = $conn->query($sql);
        }
    }
    header('location: promotStudents.php');
}