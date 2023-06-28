<?php
session_start();
include '../login/conncection.php';
$select_sql = "SELECT * FROM `course`  ";
$res = $conn->query($select_sql);
$row = $res->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['course'])) {
    $_SESSION['course'] = $_POST['course'];
}


include '../login/conncection.php';
$select_sql = "SELECT * FROM `course`  ";
$res = $conn->query($select_sql);
$row = $res->fetch(PDO::FETCH_ASSOC);


// print_r($_SESSION);

$course = $_SESSION['course'];
$course_id = $row['course_id'];
$lecture_number = $row['lecture_number'];
$number = $lecture_number - 1;


if (isset($_POST['start'])) {

    fopen('qr/' . $_SESSION['course'] .  $row['lecture_number'] . '.php', 'w');

    $sql1 = "UPDATE `course` SET `lecture_number`='$lecture_number '+ 1 WHERE `course_name` = '$course' ";
    $res = $conn->query($sql1);
    $new_lecture_number = $lecture_number - 1;


    if (file_exists("qr/$course$new_lecture_number.php")) {
        unlink("qr/$course$new_lecture_number.php");
    }

    file_put_contents('qr/' . $_SESSION['course'] .  $row['lecture_number'] . '.php', '<?php session_start();print_r($_SESSION);$new = "5";include "../../login/conncection.php";$studentId = $_SESSION["id"];$insert = "INSERT INTO `attendance`(`course_id`, `student_id`) VALUES (?,?)";$stmt1 = $conn->prepare($insert);$stmt1->execute([$new, $studentId]);header("location: ../../student/view-attendence.php");');
}

if (isset($_POST['stop'])) {


    if (file_exists("qr/$course$number.php")) {
        unlink("qr/$course$number.php");
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendence</title>
    <link rel="icon" type="image/x-icon" href="img/C.png">
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/take_attendance.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="img/C.png">

    <link rel="stylesheet" href="style/style1.css">
    <link rel="stylesheet" href="style/take attendence.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,500;0,600;1,400;1,500&family=Roboto+Slab:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,500;0,600;1,400;1,500&family=Roboto+Slab:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                    <li class=""><a href="home.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-house fa-fw "></i>&nbsp;
                            Home</a></li>
                    <hr class="mb-0 mt-0 bg-white">

                    <li class="active"><a href="take attendence.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-list-check fa-fw"></i>&nbsp;
                            Take Attendence</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="view attendence.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-users fa-fw"></i>&nbsp;
                            View Attendence</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="student-info.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-user-graduate fa-fw"></i>&nbsp;
                            Students Info</a></li>
                    <hr class="mb-0 mt-0 bg-white">

                    <li class=""><a href="add resource.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-book fa-fw"></i>&nbsp;
                            Add Resource</a></li>
                    <hr class="mb-0 mt-0 bg-white">

                    <li class=""><a href="add-result.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-file-circle-plus fa-fw"></i>&nbsp;
                            Add Result</a></li>
                    <hr class="mb-0 mt-0 bg-white">

                    <li class=""><a href="view-result.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-graduation-cap fa-fw"></i>&nbsp;
                            View Result</a></li>

                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="notifications.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-bell fa-fw"></i>&nbsp;
                            Notifications</a></li>
                    <hr class="mb-0 mt-0 bg-white">

                    <!-- ////////////////////////////////////////// -->
                </ul>

            </div>
            <div class="sidebar-buttons">
                <a href="change-pass-ad.php"><button id="changePass">Change Password</button></a>
                <a href="../admin/logout.php"><button id="logout">Log Out&nbsp;<i class="fa-solid fa-right-from-bracket fa-fw"></i></button></a>

            </div>
        </nav>

        <div class="container mt-5 qr-scan">
            <div class="imgg mt-5" id="qrcode-container"></div>
            <div class="mt-5 ">
                <form class="mr-5 d-inline mr-5" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <input style="margin-right: 80px;color:white;" type="submit" name="start" value="start" class="btn btn-info">
                </form>
                <form class=" mb-5 d-inline ml-auto" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <input type="submit" name="stop" value="stop" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="JS/home.js"></script>

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
    </script>
    <script>
        const QRContainer = document.getElementById("qrcode-container");
        QRContainer.innerHTML = "";
        new QRCode(QRContainer,
            "<?php echo 'http://localhost/grad-proj1/grad-proj/stuff/qr/' . $_SESSION['course'] .  $row['lecture_number'] . '.php' ?>"
        );
    </script>
    <script src="JS/home.js"></script>

</body>

</html>

<?php


?>