<?php
  session_start();

  //IMPORT FUNCS FROM SCRIPTS.PHP
  require_once "scripts.php";
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
        <?php
          
          // IS USER LOGGED IN?
          if(isset($_SESSION['login'])){
            echo'
            <h1 class="display-3">Welcome '.$_SESSION['login'].'!</a></h1>
            ';
          }else{
            echo'
            <h1 class="display-3">Welcome guest!</a></h1>
            ';
          }
        ?>
        <hr class="my-5">
        <p class="h2">Lorem ipsum</p>
        <p class="h4">Lorem ipsum</p>
        <p class="lead">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia corporis corrupti qui molestiae maiores praesentium modi voluptatibus dolor laborum labore hic distinctio esse quos repudiandae harum, delectus in. Nihil, minima.
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id sint perferendis provident veniam impedit, sit fugiat praesentium nihil, facere odio delectus nostrum error soluta beatae esse. Tempora distinctio ratione reprehenderit.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, alias neque minus, delectus veniam dolorem quia tenetur ex eum sunt ab, quaerat ratione iste voluptates dolore deleniti voluptatibus ullam nisi.
        </p>
        <p class="lead"> 
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor recusandae illum accusamus? Id sunt sapiente odio ipsum, corrupti repudiandae sed atque porro, nam unde error obcaecati, vitae modi asperiores non!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque commodi nemo excepturi mollitia at corrupti sit harum dolor, blanditiis voluptatibus maiores illum necessitatibus corporis. Consectetur voluptates neque harum molestias alias!
        </p>
        <p class="lead"> 
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor recusandae illum accusamus? Id sunt sapiente odio ipsum, corrupti repudiandae sed atque porro, nam unde error obcaecati, vitae modi asperiores non!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque commodi nemo excepturi mollitia at corrupti sit harum dolor, blanditiis voluptatibus maiores illum necessitatibus corporis. Consectetur voluptates neque harum molestias alias!
        </p>
        <p class="h2">Lorem ipsum</p>
        <p class="h4">Lorem ipsum</p>
        <p class="lead">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia corporis corrupti qui molestiae maiores praesentium modi voluptatibus dolor laborum labore hic distinctio esse quos repudiandae harum, delectus in. Nihil, minima.
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id sint perferendis provident veniam impedit, sit fugiat praesentium nihil, facere odio delectus nostrum error soluta beatae esse. Tempora distinctio ratione reprehenderit.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, alias neque minus, delectus veniam dolorem quia tenetur ex eum sunt ab, quaerat ratione iste voluptates dolore deleniti voluptatibus ullam nisi.
        </p>
      </div>
    </div>
    <!-- END CONTENT -->

    <!-- START RENDER FOOTER -->
    <?php renderFooter(); ?>
    <!-- END RENDER FOOTER -->

  </body>

</html>
