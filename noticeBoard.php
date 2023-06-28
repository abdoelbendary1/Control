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
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/notice board.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,500;0,600;1,400;1,500&family=Roboto+Slab:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    
    <nav id="sidebar" class="">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                
            </button>
        </div>
        <div class="p-4">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2">CL</span> <span class="text-white">control</span></h1>               
            </div>
            
            <ul class="list-unstyled listItem px-3">
                <li class=""><a href="dashboard.html"class="text-decoration-none px-3 py-2 d-block "> <i class="fa-solid fa-chart-line"></i>&nbsp;Dashboard</a></li><hr class="mb-0 mt-0 bg-white">
                <!-- <li class=""><a href="#" class="text-decoration-none px-3 py-2  d-block"> Students</a></li><hr class="mb-0 mt-0 bg-white" >
                 -->
                <li class="dropdown" >
                    <a href="dashboard.html" class="nav-link dropdown-toggle text-truncate text-decoration-none px-3 py-2  d-block" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class=""></i><i class="fa-solid fa-graduation-cap"></i>&nbsp;Students
                    </a>
                    <ul class="dropdown-menu st-option" aria-labelledby="dropdown">
                        <li><a class="dropdown-item" href="allStudents.html" >All Students</a></li>
                        <li><a class="dropdown-item" href="studentInfo.html">Student details</a></li>
                        <li><a class="dropdown-item " href="add-removeStudent.html">Add || Remove </a></li>
                        <li><a class="dropdown-item" href="promotStudents.html">Promote</a></li>
                        
                    </ul>
                </li>
                <hr class="mb-0 mt-0 bg-white" >
                <li class="dropdown" >
                    <a href="dashboard.html" class="text-decoration-none px-3 py-2  d-block nav-link dropdown-toggle text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class=""></i><i class="fa-solid fa-person-chalkboard"></i>&nbsp;Staff
                    </a>
                    <ul class="dropdown-menu st-option" aria-labelledby="dropdown">
                        <li><a class="dropdown-item" href="allStuff.html" >All Staff</a></li>
                        <li><a class="dropdown-item" href="stuff-Info.html">Staff details</a></li>
                        <li><a class="dropdown-item " href="add-removeStuff.html">Add || Remove </a></li>
                    </ul>
                </li>


                
                <!-- ////////////////////////////////////////// -->

                <hr class="mb-0 mt-0 bg-white" >
                <li class=""><a href="library.html" class="text-decoration-none px-3 py-2  d-block"><i class="fa-solid fa-book"></i> Library</a></li><hr class="mb-0 mt-0 bg-white" >
                <li class=""><a href="courses.html" class="text-decoration-none px-3 py-2  d-block"><i class="fa-solid fa-pen"></i> Courses</a></li><hr class="mb-0 mt-0 bg-white" >
                <li class=""><a href="exam.html" class="text-decoration-none px-3 py-2  d-block"><i class="fa-solid fa-calendar-days"></i> Exams</a></li><hr class="mb-0 mt-0 bg-white" >
                <li class="active"><a href="notice board.html" class="text-decoration-none px-3 py-2  d-block"><i class="fa-solid fa-message"></i>&nbsp;Notice Board</a></li><hr class="mb-0 mt-0 bg-white" >

            </ul>
        </div>
        <div class="sidebar-buttons">
          <a href="change-pass-ad.html"><button id="changePass">Change Password</button></a>
          <a href="login/index.html"><button id="logout">Log Out&nbsp;<i class="fa-solid fa-right-from-bracket"></i></button></a>
         
      </div>
          </nav>
   
          <!-- Page Content  -->
          <div class="navbar-light  py-0 ">
        </div>
        <div class="home ">      
            <div class="row justify-content-center">
                <div class="col-md-6 mt-4">
                  <div class="card message-container">
                    <h1 class="message-title">Send <b>Notice</b> <i class="fa-solid fa-message text-info"></i></h1>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                      <div class="form-group">
                        <label for="subject" class="subject">Subject</label>
                        <input type="text" name="subject" maxlength="45" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="message" class="message">Message</label>
                        <textarea name="message" cols="30" rows="7" required maxlength="500" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="student">
                          <label class="form-check-label" for="flexRadioDefault1">Send to <b>All Student</b></label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked value="stuff">
                          <label class="form-check-label" for="flexRadioDefault2">Send to <b>All Staff</b></label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked value="all">
                          <label class="form-check-label" for="flexRadioDefault3">Send to <b>Both</b></label>
                        </div>
                      </div>
                      <p class="button-container">
                        <button name="submit" class="btn submit btn-primary" type="submit" value="Send">submit</button>
                      </p>
                    </form>
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
  
    (function ($) {
        "use strict";
        var fullHeight = function () {
            $(".js-fullheight").css("height", $(window).height());
            $(window).resize(function () {
                $(".js-fullheight").css("height", $(window).height());
            });
        };
        fullHeight();
        $("#sidebarCollapse").on("click", function () {
            $("#sidebar").toggleClass("active");
        });
    })(jQuery);



</script>
</body>
</html>