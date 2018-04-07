<?php
  session_start();

  require_once "restore.php";
  require_once "connect.php";
  require_once "scripts.php";

  if(isset($_SESSION['login'])){
    header("location: index.php");
  }
  
	mysqli_report(MYSQLI_REPORT_STRICT);

  if(isset($_POST['register-btn'])) {
    try
      {
        //CREATE CONNECTION IN TO DATABASE
        $db = mysqli_connect($host, $db_user, $db_password, $db_name);

        //TAKING DATA FROM FORM
        $login = mysqli_real_escape_string($db, $_POST['login']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password2 = mysqli_real_escape_string($db, $_POST['password2']);

        $passedTests = true;
        

        // LOGIN VALIDATION

        if(strlen($login)<5 || strlen($login)>20){
          $passedTests = false;
          $_SESSION['erro-login'] = "Login is to short or long!";
        }

        // EMAIL VALIDATION
        
        if((filter_var($email, FILTER_VALIDATE_EMAIL)==false)){
          $passedTests = false;
          $_SESSION['erro-email'] = "Invalid email!";
        }
        // PASSWORD VALIDATION
        if(strlen($password)<8 || strlen($password)>20){
          $passedTests = false;
          $_SESSION['erro-password'] = "Password is to short or long!";
        }

        if($password != $password2){
          $passedTests = false;
          $_SESSION['erro-password2'] = "Passwords don't match!";
        }
        $password = md5($password);
        
        //IS USER EGSIST?
        $query = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");
        if(mysqli_num_rows($query)>0){
          $passedTests = false;
          $_SESSION['erro-login'] = "Username alredy egsist!";
        }
        
        //IS EMAIL EGSIST?
        $emailQ = mysqli_query($db, "SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($emailQ)>0){
          $passedTests = false;
          $_SESSION['erro-email'] = "Email alredy egsist!";
        }
        $_SESSION['fr-login'] = $login;
        $_SESSION['fr-email'] = $email;

        //ADD USER TO DATABASE 
        if(mysqli_ping($db)){
          if($passedTests){
            $sql = "INSERT INTO users(login,email,password) VALUES('$login','$email','$password')";
            mysqli_query($db, $sql);
            $_SESSION['message'] = "You are logged in!";
            $_SESSION['login'] = $login;
            header("location:index.php");
            }
        }else{
          mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
          }

        //CLOSE CONNECTION
        mysqli_close($db);
      }
    catch(Exception $e)
      {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br />Informacja developerska: '.$e;
      }
    }
 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

    <!-- RENDER HEAD -->
    <?php renderHead();?> 
    
  </head>
  <body>
  
    <!-- RENDER NAVBAR -->
    <?php renderNavbar(); ?> 
    
    <div class="container myContainer">
      <div class="jumbotron mt-4">
        <h1 clas="display-3">Register</h1>
        <p class="lead"> 
          Create your own website acount. Join us today!
        </p>
        <hr class="my-4">
        <div class="row justify-content-center">
          <form class="col-md-8"action="register.php" method="POST">


            <!-- LOGIN -->
            <div class="form-group ">
              <label for="login">Login</label>
              <input type="login" class="form-control" name="login" id="login" aria-describedby="loginHelp" placeholder="Enter Login" value="<?php
                if(isset($_SESSION['fr-login'])){
                  echo $_SESSION['fr-login'];
                  unset($_SESSION['fr-login']);
                }
              ?>">
               <?php
                if(isset($_SESSION['erro-login'])){
                  echo'
                      <small id="loginHelp" class="form-text text-danger font-weight-bold">
                        '.$_SESSION['erro-login'].'
                      </small>
                     ';
                }else{
                  echo'
                      <small id="loginHelp" class="form-text text-muted">
                        Your login must be 5-20 characters long, and must not contain spaces, special characters, or emoji.
                      </small>
                     ';
                }
               ?>
              
              
            </div>


           <!-- EMAIL -->
           <div class="form-group ">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="login" placeholder="Enter Email"value="<?php
                if(isset($_SESSION['fr-email'])){
                  echo $_SESSION['fr-email'];
                  unset($_SESSION['fr-email']);
                }
              ?>">
              
               <?php
                if(isset($_SESSION['erro-email'])){
                  echo'
                      <small class="form-text text-danger font-weight-bold">
                        '.$_SESSION['erro-email'].'
                      </small>
                     ';
                }
               ?>
            </div>
        

            <!-- PASSWORD -->
            <div class="form-group ">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" placeholder="Enter Password">
              <?php
                if(isset($_SESSION['erro-password'])){
                  echo'
                      <small id="passwordHelp" class="form-text text-danger font-weight-bold">
                        '.$_SESSION['erro-password'].'
                      </small>
                     ';
                }else{
                  echo'
                      <small id="passwordHelp" class="form-text text-muted">
                      Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji
                      </small>
                     ';
                }
               ?>
            </div>


            <!-- rePASSWORD -->
            <div class="form-group ">
              <label for="password2">Repeat Password</label>
              <input type="password" class="form-control" name="password2" placeholder="Enter Password">
              <?php
                if(isset($_SESSION['erro-password2'])){
                  echo'
                      <small class="form-text text-danger font-weight-bold">
                        '.$_SESSION['erro-password2'].'
                      </small>
                     ';
                }
               ?>
            </div>

            <button type="submit" class="btn btn-primary" name='register-btn'>Register</button>

          </form>
        </div>
      </div>
    </div>
    <!-- RENDER FOOTER -->
    <?php renderFooter();  ?>
  </body>

</html>
