<?php 
        session_start(); 
        unset($_SESSION["Panier"]);   
        header("Location:../shop-filter.php");
?>



