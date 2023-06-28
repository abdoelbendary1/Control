<?php

session_start();
if ($_SESSION['user_type'] != "admin") {
    header('location:../login/');
}

include "../login/conncection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lecturer = $_POST['lecturer'];
    $course_time = $_POST['course_time'];
    $section_time = $_POST['section_time'];
    $section_day = $_POST['section_day'];
    $course_day = $_POST['course_day'];
    $options = $_POST['options'];


    $select1 = ("SELECT * FROM stuff WHERE `name` ='$lecturer' ");
    $run2 = $conn->query($select1);
    $row1 = $run2->fetch(PDO::FETCH_ASSOC);
    $stuff_id = $row1['stuff_id'];




    $count = $run2->rowCount();


    if ($count > 0) {








        $sql = 'INSERT INTO `course`(`course_name`, `grade`, `course_day`, `section_day`, `course_time`, `section_time`,`stuff_id`) VALUES (?,?,?,?,?,?,?)';

        $stmt = $conn->prepare($sql);

        $execution = $stmt->execute([$name, $options, $course_day, $section_day, $course_time, $section_time, $stuff_id]);
    }
}








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
    <title>Courses</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/courses.css">
    <!-- <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="courses1.css"> -->
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
                    <h1 class="fs-3"><span class="bg-white text-dark rounded shadow px-2"><i
                                class="fa-solid fa-bolt"></i></span> &nbsp;<span class="text-white">Control</span></h1>
                </div>
                <hr>
                <ul class="list-unstyled listItem px-3">
                    <li class=""><a href="dashboard.php" class="text-decoration-none px-3 py-2 d-block"><i
                                class="fa-solid fa-chart-line fa-fw"></i>&nbsp;
                            Dashboard</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class="dropdown">
                        <a class="text-decoration-none px-3 py-2  d-block nav-link dropdown-toggle text-truncate"
                            id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <hr class="mb-0 mt-0 bg-white">

                    <li class="dropdown">
                        <a class="text-decoration-none px-3 py-2  d-block nav-link dropdown-toggle text-truncate"
                            id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
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


                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="library.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-book fa-fw"></i>&nbsp;
                            Libirary</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class="active"><a href="courses.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-pen fa-fw"></i>&nbsp;
                            Courses</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="exam.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-calendar-days fa-fw"></i>&nbsp;
                            Exams</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="noticeBoard.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-message fa-fw"></i>&nbsp;
                            Notice Board</a></li>

                </ul>

            </div>
            <div class="sidebar-buttons">
                <a href="change-pass-ad.php"><button id="changePass">Change Password</button></a>
                <a href="../login/index.php"><button id="logout">Log Out&nbsp;<i
                            class="fa-solid fa-right-from-bracket fa-fw"></i></button></a>

            </div>
        </nav>

        <!-- Page Content  -->
        <div class="navbar-light  py-0 ">

        </div>
        <div class="home">
            <div class="container mt-1">
                <h1 class="display-6"><i class="fa fa-pen text-primary"></i> courses <span
                        class="text-primary">list</span></h1>
                <nav class="navbar bg-body-tertiary navbar-light justify-content-center mt-4">
                    <form class="d-flex" role="search">
                        <input id="search" class="form-control mr-sm-2" type="search"
                            placeholder="Search about courses..." aria-label="Search">&nbsp;
                        <button id="search-btn" class="buttonx" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </nav>
                <div class="row justify-content-center">
                    <div>
                        <div class="courses">
                            <form id="book-form" name="form1" class="mt-2" action="<?php $_SERVER['PHP_SELF'] ?>"
                                method="post">
                                <div class="form-group">
                                    <label for="author">Course name</label>
                                    <input type="text" name="name" id="author" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="link">Lecturer</label>
                                    <select class="form-select" id="link" name="lecturer">
                                        <option placeholder>Choose Lecturer</option>


                                        <?php


                                        $select_sql = 'SELECT * FROM `stuff` ';
                                        $res = $conn->query($select_sql);

                                        if ($res->rowCount() > 0) {
                                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {



                                        ?>

                                        <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                        <?php


                                            }
                                        } ?>

                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="weekday-select">Section Day</label>
                                            <select class="form-control" id="weekday-select" name="section_day">
                                                <option value="Choose">Choose..</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link">Time</label>
                                            <input type="time" name="section_time" id="link" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="weekday-select">Lecture Day</label>
                                            <select class="form-control" id="weekday-select" name="course_day">
                                                <option value="Choose">Choose..</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link">Time</label>
                                            <input type="time" name="course_time" id="link" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="width: 100%; margin-left: auto; margin-right: auto;">
                                    <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                        <label class="btn btn-primary d-flex">
                                            <input type="radio" required name="options" id="option1" value="First Rule"
                                                autocomplete="off"> Year 1
                                        </label>
                                        <label class="btn btn-primary d-flex">
                                            <input required type="radio" name="options" id="option2" value="Second Rule"
                                                autocomplete="off"> Year 2
                                        </label>
                                        <label class="btn btn-primary d-flex">
                                            <input required type="radio" name="options" id="option3" value="Third Rule"
                                                autocomplete="off"> Year 3
                                        </label>
                                        <label class="btn btn-primary d-flex">
                                            <input required type="radio" name="options" id="option4" value="Fourth Rule"
                                                autocomplete="off"> Year 4
                                        </label>
                                    </div>
                                </div>
                                <input type="submit" value="Add Course" class="button  btn-block" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-striped text-center" style="width: 100%">
                        <!-- Table headers -->
                        <thead>
                            <tr>
                                <th>Course name</th>
                                <th>lecturer</th>
                                <th>Lecture time</th>
                                <th>Section Time</th>




                                <th></th>
                            </tr>
                        </thead>
                        </thead>
                        <!-- Table body -->

                        <tbody id="myTable">



                            <?php

                            $query2 = ("SELECT * FROM `course`");
                            $res1 = $conn->query($query2);


                            while ($row = $res1->fetch(PDO::FETCH_ASSOC)) {



                            ?>
                            <tr>
                                <td><?php
                                        $name1 = $row['course_name'];
                                        echo $row['course_name']  ?></td>
                                <td><?php
                                        $id = $row['stuff_id'];
                                        $query3 = ("SELECT * FROM `stuff` where stuff_id = $id ");
                                        $res = $conn->query($query3);
                                        $row3 = $res->fetch(PDO::FETCH_ASSOC);


                                        echo $row3['name'];


                                        ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6"><?php echo $row['course_day']  ?></div>
                                        <div class="col-md-6"><?php echo $row['course_time']  ?> </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6"><?php echo $row['section_day']  ?></div>
                                        <div class="col-md-6"><?php echo $row['section_time']  ?></div>
                                    </div>
                                </td>

                                <td> <a href="delete.php?course_name=<?php echo $name1; ?>&type=course"
                                        class="btn btn-danger btn-sm delete">X</a>
                                </td>
                            </tr>

                            <?php
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </div>


    <script src="courses1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="script1.js"></script>

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
    </script>
</body>

</html>