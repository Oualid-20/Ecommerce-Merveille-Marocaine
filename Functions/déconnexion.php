<?
    session_start();
    session_unset();
    session_destroy();
  
    /*if(isset($_SESSION['user_role'])) {
        session_destroy();
    }*/
    
    header("location:../index.php");
?>
