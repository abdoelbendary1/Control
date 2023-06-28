<?php

session_start();
if ($_SESSION['user_type'] != "admin") {
    header('location:../login/');
}


?>
<?php
include "../login/conncection.php";


if (isset($_GET['submit'])) {
    $title = $_GET['title'];
    $author = $_GET['author'];
    $link = $_GET['link'];


    $select = ("SELECT * FROM library WHERE link='$link'");
    $run = $conn->query($select);
    $count = $run->rowCount();

    if ($count == 0) {




        $sql = 'INSERT INTO `library` (`title`, `author`, `link`)  VALUES (?,?,?)';

        $stmt = $conn->prepare($sql);

        $execution = $stmt->execute([$title, $author, $link]);
    } else {

        $error1 = "link  alredy exists";
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
    <title>Library</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/library.css">
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
                <li class="active"><a href="library.php" class="text-decoration-none px-3 py-2 d-block">
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
            <h1 class="display-6"><i class="fa fa-book text-primary"></i><span class="text-primary"> Library</span></h1>
                    <nav class="navbar bg-body-tertiary navbar-light justify-content-center mt-4">
                    <a class="navbar-brand"></a>
                    <form class="d-flex" role="search">
                        <input id="search" class="form-control mr-sm-2" type="search"
                            placeholder="Search about books..." aria-label="Search">&nbsp;
                        <button id="search-btn" class="buttonx" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </nav>
                <div class="row justify-content-center">
                    <div>
                        <form id="book-form" name="form1" class="mt-4" action="<?php $_SERVER['PHP_SELF'] ?>"
                            method="get">
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input required pattern="[a-zA-Z\s]+" title="Please enter alphabets and spaces only"
                                    type="text" name="title" id="Title" class="form-control" onkeypress="return (event.charCode > 64 && 
                  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required>
                            </div>
                            <div class="form-group">
                                <label for="Author">Author</label>
                                <input type="text" required pattern="[a-zA-Z\s]+"
                                    title="Please enter alphabets and spaces only" name="author" id="Author"
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link" class="form-control" required>
                            </div>
                            <input type="submit" name="submit" value="Add Book" class="button btn-block">
                        </form>
                    </div>
                </div>
                <br>
                <div class="table-responsive justify-content-center">
                    <table class="table table-striped text-center" style="width: 100%">
                        <!-- Table headers -->
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>link</th>
                                <th></th>
                            </tr>
                        </thead>
                        </thead>
                        <!-- Table body -->

                        <tbody id="myTable">
                            <?php

                            $query2 = ("SELECT * FROM library ");
                            $res = $conn->query($query2);

                            if ($res->rowCount() > 0) {
                                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {


                            ?>
                            <tr>
                                <?php echo '<td>' . $row['title'] . '</td>' ?>

                                <?php echo '<td>' . $row['author'] .  '</td>' ?>
                                <?php echo '<td> <a href="google.com">' . $row['link'] .  '</a></td>' ?>
                                <td>
                                    <a href="delete.php?title=<?php echo $row['title'] ?>&type=library
                                            "><i class='material-icons '><i class="fa-solid fa-trash-can"></i></i></a>
                                </td>


                            </tr>

                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </div>


    <script src="js/library.js"></script>
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
    </script>
</body>

</html>