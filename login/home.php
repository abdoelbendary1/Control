<?php

session_start();

include "conncection.php";
$_SESSION['username'] = 'aa';

if (isset($_POST['user-type'])) {

  $type = $_POST['user-type'];
  $_SESSION['user_type'] = $type;


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `" . $type . "` WHERE email = ? and  password = ?";

    $stmt = $conn->prepare($sql);

    $stmt->execute([$email, $password]);

    $row = $stmt->rowCount();
    if ($row == 1) {
      $_SESSION['username'] = $row['username'];
      while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['username'] = $result['username'];
        $_SESSION['password'] = $result['password'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['gender'] = $result['gender'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['grade'] = $result['grade'];
        if (isset($result['grade'])) {
          $_SESSION['grade'] = $result['grade'];
        }


        if ($_SESSION['user_type'] == 'student') {
          $_SESSION['id'] = $result['student_id'];

          header("location: ../student/home.php");
        } elseif ($_SESSION['user_type'] == 'stuff') {
          $_SESSION['id'] = $result['stuff_id'];
          header("location: ../stuff/home.php");
        } else {
          header("location: ../admin/dashboard.php");
        }
      }
    } else {
      $error = "there is something wrong in user or password ";
      $_SESSION['error'] = $error;
      header('location: index.php ');
    }
  }
} else {

  $error = "please select user type";
  $_SESSION['error'] = $error;
  header('location: index.php ');
}