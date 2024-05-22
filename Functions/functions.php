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
    }else{
            $email= $_POST["email"]; $password= htmlspecialchars($_POST["password"]);
            $req="SELECT * FROM utilisateurs 
                WHERE EMAIL ='$email' AND MOT_DE_PASSE='$password' ";

            $result = $conn -> query($req);
            $utilisateur = mysqli_fetch_assoc($result);
            if ($utilisateur['EMAIL']=== $email){
                if ($utilisateur['MOT_DE_PASSE']=== $password){
                    $_SESSION["user_email"]= $utilisateur["EMAIL"]; $_SESSION["user_password"]= $utilisateur["MOT_DE_PASSE"];$_SESSION["user_id"]= $utilisateur["ID"];
                    $_SESSION["user_role"]= $utilisateur["ROLE"]; $_SESSION["user_tele"]= $utilisateur["TELEPHONE"];
                    $_SESSION["user_nom"]= $utilisateur["NOM"]; $_SESSION["user_prenom"]= $utilisateur["PRENOM"];
                    $_SESSION["user_coop"]= $utilisateur["NOM_COOPERATIVE"];

                    
                    if( $utilisateur["ROLE"] === 'cooperative' ){

                        header("location: ../dashboard/produits");
                    }
                    elseif($utilisateur["ROLE"] === 'admin' ){

                        header("location: ../dashboard/index.php");

                    }
                    else{
                        header("location:../index.php");
                    }            
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


//Contact Us
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contactUs']))  {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);
        require "../sendmail/send.php" ;

        contactUs($name, $email, $phone, $subject, $message);
    }







// Verification connecter
    if(!isset($_SESSION["user_id"])){
        header("location: ../");
        exit;
    }

//ajouter avis 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['rating'], $_POST['testimonial']) && !empty($_POST['rating']) && !empty($_POST['testimonial'])) {

            
            $rating = $_POST['rating'];

                if($rating>5){
                    $rating=5;
                }
                else if($rating<0){
                    $rating=0;
                }


            $testimonial = $_POST['testimonial'];

            // Assurez-vous de remplacer cette valeur par l'identifiant de l'utilisateur actuel
            $userID = $_SESSION['user_id'];

            // Préparez et exécutez la requête d'insertion dans la table temoignages
            $stmt = $conn->prepare("INSERT INTO temoignages (ID, TEXT_TEMOIGN, NOTE) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $userID, $testimonial, $rating);
            $stmt->execute();

            // Votre code de redirection ou de message de succès ici

            $_SESSION["message"]= " <div class='alert alert-success alert-dismissible fade show' role='alert'>  Merci Pour Votre Avis.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>";


        } else {
            // Gérez le cas où des données requises sont manquantes dans le formulaire
            $_SESSION["message"]= " <div class='alert alert-warning alert-dismissible fade show' role='alert'>  Le formulaire n'est pas complet.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>";
            
        }
    } else {
        // Gérez le cas où le formulaire n'est pas soumis
        $_SESSION["message"]= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>  Le formulaire n'a pas été soumis.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>";
    }





    
// Fonction pour générer un numéro de suivi aléatoire

    function generateTrackingNumber() {
        // Longueur du numéro de suivi
        $length = 10;
    
        // Caractères possibles dans le numéro de suivi
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        $trackingNumber = '';
    
        // Générer le numéro de suivi en sélectionnant aléatoirement des caractères
        for ($i = 0; $i < $length; $i++) {
            $trackingNumber .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $trackingNumber;
    }




    
?>