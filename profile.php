<?php 
  session_start();

  //IMPORT FUNCS FROM SCRIPTS.PHP
  require_once "scripts.php";

  //IMPORT DATA TO CREATE CONNECTION 
  require_once "connect.php";


  if(empty($_GET['user'])){  
        header("location: index.php");
  }else{
    // CREATE CONNECTION IN TO DATABASE
    $db = mysqli_connect($host, $db_user, $db_password, $db_name);

    // TRY TO CONNECT TO DATABASE
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $login = mysqli_real_escape_string($db, $_GET['user']);

    //TAKEING USER LOGIN AND EMAIL FROM DATABASE
    if ($result = mysqli_query($db, "SELECT login,email FROM users WHERE login='$login'")) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['login'] = $row['login'];
      $_SESSION['email'] = $row['email'];

      //FREE RESULT SET
      mysqli_free_result($result);
  }


    //CLOSE CONNECTION
    mysqli_close($db);
}
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
        <h1 class="display-3">User Details:</h1>
        <br>
        <p class="h4">User name: <?php echo $_SESSION['login']?></p>
        <p class="h4">Email: <?php echo $_SESSION['email']?></p>
        <hr class="my-4">
        <p class="lead"> 
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis iste totam, praesentium deleniti exercitationem eaque corrupti illo nesciunt ipsum? Laudantium quis cum quos laborum eum! Necessitatibus sit iure quam provident.
        </p>
        
        <div class="row justify-content-center">


        </div>
      </div>
    </div>
    <!-- END CONTENT -->

    <!-- START RENDER FOOTER -->
    <?php renderFooter(); ?>
    <!-- END RENDER FOOTER -->
    
  </body>

</html>


