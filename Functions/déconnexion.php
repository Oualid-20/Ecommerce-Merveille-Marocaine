<?
    session_start();
    if(isset($_SESSION['user_role'])) {
        session_destroy();
    }
    
    header("location:../index.php");
?>
