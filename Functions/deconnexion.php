<?php
    session_start();


    unset($_SESSION["user_email"]); unset($_SESSION["user_password"]); unset($_SESSION["user_id"]);unset($_SESSION["user_role"]); 
    unset($_SESSION["user_tele"]); unset($_SESSION["user_nom"]); unset($_SESSION["user_prenom"]);




    session_unset();
    session_destroy();
  
    
    
    header("location:../index.php");
    exit;
?>
