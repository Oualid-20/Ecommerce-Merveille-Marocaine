<?php
    session_start();
    include("dbConnexion.php");

//Autentifier le Client 
if(!isset($_POST["ajouter_user"])) {
    $_SESSION["message"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> Veuiller remplir les champs
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    header("location: ../php/s'inscrire.php");
} else {
    $nom= $_POST["nom"]; $prenom= $_POST["prenom"]; $email= $_POST["email"];
    $tele= $_POST["tele"]; $password= htmlspecialchars($_POST["password"]);

    /////////////////////////// contre sql
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $password = mysqli_real_escape_string($conn, $password);
    $tele = mysqli_real_escape_string($conn, $tele);

    if ( empty($nom) || empty($prenom) || empty($email) || empty($tele) || empty($password) ){
        
            $_SESSION["message"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> Un des Champs est vides
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            header("location: ../php/s'inscrire.php");
    } else {
        if( preg_match("/[A-Za-z]{3,50}/", $nom) && preg_match("/[A-Za-z]{3,50}/", $prenom) && is_numeric($tele) ){

            if( preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/", $email) ){

                $vérifieEmail = "SELECT COUNT(*) AS count FROM utilisateurs WHERE EMAIL = '$email'";
                $resultat = $conn -> query($vérifieEmail);
                $row = mysqli_fetch_assoc($resultat);
                $email_count = $row['count'];

                if ($email_count > 0) {
                    $_SESSION["message"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'> L'email existe déjà
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                    header("location: ../php/s'inscrire.php");
                } else {
                    $requete_insert="INSERT INTO utilisateurs (NOM,PRENOM,EMAIL,MOT_DE_PASSE,TELEPHONE,ROLE,NOM_COOPERATIVE,DATE_CREE) 
                                     VALUES('$nom','$prenom','$email','$password','$tele','client', NULL, NOW() )";

                    $exec_requete=mysqli_query($conn,$requete_insert);

                    $_SESSION["message_cnct"]="<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Authentification avec succès,<strong> Bienvenue parmi Nous</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                    header("location: ../php/connecter_clt.php");
                }
            } else {
                $_SESSION["message"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> L'email entré est invalide 
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                header("location: ../php/s'inscrire.php");
            }
        } else {
                $_SESSION["message"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Le nom ou prénom ou N° tel est invalide, veuillez réessayer
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                header("location: ../php/s'inscrire.php");
        }
    }
}

// Se connecter

if(!isset($_POST['btn-connecte']) ){
    $_SESSION["message_cnct"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> Veuiller remplir les champs
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    header("location: ../php/connecter_clt.php");  
} else{
    $email= $_POST["email"]; $password= htmlspecialchars($_POST["password"]);
    $req="SELECT * FROM utilisateurs 
          WHERE EMAIL ='$email' AND MOT_DE_PASSE='$password' ";

    $result = $conn -> query($req);
    $utilisateur = mysqli_fetch_assoc($result);
    if ($utilisateur['EMAIL']=== $email){
        if ($utilisateur['MOT_DE_PASSE']=== $password){
            $_SESSION["user_email"]= $utilisateur["EMAIL"]; $_SESSION["user_password"]= $utilisateur["MOT_DE_PASSE"];
            $_SESSION["user_role"]= $utilisateur["ROLE"]; $_SESSION["user_tele"]= $utilisateur["TELEPHONE"];
            $_SESSION["user_nom"]= $utilisateur["NOM"]; $_SESSION["user_prenom"]= $utilisateur["PRENOM"];

            
                header("location:../index.php");
            
            
        }
        else{
            $_SESSION["message_cnct"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> Le Mot De Passe est incorrecte
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            header("location: ../php/connecter_clt.php");  
        }
    }
    else{
        $_SESSION["message_cnct"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> L'Email est incorrecte
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        header("location: ../php/connecter_clt.php");  
    }
}















    
?>