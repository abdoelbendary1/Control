<?php

session_start();
if ($_SESSION['user_type'] != "admin") {
    header('location:../login/');
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
    <title>Student Promotion</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/promoteStudents.css">
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
                <li class="dropdown active">
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
                        <li><a class="dropdown-item active" href="promotStudents.php">&nbsp;
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
            <div class="container mt-1">
            <h1 class="display-6"><i class="fa fa-star text-primary"></i> Student<span class="text-primary"> Promotion</span></h1><br>
            <form>
                <label for="mySelect">Current Rule:</label> &nbsp;
                <select id="mySelect" onchange="filterTable()">
                    <option value="">All</option>
                    <option value="first">First Rule</option>
                    <option value="second">Second Rule</option>
                    <option value="third">Third Rule</option>
                    <option value="fourth">Fourth Rule</option>
                </select>
            </form>
            <section id="promotStudents-table" class="section-p1 center-block fix-width scroll-inner">

                <table id="promotStudents" class="overflow-scroll">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Current Rule</th>
                            <th>Promote to Next Rule</th>
                        </tr>
                    </thead>
                    <tbody id="student-table">
                        <?php
                        include "../login/conncection.php";

                        $query2 = ("SELECT * FROM student ");
                        $res = $conn->query($query2);

                        if ($res->rowCount() > 0) {
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {



                        ?>
                        <tr>
                            <?php echo '<td>' . $row['name'] . '</td>' ?>
                            <?php echo '<td>' . $row['email'] .  '</td>' ?>
                            <?php echo '<td>' . $row['grade'] .  '</td>' ?>

                            <td><a class="promote-btn" style="text-decoration: none;"
                                    href="promt.php?email=<?php echo $row['email'] ?>&type=promote">Promote</a>
                                <a class="back-btn" style="text-decoration: none;"
                                    href=" promt.php?email=<?php echo $row['email'] ?>&type=back">Undo</a>
                            </td>


                        </tr>

                        <?php }
                        } ?>

                    </tbody>

                </table>
            </section>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/all.js"></script>
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


        // ////////////////////////////

        const filterBtn = document.getElementById('filter-btn');
        const studentTable = document.getElementById('student-table');
        const promoteBtns = document.getElementsByClassName('promote-btn');
        var ruleSelect = document.getElementById("rule");
        const backBtns = document.getElementsByClassName('back-btn');




        for (let i = 0; i < promoteBtns.length; i++) {
            promoteBtns[i].addEventListener('click', () => {
                const currentRule = studentTable.rows[i].cells[2].innerHTML;

                switch (currentRule) {
                    case 'First Rule':
                        studentTable.rows[i].cells[2].innerHTML = 'Second Rule';
                        break;
                    case 'Second Rule':
                        studentTable.rows[i].cells[2].innerHTML = 'Third Rule';
                        break;
                    case 'Third Rule':
                        studentTable.rows[i].cells[2].innerHTML = 'Fourth Rule';
                        break;
                    default:
                        break;
                }
            });
        }

        for (let i = 0; i < backBtns.length; i++) {
            backBtns[i].addEventListener('click', () => {
                const currentRule = studentTable.rows[i].cells[2].innerHTML;

                switch (currentRule) {
                    case 'First Rule':
                        studentTable.rows[i].cells[2].innerHTML = 'First Rule';
                        break;
                    case 'Second Rule':
                        studentTable.rows[i].cells[2].innerHTML = 'First Rule';
                        break;
                    case 'Third Rule':
                        studentTable.rows[i].cells[2].innerHTML = 'Second Rule';
                        break;
                    case 'Fourth Rule':
                        studentTable.rows[i].cells[2].innerHTML = 'Third Rule';
                        break;
                    default:
                        break;
                }
            });
        }

        function filterTable() {
            var filter = document.getElementById("mySelect").value.toUpperCase();
            var table = document.getElementById("student-table");
            var tr = table.getElementsByTagName("tr");

            for (var i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    var txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        </script>
</body>

</html>