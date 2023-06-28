<?php
session_start();

if ($_SESSION['user_type'] != "admin") {
    header('location:../login/');
}
$error = '';
include '../login/conncection.php';
$email = $_SESSION['email'];




if (isset($_POST['current-password'])) {
    $current = $_POST['current-password'];
    $new = $_POST['new-password'];
    $confirm = $_POST['confirm-password'];

    if ($new == $confirm) {
        $sql = "SELECT * FROM `admin` WHERE `email` = '$email'";
        $res = $conn->query($sql);
        $count = $res->rowCount();

        if ($res->rowCount() > 0) {


            $sql1 = "UPDATE `admin` SET `password`='$new' WHERE `email` = '$email' ";
            $res = $conn->query($sql1);
        } else {
            $error = 'the current password is not correct';
        }
    } else {

        $error = 'the two passwords not match';
    }
}

echo $error;

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- This script got from frontendfreecode.com -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/change-pass-ad.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,500;0,600;1,400;1,500&family=Roboto+Slab:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
    .dropdown-menu {

        background-color: #021d38 !important;
    }
    </style>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">

    <nav id="sidebar" class="js-fullheight">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                
            </button>
        </div>
        <div class="p-4">
            <div class="header-box px-2 pt-3 pb-1 d-flex justify-content-center">
                <h1 class="fs-3"><span class="bg-white text-dark rounded shadow px-2"><i class="fa-solid fa-bolt"></i></span> &nbsp;<span class="text-white">Control</span></h1>               
            </div>
            <hr>
            <ul class="list-unstyled listItem px-3">
                <li class=""><a href="dashboard.php"class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-chart-line fa-fw"></i>&nbsp;
                    Dashboard</a></li><hr class="mb-0 mt-0 bg-white">
                <li class="dropdown">
                    <a class="text-decoration-none px-3 py-2  d-block nav-link dropdown-toggle text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-graduate fa-fw"></i>&nbsp;
                        Students
                    </a>
                    <ul class="dropdown-menu st-option" aria-labelledby="dropdown">
                        <li><a class="dropdown-item ju" href="allStudents.php">&nbsp;
                            <i class="fa-solid fa-users fa-fw"></i>&nbsp;
                            All Students</a></li>
                        <li><a class="dropdown-item" href="studentInfo.php">&nbsp;
                            <i class="fa-solid fa-graduation-cap fa-fw"></i>&nbsp;
                            Student Details</a></li>
                        <li><a class="dropdown-item" href="add-removeStudent.php">&nbsp;
                            <i class="fa-solid fa-user-plus fa-fw"></i>&nbsp;
                            Add & Remove </a></li>
                        <li><a class="dropdown-item" href="promotStudents.php">&nbsp;
                            <i class="fa-solid fa-star fa-fw"></i>&nbsp;
                            Promote</a></li>
                        
                    </ul>
                </li>
                <hr class="mb-0 mt-0 bg-white" >

                <li class="dropdown" >
                    <a class="text-decoration-none px-3 py-2  d-block nav-link dropdown-toggle text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class=""></i><i class="fa-solid fa-user-tie fa-fw"></i>&nbsp;
                        Staff
                    </a>
                    <ul class="dropdown-menu st-option" aria-labelledby="dropdown">
                        <li><a class="dropdown-item" href="allStuff.php">&nbsp;
                            <i class="fa-solid fa-users fa-fw"></i>&nbsp;
                            All Staff</a></li>
                        <li><a class="dropdown-item" href="stuff-Info.php">&nbsp;
                            <i class="fa-solid fa-chalkboard-user fa-fw"></i>&nbsp;
                            Staff Details</a></li>
                        <li><a class="dropdown-item" href="add-removeStuff.php">&nbsp;
                            <i class="fa-solid fa-user-plus fa-fw"></i>&nbsp;
                            Add & Remove</a></li>
                    </ul>
                </li>

                
                <!-- ////////////////////////////////////////// -->

                
                <hr class="mb-0 mt-0 bg-white" >
                <li class=""><a href="library.php" class="text-decoration-none px-3 py-2 d-block">
                    <i class="fa-solid fa-book fa-fw"></i>&nbsp;
                    Libirary</a></li>
                    <hr class="mb-0 mt-0 bg-white" >
                <li class=""><a href="courses.php" class="text-decoration-none px-3 py-2 d-block">
                    <i class="fa-solid fa-pen fa-fw"></i>&nbsp;
                    Courses</a></li>
                    <hr class="mb-0 mt-0 bg-white" >
                <li class=""><a href="exam.php" class="text-decoration-none px-3 py-2 d-block">
                    <i class="fa-solid fa-calendar-days fa-fw"></i>&nbsp;
                    Exams</a></li>
                    <hr class="mb-0 mt-0 bg-white" >
                <li class=""><a href="noticeBoard.php" class="text-decoration-none px-3 py-2 d-block">
                    <i class="fa-solid fa-message fa-fw"></i>&nbsp;
                    Notice Board</a></li>

            </ul>

        </div>
        <div class="sidebar-buttons">
            <a href="change-pass-ad.php"><button id="changePass">Change Password</button></a>
            <a href="../login/index.php"><button id="logout">Log Out&nbsp;<i class="fa-solid fa-right-from-bracket fa-fw"></i></button></a>

        </div>
    </nav>





        <!-- Page Content  -->
        <div class="navbar-light  py-0 ">

        </div>
        <div class="home">
            <div class="container">
                <h2>Change Password</h2>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <label for="current-password">Current Password:</label>
                    <div class="password-input-container">
                        <input type="password" id="current-password" name="current-password"
                            style="margin-bottom: 20px !important" class="form-control" value="" required>
                        <span toggle="#current-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <label for="new-password">New Password:</label>
                    <div class="password-input-container">
                        <input type="password" id="new-password" name="new-password"
                            style="margin-bottom: 20px !important" class="form-control" value=""
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            titsle="Must contain at least one number, one uppercase letter, one lowercase letter, and be at least 8 characters long"
                            required>
                        <span toggle="#new-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <label for="confirm-password">Confirm Password:</label>
                    <div class="password-input-container">
                        <input type="password" id="confirm-password" name="confirm-password"
                            style="margin-bottom: 20px !important" class="form-control" value=""
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number, one uppercase letter, one lowercase letter, and be at least 8 characters long"
                            required>
                        <span toggle="#confirm-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <input value="Save" type="submit"></input>
                </form>

            </div>



        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/change-pass.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/jquery-3.6.0.min_2.js"></script>

    <script>
    (function($) {
        "use strict";
        var fullHeight = function() {
            $(".js-fullheight").css("height", $(window).height());
            $(window).resize(function() {
                $(".js-fullheight").css("height", $(window).height());
            });
        };
        fullHeight();
        $("#sidebarCollapse").on("click", function() {
            $("#sidebar").toggleClass("active");
        });
    })(jQuery);

    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    </script>
</body>

</html>