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
    <title>Questionnaire</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/questionnaire.css">
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
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>

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
                    <li class="">
                        <a href="home.php" class="text-decoration-none px-3 py-2 d-block ">
                            <i class="fa-solid fa-house fa-fw"></i>&nbsp;
                            Home</a>
                    </li>
                    <hr class="mb-0 mt-0 bg-white">

                    <li class=""><a href="scanQR.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-expand fa-fw"></i>&nbsp;
                            Scan QR code</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="view-attendence.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-user-check fa-fw"></i>&nbsp;
                            View Attendence</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="study time table.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-table-cells fa-fw"></i>&nbsp;
                            Study Time Table</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="Exam time table.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-calendar-days fa-fw"></i>&nbsp;
                            Exams Time Table</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="Resources.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-book fa-fw"></i>&nbsp;
                            Resources</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="books.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-book-open fa-fw"></i>&nbsp;
                            Books</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="results.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-graduation-cap fa-fw"></i>&nbsp;
                            Results</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class=""><a href="notifications.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-bell fa-fw"></i>&nbsp;
                            Notifications</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <li class="active"><a href="questionnaire.php" class="text-decoration-none px-3 py-2 d-block">
                            <i class="fa-solid fa-square-poll-vertical fa-fw"></i>&nbsp;
                            Questionnaire</a></li>
                    <hr class="mb-0 mt-0 bg-white">
                    <!-- ////////////////////////////////////////// -->
                </ul>

            </div>
            <div class="sidebar-buttons">
                <a href="change-pass-st.php"><button id="changePass">Change Password</button></a>
                <a href="../admin/logout.php"><button id="logout">Log Out&nbsp;<i
                            class="fa-solid fa-right-from-bracket fa-fw"></i></button></a>

            </div>
        </nav>

        <!-- Page Content  -->
        <div class="navbar-light  py-0 ">

        </div>
        <div class="home">
            <div class="container mt-1 questionnaire">
                <h1 class="display-6 mb-5"><i class="fa fa-square-poll-vertical text-primary"></i> EVALUATION<span
                        class="text-primary">
                        QUESTIONNAIRE</span></h1><br>


                <?php
                include "../login/conncection.php";

                $select_sql = "SELECT * FROM `stuff`   ";
                $res = $conn->query($select_sql);





                ?>

                <form method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?>">
                    <table>
                        <tr>
                            <th>Teacher</th>
                            <th>Rating</th>
                        </tr><?php
                                include "../login/conncection.php";

                                $select_sql = "SELECT * FROM `stuff`   ";
                                $res = $conn->query($select_sql);


                                if ($res->rowCount() > 0) {
                                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                                        if (isset($_POST['submit'])) {

                                            $teacher_id = $row['stuff_id'];

                                            $name = $row['name'];
                                            $replaced = str_replace(' ', '_', $name);
                                            $rank = $_POST[$replaced];


                                            $sql = "INSERT INTO `rank`(`rank`, `tacher_id`) VALUES ( '$rank','$teacher_id')";
                                            $conn->query($sql);
                                        }



                                ?>
                        <tr>
                            <td><?php echo $row['name'] ?> </td>
                            <td>
                                <input type="radio" required name="<?php echo $row['name'] ?>" value="0">&nbsp;0&nbsp;
                                <input type="radio" required name="<?php echo $row['name'] ?>" value="1">&nbsp;1&nbsp;
                                <input type="radio" required name="<?php echo $row['name'] ?>" value="2">&nbsp;2&nbsp;
                                <input type="radio" required name="<?php echo $row['name'] ?>" value="3">&nbsp;3&nbsp;
                                <input type="radio" required name="<?php echo $row['name'] ?>" value="4">&nbsp;4&nbsp;
                                <input type="radio" required name="<?php echo $row['name'] ?>" value="5">&nbsp;5&nbsp;
                            </td>
                        </tr>

                        <?php }
                                } ?>

                    </table>


                    <?php if (isset($_POST['submit'])) {
                        print_r($_POST);
                    } ?>

                    <div class="text-center">
                        <input type="submit" value="Submit" name="submit" class=" submit">
                    </div>
                </form>



            </div>

        </div>


    </div>

    <script src="js/qrCodeScanner.js"></script>
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
    </script>
    <script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const outputDiv = document.getElementById('output');
    const constraints = {
        video: {
            facingMode: 'environment'
        }
    };

    navigator.mediaDevices.getUserMedia(constraints)
        .then(function(stream) {
            video.srcObject = stream;
            video.setAttribute('playsinline', true);
            video.play();
            requestAnimationFrame(tick);
        })
        .catch(function(error) {
            console.error(error);
        });

    function tick() {
        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, imageData.width, imageData.height);
            if (code) {

                outputDiv.innerHTML = code.data;
                //geting link from the output
                var findlink = document.getElementById("link");
                findlink.href = code.data;
            }
        }
        requestAnimationFrame(tick);
    }
    </script>

</body>

</html>