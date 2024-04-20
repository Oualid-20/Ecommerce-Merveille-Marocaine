<?php


       if ($_SESSION["user_role"] == 'admin' || $_SESSION["user_role"] == 'cooperative') {

            if ($_SESSION["user_role"] == 'admin'){
                header("location:../dashboard");
            }
            else{
                header("location:../dashboard/produites.php");
            }
        
    }else{
        header("location:../index.php");
    }
    

?>