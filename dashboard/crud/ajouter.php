<?php
    session_start();
    include "../../Functions/dbConnexion.php";  

        //fct Ajouter une catégorie 
        //echo $_POST["type"];

        
        if ($_POST["type"]=="categorie") {            
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["ajouter_catégorie"])  ) {

                    $nom_cat = $_POST["nom_cat"];
                    $description_cat = $_POST["descrip_cat"];
                    $icone = $_FILES['icone']['name'];

                    $destination = '../../uploads/icones/' . uniqid() . $icone;  //stock
                        if (!move_uploaded_file($_FILES['icone']['tmp_name'], $destination)) {
                            
                            $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Erreur lors du déplacement du fichier
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                            header("Location: ../categories.php");
                            exit;
                        }
                    
                        $requete_insert = $conn->prepare("INSERT INTO CATEGORIES (NOM, DESCRIPTION_CAT, ICONE) 
                                                        VALUES (?, ?, ?)");
                        $requete_insert->bind_param( "sss",$nom_cat,$description_cat,$destination);
                    
                        if ($requete_insert->execute()) {
                            $_SESSION["message_CRUD"] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                Catégorie ajoutée avec succès
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        } else {
                            $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Erreur lors de l'ajout de la catégorie
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }
                        header("Location: ../categories.php");
                        exit;
                }else {
                    $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Veuillez remplir les champs
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    header("Location: ../categories.php");
                    exit; 
                } 
        }   


        //ajouter un pdt 


        if ($_POST["type"]=="produit") {            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["ajouter_pdt"])  ) {

                $nom_pdt = $_POST["NOM_PDT"];$cat_du_pdt=$_POST["nom_cat"];
                    $description_pdt = $_POST["DESCRIPTION_PDT"]; $prix_pdt=$_POST["PRIX_PDT"];
                    $image = $_FILES['IMAGE_PDT']['name']; $cooperative=$_POST["nom_coop"];
    
                    $destination = '../../uploads/produits/' . uniqid() . $image;  //stock
                        if (!move_uploaded_file($_FILES['IMAGE_PDT']['tmp_name'], $destination)) {
                            
                            $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Erreur lors du déplacement de l'image du pdt
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                            header("Location: ../produits.php");
                            exit;
                        }
                    
                        $requete_insert = $conn->prepare("INSERT INTO PRODUITS (ID_CATEGORIE, NOM_PDT, DESCRIPTION_PDT, PRIX_PDT, IMAGE_PDT, COOPERATIVE) 
                                                        VALUES (?, ?, ?, ?, ?, ?)");
                        $requete_insert->bind_param( "issdss",$cat_du_pdt,$nom_pdt, $description_pdt, $prix_pdt, $destination, $cooperative);
                    
                        if ($requete_insert->execute()) {
                            $_SESSION["message_CRUD"] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                Produit ajoutée avec succès
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        } else {
                            $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Erreur lors de l'ajout du produites
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }
                        header("Location: ../produits.php");
                        exit;
                }else {
                    $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Veuillez remplir les champs
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    header("Location: ../produits.php");
                    exit; 
            } 
    }   
                
            // ajouter admin 
            
            if ($_POST['type']=='admin') {
                    if(!isset($_POST["ajouter_admin"])) {
                        $_SESSION["message_CRUD"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> Veuiller remplir les champs
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        header("location: ../admins.php");
                    } else {
                        

                            $nom = $_POST["NOM"];$prenom=$_POST["PRENOM"];
                            $email = $_POST["EMAIL"]; $password=htmlspecialchars($_POST["MOT_DE_PASSE"]);
                            $telephone = $_POST["TELEPHONE"];


                    
                        /////////////////////////// contre sql
                        $nom = mysqli_real_escape_string($conn, $nom);
                        $prenom = mysqli_real_escape_string($conn, $prenom);
                        $password = mysqli_real_escape_string($conn, $password);
                        $telephone = mysqli_real_escape_string($conn, $telephone);
                    
                        if ( empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($password) ){
                            
                                $_SESSION["message_CRUD"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> Un des Champs est vides
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                                header("location: ../admins.php");
                        } else {
                            if( preg_match("/[A-Za-z]{3,50}/", $nom) && preg_match("/[A-Za-z]{3,50}/", $prenom) && is_numeric($telephone) ){
                    
                                if( preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/", $email) ){
                    
                                    $vérifieEmail = "SELECT COUNT(*) AS count FROM utilisateurs WHERE EMAIL = '$email'";
                                    $resultat = $conn -> query($vérifieEmail);
                                    $row = mysqli_fetch_assoc($resultat);
                                    $email_count = $row['count'];
                    
                                    if ($email_count > 0) {
                                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'> L'email existe déjà
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                        header("location: ../admins.php");
                                    } else {
                                        $requete_insert="INSERT INTO utilisateurs (NOM,PRENOM,EMAIL,MOT_DE_PASSE,TELEPHONE,ROLE,NOM_COOPERATIVE,DATE_CREE) 
                                                        VALUES('$nom','$prenom','$email','$password','$telephone','admin', NULL, NOW() )";
                    
                                        $exec_requete=mysqli_query($conn,$requete_insert);
                    
                                        $_SESSION["message_CRUD"]="<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        Ajout avec succès,<strong> Bienvenue parmi Nous</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                        header("location: ../admins.php");
                                    }
                                } else {
                                    $_SESSION["message_CRUD"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> L'email entré est invalide 
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    header("location: ../admins.php");
                                }
                            } else {
                                    $_SESSION["message_CRUD"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    Le nom ou prénom ou N° tel est invalide, veuillez réessayer
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    header("location: ../admins.php");
                            }
                        }
                    }
                }
            // ajouter cooperative 
            
            if ($_POST['type']=='cooperative') {

                    if(!isset($_POST["ajouter_coop"])) {
                        $_SESSION["message_CRUD"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> Veuiller remplir les champs
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        header("location: ../admins.php");
                    } else {
                        

                            $nom = $_POST["NOM"];$prenom=$_POST["PRENOM"];
                            $email = $_POST["EMAIL"]; $password=htmlspecialchars($_POST["MOT_DE_PASSE"]);
                            $telephone = $_POST["TELEPHONE"];$coop = $_POST['NOM_COOPERATIVE'];


                    
                        /////////////////////////// contre sql
                        $nom = mysqli_real_escape_string($conn, $nom);
                        $prenom = mysqli_real_escape_string($conn, $prenom);
                        $password = mysqli_real_escape_string($conn, $password);
                        $telephone = mysqli_real_escape_string($conn, $telephone);
                        $coop=mysqli_real_escape_string($conn, $coop);
                    
                        if ( empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($password) || empty($coop)){
                            
                                $_SESSION["message_CRUD"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> Un des Champs est vides
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                                header("location: ../cooperatives.php");
                        } else {
                            if( preg_match("/[A-Za-z]{3,50}/", $nom) && preg_match("/[A-Za-z]{3,50}/", $prenom) && is_numeric($telephone) ){
                    
                                if( preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/", $email) ){
                    
                                    $vérifieEmail = "SELECT COUNT(*) AS count FROM utilisateurs WHERE EMAIL = '$email'";
                                    $resultat = $conn -> query($vérifieEmail);
                                    $row = mysqli_fetch_assoc($resultat);
                                    $email_count = $row['count'];
                    
                                    if ($email_count > 0) {
                                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'> L'email existe déjà
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                        header("location: ../cooperatives.php");
                                    } else {
                                        $requete_insert="INSERT INTO utilisateurs (NOM,PRENOM,EMAIL,MOT_DE_PASSE,TELEPHONE,ROLE,NOM_COOPERATIVE,DATE_CREE) 
                                                        VALUES('$nom','$prenom','$email','$password','$telephone','cooperative','$coop', NOW() )";
                    
                                        $exec_requete=mysqli_query($conn,$requete_insert);
                    
                                        $_SESSION["message_CRUD"]="<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        Ajout avec succès,<strong> Bienvenue parmi Nous</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                        header("location: ../cooperatives.php");
                                    }
                                } else {
                                    $_SESSION["message_CRUD"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'> L'email entré est invalide 
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    header("location: ../cooperatives.php");
                                }
                            } else {
                                    $_SESSION["message_CRUD"]="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    Le nom ou prénom ou N° tel est invalide, veuillez réessayer
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    header("location: ../cooperatives.php");
                            }
                        }
                    }
                }



?>