<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="img/C.png">
    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="css\login.css">
</head>

<body>
<section class="vh-100" style=" 
  background-color: #052c54;
  background-image: url(img/bgb.jpg); 
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" id="myCard">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="img/1.jpg"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form class="login_form" action="home.php" method="post" name="form" onsubmit="return validated()" id="form">
                    <?php if (isset($_SESSION['error'])) {
                      echo "<div style='margin-bottom: 5px;
                      margin-top: none;
                      font-size: 15px;
                      color: #C62828;
                      text-align: center;
                      padding: 5px 8px;'>";
      
                      echo $_SESSION['error'];
                      echo '</div>';
                    }
                    session_destroy();
                    ?>

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0" id="logo">
                        <i class="fas fa-bolt me-3"></i>Control</span>
                    </div>
  
                    <h5 class="h5 fw-normal mb-3 pb-3">Sign in your account</h5>
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="myInput">Email address:</label>
                      <input type="email" id="myInput" class="form-control form-control-lg emailtxt" autocomplete="off" name="email"/>
                      <div id="email_error">Please enter a valid Email</div>
                    </div>
  
                    <div class="form-outline mb-2">
                      <label class="form-label" for="myInput">Password:</label>
                      <input type="password" name="password" id="myPass" class="form-control form-control-lg" />
                      <a onclick="showPass()">
                        <i class="fa-solid fa-fw fa-eye field-icon px-3"></i>
                      </a>
                      <div id="pass_error">Please enter a valid password</div>
                    </div>

                    <div class="my-4" id="user-type">
                      <input type="radio" class="user-type" name="user-type" value="student" id="student-user"><label>Student</label>
                      <input type="radio" class="user-type" name="user-type" value="stuff" id="stuff-user"><label>Staff</label>
                      <input type="radio" class="user-type" name="user-type" value="admin" id="admin"><label>Admin</label>
                    </div>
  
                    <div>
                      <button class="btn btn-lg btn-block" id="submit" type="submit">Login</button>
                    </div>
  
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <script src="js/script.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
</body>

</html>