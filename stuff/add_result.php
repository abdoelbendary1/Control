<?php
session_start();


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
    <title>Add result</title>
    <link rel="icon" type="image/x-icon" href="img/C.png">

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/add-result.css">
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
                    <h1 class="fs-3"><span class="bg-white text-dark rounded shadow px-2"><i
                                class="fa-solid fa-bolt"></i></span> &nbsp;<span class="text-white">Control</span></h1>
                </div>
                <hr>
                <ul class="list-unstyled listItem px-3">
                    <li class=""><a href="home.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-house fa-fw "></i>&nbsp;
                            Home</a></li>
                    <hr class="mb-0 mt-0 bg-white">

                    <li class=""><a href="take attendence.php" class="text-decoration-none px-3 py-2 d-block">
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

                    <li class="active"><a href="add-result.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-file-circle-plus fa-fw"></i>&nbsp;
                            Add Result</a></li>
                    <hr class="mb-0 mt-0 bg-white">

                    <li class=""><a href="view-result.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-graduation-cap fa-fw"></i>&nbsp;
                            View Result</a></li>

                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="notice board.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-message fa-fw"></i>&nbsp;
                            Send Notice</a></li>

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
                <a href="../admin/logout.php"><button id="logout">Log Out&nbsp;<i
                            class="fa-solid fa-right-from-bracket fa-fw"></i></button></a>

            </div>
        </nav>


        <!-- Page Content  -->
        <div class="navbar-light  py-0 ">

        </div>
        <div class="home">
            <div class="container mt-1">
                <h1 class="display-6"><i class="fa fa-file-circle-plus text-primary"></i> Add<span class="text-primary">
                        Result</span></h1>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-2">




                            <?php
                            include '../login/conncection.php';
                            $course_name = $_POST['course'];
                            $select_sql = "SELECT * FROM `course` where `course_name` = '$course_name'  ";
                            $res = $conn->query($select_sql);
                            $row = $res->fetch(PDO::FETCH_ASSOC);
                            $course_id = $row['course_id'];
                            $_SESSION['course_id'] = $course_id;
                            ?>





                        </div>


                    </div>


                    <?php





                    ?>
                    <form action="add_results.php" method="post">


                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Exam Marks</th>
                                    </tr>
                                </thead>
                                <tbody id="student-table">
                                    <?php

                                    $grade = $row['grade'];
                                    $select_sql = "SELECT * FROM `student` WHERE `grade` = '$grade'  ";
                                    $res = $conn->query($select_sql);

                                    if ($res->rowCount() > 0) {
                                        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {



                                    ?>

                                    <tr>
                                        <?php  ?>
                                        <td><?php echo $row['name'] ?></td>


                                        <input type="hidden" value="<?php echo $row['name']   ?>" name="name[]">



                                        <td><input name="result[]" style="  width: 60% !important;
                                      margin-left: auto !important;
                                      margin-right: auto !important;
                                      padding: 6px 8px !important;
                                      border-radius: 1.5em !important;
                                      border-width: 2px !important;
                                      border-style: solid !important;
                                      border-color: rgb(24, 135, 217) !important;
                                      border-image: initial !important;" type="number" min="0" max="100" id="numInput"
                                                placeholder="Enter exam marks.."></td>
                                    </tr>



                                    <?php
                                            // if (isset($_POST['save'])){
                                            // $count = count($_POST['result']){

                                            // }

                                            // if (isset($_POST['result'])) {


                                            //     $student_name = $_POST['sname'];
                                            //     $result = $_POST['result'];

                                            //     $select_sql = "SELECT * FROM `results` WHERE `student_name` = '$student_name'  ";
                                            //     $res = $conn->query($select_sql);




                                            //     if ($res->rowCount() == 0) {
                                            //         echo 'ahmed';

                                            //         $sql = "INSERT INTO `results`(`result`, `course_name`, `student_name`) VALUES ('$result','$course_name','$student_name')";
                                            //         $res = $conn->query($sql);
                                            //     } else {

                                            //         $sql = "UPDATE `results` SET `result`='$result',`course_name`='$course_name' where `student_name` = '$student_name' ";
                                            //         $res = $conn->query($sql);
                                            //     }


                                            //         
                                            ?> <script>
                                    // location.replace('add-result.php');
                                    // 
                                    </script> <?php
                                                    }
                                                }
                                                // }
                                                        ?>

                                </tbody>
                            </table>


                            <div class="row" style="    --bs-gutter-x: 0rem;">
                                <div class="col mt-4">
                                    <button type="submit" name="save" class="button btn-block">
                                        <i class="fa-solid fa-floppy-disk"></i>&nbsp;
                                        Save Results</button>
                                </div>
                            </div>
                    </form>

                </div>

            </div>


        </div>

    </div>

    <?php



    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="JS/all.js"></script>
    <script src="JS/add-result.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/jquery-3.6.0.min_2.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script>
    </script>
</body>

</html>