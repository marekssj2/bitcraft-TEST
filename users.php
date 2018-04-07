<?php
  session_start();

  //IMPORT DATA TO CREATE CONNECTION 
  require_once "connect.php";
  //IMPORT FUNCS FROM SCRIPTS.PHP
  require_once "scripts.php";

  //CREATE CONNECTION IN TO DATABASE
  $db = mysqli_connect($host, $db_user, $db_password, $db_name);

  //CHECK CONNECTION
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  $query = "SELECT login FROM users";


  if ($result = mysqli_query($db, $query)) {
    $users_list = array();

    //FETCH ASSOCIATIVE ARRAY
    while ($row = mysqli_fetch_assoc($result)) {

      //PUSH USERS LOGINS TO ARRAY 
      array_push($users_list,$row['login']);
    }
    $_SESSION['users_list'] = $users_list;

    //FREE RESUTL SET
    mysqli_free_result($result);
  }

  /* close connection */
  mysqli_close($db);
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
    <div class="container myContaine myContainer">
      <div class="jumbotron mt-4">
        <h1 class="display-3">Users list</a></h1>
        <hr class="my-5">
        <div class="list-group">
          <?php
            //IS ANY USER EGSIST?
            if(isset($_SESSION['users_list'])){
              $list=$_SESSION['users_list'];
              foreach ($list as $user){
                echo'
                    <a href="./profile.php?user='.$user.'" class="list-group-item list-group-item-action">'.$user.'</a>
                    ';
              }
            }else{
              echo'
                  <p class="h2"> No users.</p>
                  ';
            }
          ?>
        </div>
      </div>
    </div>
    <!-- END CONTENT -->

    <!-- START RENDER FOOTER -->
    <?php renderFooter(); ?>
    <!-- END RENDER FOOTER -->
  </body>

</html>
