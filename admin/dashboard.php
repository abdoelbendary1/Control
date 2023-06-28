<?php

session_start();
if ($_SESSION['user_type'] != "admin") {
    header('location:../login/');
}

// Connect to the MySQL database
include "../login/conncection.php";

// Select all students from the database and get the count
$sql = "SELECT COUNT(*) as count FROM student";
$stmt = $conn->query($sql);
$countSTD = $stmt->fetch(PDO::FETCH_ASSOC)["count"];

$sql = "SELECT COUNT(*) as count FROM stuff";
$stmt = $conn->query($sql);
$countStf = $stmt->fetch(PDO::FETCH_ASSOC)["count"];

$sql = "SELECT COUNT(*) as count FROM admin";
$stmt = $conn->query($sql);
$countAdmn = $stmt->fetch(PDO::FETCH_ASSOC)["count"];

$sql = "SELECT COUNT(*) as count FROM stuff WHERE grade='doctor'";
$stmt = $conn->query($sql);
$countTeacher = $stmt->fetch(PDO::FETCH_ASSOC)["count"];


$sql = "SELECT COUNT(*) as count FROM student WHERE gender='famale'";
$stmt = $conn->query($sql);
$countFemale = $stmt->fetch(PDO::FETCH_ASSOC)["count"];

$sql = "SELECT COUNT(*) as count FROM student WHERE gender='male'";
$stmt = $conn->query($sql);
$countMale = $stmt->fetch(PDO::FETCH_ASSOC)["count"];


$sql = "SELECT COUNT(*) as count FROM student WHERE grade='First Rule'";
$stmt = $conn->query($sql);
$grade1 = $stmt->fetch(PDO::FETCH_ASSOC)["count"];


$sql = "SELECT COUNT(*) as count FROM student WHERE grade='Second Rule'";
$stmt = $conn->query($sql);
$grade2 = $stmt->fetch(PDO::FETCH_ASSOC)["count"];


$sql = "SELECT COUNT(*) as count FROM student WHERE grade='Third Rule'";
$stmt = $conn->query($sql);
$grade3 = $stmt->fetch(PDO::FETCH_ASSOC)["count"];


$sql = "SELECT COUNT(*) as count FROM student WHERE grade='Fourth Rule'";
$stmt = $conn->query($sql);
$grade4 = $stmt->fetch(PDO::FETCH_ASSOC)["count"];

$sql = "SELECT tacher_id, AVG(rank) AS average_rating FROM rank GROUP BY tacher_id";
$result = $conn->query($sql);

if ($result !== false && $result->rowCount() > 0) {
    $ratings = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $teacherId = $row['tacher_id'];
        $averageRating = round($row['average_rating'], 2); 
        $labels[] = 'Teacher ' . $teacherId;
        $data[] = $averageRating;    }


} else {
echo "No ratings found.";
}

// Close the database connection
$conn = null;



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
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,500;0,600;1,400;1,500&family=Roboto+Slab:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">

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
                <li class="active"><a href="dashboard.php"class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-chart-line fa-fw"></i>&nbsp;
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
                    <a href="dashboard.php" class="text-decoration-none px-3 py-2  d-block nav-link dropdown-toggle text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
        
            <div class="container mt-3">
            <h1 class="display-6"><i class="text-primary fa-solid fa-chart-line fa-fw"></i><span class="text-primary">
                        Dashboard</span></h1><br>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- <img src="img/student1.png" alt="" class="mb-2"> -->
                                <i class="fa-solid fa-graduation-cap fa-4x"></i><br>
                                <h5 class="card-title mb-0">Students</h5>
                                <span class="card-text">Total students:  <?php echo $countSTD?><span id="student-count"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- <img src="img/teacher.png" alt="" class="mb-2"> -->
                                <i class="fa-solid fa-person-chalkboard fa-4x"></i>
                                <h5 class="card-title mb-0">Staff</h5>
                                <span class="card-text">Total staff: <?php echo $countStf?><span id="staff-count"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- <img src="img/admin.png" alt="" class="mb-2"> -->
                                <i class="fa-solid fa-people-roof fa-4x"></i>
                                <h5 class="card-title mb-0">Admins</h5>
                                <span class="card-text">Total admins: <?php echo $countAdmn?><span id="admin-count"></span></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="img/money.png" alt="" class="mb-2">
                                <h5 class="card-title mb-0">Earnings</h5>
                                <span class="card-text">Total earnings: $<span id="earnings-count"></span></span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <canvas id="stuffCount"></canvas>
                                <canvas id="stuff-rating"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <canvas id="genderCount"></canvas>
                                <canvas id="st-count"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    var stuffCount = document.getElementById('stuffCount').getContext('2d');
    var genderCount = document.getElementById('genderCount').getContext('2d');
    var stuffRating = document.getElementById('stuff-rating').getContext('2d');
    var studentCount = document.getElementById('st-count').getContext('2d');

    //gender Visualization //

    


    var Female = <?php echo $countFemale; ?>;
    var Male = <?php echo $countMale; ?>;

    var genderCountData = {
        labels: ['Female', 'Male'],
        datasets: [{
            data: [Female, Male],
            backgroundColor: ['#4e73df', '#1cc88a'],
            borderWidth: 1
        }]
    };

    var countOptions = {
        legend: {
            position: 'bottom',
            labels: {
                boxWidth: 10,
                fontStyle: 'bold'
            }
        }
    };
    var studentsCountChart = new Chart(genderCount, {
        type: 'doughnut',
        data: genderCountData,
        options: countOptions
    });


    ///Stuff Visualization /////
    var staff = <?php echo $countStf; ?>;
    var teacher = <?php echo $countTeacher; ?>;

    
    var stuffCountData = {
        labels: ['Teacher', 'Staff'],
        datasets: [{
            data: [teacher, staff],
            backgroundColor: ['#4e73df', '#1cc88a'],
            borderWidth: 1
        }]
    };



    var stuffCountChart = new Chart(stuffCount, {
        type: 'doughnut',
        data: stuffCountData,
        options: countOptions
    });

    //rating stuff Visualization //
    var stuffAvg = <?php echo json_encode($labels) ?>;
    var RateAvg = <?php echo json_encode($data) ?>;

    var stuffRatingData = {
        labels: stuffAvg.slice(0, 5),
        datasets: [{
            data: RateAvg.slice(0, 5),
            backgroundColor: '#4e73df',
            borderColor: '#4e73df',
            borderWidth: 1
        }]
    };

    var ratingOptions = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 5
                }
            }]
        },
        legend: {
            display: false
        }
    };

    var stuffRatingChart = new Chart(stuffRating, {
        type: 'bar',
        data: stuffRatingData,
        options: ratingOptions
    });

    //student rule count Visualization //


    var grade1 = <?php echo $grade1; ?>;
    var grade2 = <?php echo $grade2; ?>;
    var grade3 = <?php echo $grade3; ?>;
    var grade4 = <?php echo $grade4; ?>;

    var studentCountch = {
        labels: ['first', 'second', 'third', 'fourth'],
        datasets: [{
            label: 'Average Rating',
            data: [grade1, grade2, grade3, grade4],
            backgroundColor: '#4e73df',
            borderColor: '#4e73df',
            borderWidth: 1
        }]
    };

    var countOptions = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 5
                }
            }]
        },
        legend: {
            display: false
        }
    };

    var studentRatingChart = new Chart(studentCount, {
        type: 'bar',
        data: studentCountch,
        options: countOptions
    });
    </script>
</body>

</html>