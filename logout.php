<?php
    session_start();

    //IMPORT FUNCS FROM SCRIPTS.PHP
    require_once "scripts.php";

    //RESTORE FORM FIELDS
    require_once "restore.php";

    //DESTROY SESSION
    session_destroy();

    unset($_SESSION['login']);

    //SEND TO INDEX.PHP
    header("location: index.php");
 ?>

