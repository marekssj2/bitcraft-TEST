<?php
  session_start();

  //IMPORT FUNCS FROM SCRIPTS.PHP
  require_once "scripts.php";

  //RESTORE FORM FIELDS
  require_once "restore.php";

  //IMPORT DATA TO CREATE CONNECTION 
  require_once "connect.php";

  if(isset($_SESSION['login'])){
    header("location: index.php");
  }
?>

<?php

  // CREATE CONNECTION IN TO DATABASE
  $db = mysqli_connect($host, $db_user, $db_password, $db_name);

  if(isset($_POST['login']) && isset($_POST['password']) ) {
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //CREATE PASSWORD HASH 
    $password = md5($password);

    //TRY TO SELECT USER FROM DATABASE
    $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    $result = mysqli_query($db, $query);

    //IS USER EGSIST IN DB?
    if(mysqli_num_rows($result) == 1){
      $_SESSION['login'] = $login;
      header("location: index.php");
    }else{
      $_SESSION['erro-login'] = "username/ password incorerect!";
    }
  }
  //CLOSE CONNECTION
  mysqli_close($db)
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    
    <!-- START RENDER HEAD -->
    <?php renderHead();?> 
    <!-- END RENDER HEAD -->
    
  </head>
  <body>
  
    <!-- START RENDER NAVBAR -->
    <?php renderNavbar(); ?>
    <!-- END RENDER NAVBAR -->
    
    <!-- START CONTENT -->
    <div class="container myContainer">
      <div class="jumbotron mt-4">
        <h1 clas="display-3">Login</h1>
        <p class="lead"> 
          Login your account. Don't waste your time!
        </p>
        <hr class="my-4">
        <div class="row justify-content-center">
          <form class="col-md-8"action="login.php" method="POST">

            <!-- LOGIN -->
            <div class="form-group ">
              <label for="login">Login</label>
              <input type="text" class="form-control" name="login" id="login" placeholder="Enter Login">
            </div>

            <!-- PASSWORD -->
            <div class="form-group ">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
            </div>
            <?php
                if(isset($_SESSION['erro-login'])){
                  echo'
                      <p><small class="form-text text-danger font-weight-bold">
                        '.$_SESSION['erro-login'].'
                      </small></p>
                     ';
                }
               ?>

            <button type="submit" class="btn btn-primary" name='login-btn'>Log in</button>

          </form>
        </div>
      </div>
    </div>
    <!-- END CONTENT -->

    <!-- START RENDER FOOTER -->
    <?php renderFooter(); ?>
    <!-- END RENDER FOOTER -->
  </body>

</html>

