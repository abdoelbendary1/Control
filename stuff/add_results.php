<?php

session_start();
include "../login/conncection.php";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $results = $_POST['result'];
    $course_id = $_SESSION['course_id'];

    foreach ($name as $index => $names) {
        $select_sql = "SELECT * FROM `student` WHERE `name` = '$names'";
        $res = $conn->query($select_sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);

        $id = $row['student_id'];
        $result = $results[$index];

        $select_sql = "SELECT * FROM `degree` WHERE `student_id` = '$id'";
        $res = $conn->query($select_sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);

        echo "<br>";

        if ($res->rowCount() == 0) {
            if ($result != "") {
                $sql = "INSERT INTO `degree`(`degree`, `student_id`, `course_id`) VALUES ('$result','$id','$course_id')";
                $res = $conn->query($sql);
                $_SESSION['update'] = "results added well";
                echo $res->rowCount();
            }
        } elseif ($res->rowCount() != 0) {

            if ($result != "") {
                echo $res->rowCount();
                $sql = "INSERT INTO `degree`(`degree`, `student_id`, `course_id`) VALUES ('$result','$id','$course_id')";
                $res = $conn->query($sql);
                $_SESSION['update'] = "results added well";
            } else {

                $sql = "UPDATE `degree` SET `degree`='$result',`course_id`='$course_id',`student_id`='$id' WHERE `student_id`='$id'";

                $_SESSION['update'] = "results added well";
                $res = $conn->query($sql);
            }
        }
    }
}

header("location: add-result.php");