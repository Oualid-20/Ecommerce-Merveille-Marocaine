<?php


    if ( isset( $_SESSION["user_email"]) ||isset($_SESSION["user_password"]) ||
         isset($_SESSION["user_password"]) || isset($_SESSION["user_nom"]) ||
         isset($_SESSION["user_role"]) || isset($_SESSION["user_prenom"]) ) {

            

            $_SESSION["message_dejaIN"]= "<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong> Vous êtes déja connecter</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";

            

            header("location:../index.php");

        }

           

?>