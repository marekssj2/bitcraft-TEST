<?php
// function renderHTML($navbar, $body, $footer){
//     if($footer){renderFooter()}

// }

function renderHead(){
    echo'
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Home</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- FontAwsome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

        <!-- StyleCSS --!>

        <link rel="stylesheet" href="static/style.css">
        ';
}

function renderNavbar(){
    echo'
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav navbar-nav navbar-left">
            <li class="nav-item"><a class="nav-link" href="./users.php">Users-DEBUG</a></li>
            <li class="nav-item"><a class="nav-link" href="./login.php">Login-DEBUG</a></li>
            <li class="nav-item"><a class="nav-link" href="./register.php"><span class="fas fa-plus mr-2" ></span>Register-DEBUG</a></li>
            <li class="nav-item"><a class="nav-link" href="./profile.php"><span class="fas fa-headphones mr-2" ></span>Profile-DEBUG</a></li>
        </ul>
        <ul class="nav navbar-nav ml-auto">';
        
        if(isset($_SESSION['login'])){
          echo'
                <li class="nav-item">
                  <a class="nav-link" href="./profile.php?user='.$_SESSION["login"].'"><span class="fas fa-user mr-2"></span>' .$_SESSION["login"].'</a> 
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php"><span class="fas fa-sign-out-alt mr-2 text-danger"></span>Logout</a></li>
              ';
        }else{
          echo'
                <li class="nav-item"><a class="nav-link" href="login.php"><span class="fas fa-user mr-2"></span>Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php"><span class="fas fa-angle-double-down mr-2"></span>Register</a></li>
              ';                  
        }
    echo'
        </ul>
        </div>
    </nav> 
    ';
}

function renderFooter(){
    echo'
        <footer class="font-small bg-dark">
        <div class="container">
            <div class="py-3 text-center text-white">
                © 2018 Copyright:
                <strong> Marek Majewski</strong>
            </a>
            </div>
        </div>
        </footer>
        ';
}

?>






