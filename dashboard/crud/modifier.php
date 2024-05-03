<?php
    session_start();
    include "../../Functions/dbConnexion.php";  

        //fct Modifier une catégorie 
        //echo $_POST["type"];

        
        if ($_POST["type"]=="categorie") {            
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier_catégorie'])) {
                $id = $_POST['id_cat'];
                $nom = $_POST['nom_cat'];
                $description = $_POST['descrip_cat'];
                // Mise à jour de l'icône si un nouveau fichier est téléchargé
                if (!empty($_FILES['icone']['name'])) {
                    $icone = $_FILES['icone']['name'];
                    $destination = '../../uploads/icones/' . uniqid() . $icone;
            
                    if (!move_uploaded_file($_FILES['icone']['tmp_name'], $destination)) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Erreur lors du déplacement du fichier
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        header("Location: ../categories.php");
                        exit;
                    }
            
                    $requete_update = "UPDATE CATEGORIES SET NOM = ?, DESCRIPTION_CAT = ?, ICONE = ? WHERE ID_CATEGORIE = ?";
                    $stmt = $conn->prepare($requete_update);
                    $stmt->bind_param("sssi", $nom, $description, $destination, $id);
                } else {
                    // Si l'icône n'est pas mise à jour, utilisez une requête différente
                    $requete_update = "UPDATE CATEGORIES SET NOM = ?, DESCRIPTION_CAT = ? WHERE ID_CATEGORIE = ?";
                    $stmt = $conn->prepare($requete_update);
                    $stmt->bind_param("ssi", $nom, $description, $id);
                }
            
                if ($stmt->execute()) {
                    $_SESSION["message_CRUD"] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Catégorie mise à jour avec succès
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } else {
                    $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Erreur lors de la mise à jour de la catégorie
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            
                header("Location: ../categories.php");
            }
        }   


        //modifier un pdt 


            if ($_POST["type"]=="produit") {            
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier_produit'])) {
                    $id = $_POST['id_pdt'];
                    $nom = mysqli_real_escape_string($conn, $_POST['NOM_PDT']);
                    $description = mysqli_real_escape_string($conn, $_POST['DESCRIPTION_PDT']);
                    $prix = mysqli_real_escape_string($conn, $_POST['PRIX_PDT']);
                    $id_cat = $_POST['nom_cat'];
                    $cooperative = $_POST['nom_coop'];
                    
                    $image_path = null;
                
                    if (!empty($_FILES['IMAGE_PDT']['name'])) {
                        $image = $_FILES['IMAGE_PDT']['name'];
                        $destination = '../../uploads/produits/' . uniqid() . $image;
                
                        if (!move_uploaded_file($_FILES['IMAGE_PDT']['tmp_name'], $destination)) {
                            $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'> Erreur lors du déplacement de l'image
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                            header("Location: ../produits.php");
                            exit;
                        }
                
                        $image_path = $destination;
                    }
                
                    // Si une nouvelle image est fournie, mettez à jour avec elle
                    if ($image_path) {
                        $query_update = "UPDATE PRODUITS SET NOM_PDT = ?, DESCRIPTION_PDT = ?, PRIX_PDT = ?, ID_CATEGORIE = ?, COOPERATIVE = ?, IMAGE_PDT = ? WHERE ID_PDT = ?";
                        $stmt = $conn->prepare($query_update);
                        $stmt->bind_param("ssdisss", $nom, $description, $prix, $id_cat, $cooperative, $image_path, $id);
                    } else {
                        // Si aucune nouvelle image n'est fournie
                        $query_update = "UPDATE PRODUITS SET NOM_PDT = ?, DESCRIPTION_PDT = ?, PRIX_PDT = ?, ID_CATEGORIE = ?, COOPERATIVE = ? WHERE ID_PDT = ?";
                        $stmt = $conn->prepare($query_update);
                        $stmt->bind_param("ssdiss", $nom, $description, $prix, $id_cat, $cooperative, $id);
                    }
                
                    if ($stmt->execute()) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-success alert-dismissible fade show' role='alert'> Produit mis à jour avec succès
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    } else {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger'>Erreur lors de la mise à jour du produit</div>";
                    }
                
                    header("Location: ../produits.php");
                }
            }
                
            // modifier admin 
            
            if ($_POST['type']=='admin') {
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier_admin']) ) {
                    $id = $_POST['id_adm'];
                    $nom = mysqli_real_escape_string($conn, $_POST['NOM']);
                    $prenom = mysqli_real_escape_string($conn, $_POST['PRENOM']);
                    $email = mysqli_real_escape_string($conn, $_POST['EMAIL']);
                    $mot_de_passe = htmlspecialchars($_POST['MOT_DE_PASSE']);  
                    $telephone = mysqli_real_escape_string($conn, $_POST['TELEPHONE']);
                
                    if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe) || empty($telephone)) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger'>Un des champs est vide</div>";
                        header("Location: ../admins.php");
                        exit;
                    }
                
                    // Vérification de l'email pour éviter les doublons
                    $query = "SELECT COUNT(*) AS count FROM utilisateurs WHERE EMAIL = ? AND ID != ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("si", $email, $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                
                    if ($row['count'] > 0) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger'>Cet email est déjà utilisé par un autre administrateur.</div>";
                        header("Location: ../admins.php");
                        exit;
                    }
                
                    // Requête pour mettre à jour les détails de l'administrateur
                    $query_update = "UPDATE utilisateurs SET NOM = ?, PRENOM = ?, EMAIL = ?, MOT_DE_PASSE = ?, TELEPHONE = ? WHERE ID = ?";
                    $stmt = $conn->prepare($query_update);
                    $stmt->bind_param("sssssi", $nom, $prenom, $email, $mot_de_passe, $telephone, $id);

                    
                
                    if ($stmt->execute()) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-success'>Mise à jour réussie</div>";
                    } else {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger'>Erreur lors de la mise à jour</div>";
                    }
                
                    header("Location: ../admins.php");
                }
                
            }

            // modifier cooperative 
            
            if ($_POST['type']=='cooperative') {

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier_cooperative'])) {
                    $id = $_POST['id_coop'];
                    $nom = mysqli_real_escape_string($conn, $_POST['NOM']);
                    $prenom = mysqli_real_escape_string($conn, $_POST['PRENOM']);
                    $email = mysqli_real_escape_string($conn, $_POST['EMAIL']);
                    $mot_de_passe = htmlspecialchars($_POST['MOT_DE_PASSE']);
                    $telephone = mysqli_real_escape_string($conn, $_POST['TELEPHONE']);
                    $nom_cooperative = mysqli_real_escape_string($conn, $_POST['NOM_COOPERATIVE']);
                
                    if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($nom_cooperative)) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger'>Un des champs est vide</div>";
                        header("Location: ../cooperatives.php");
                        exit;
                    }
                
                    // Vérifiez s'il y a des doublons d'email
                    $query = "SELECT COUNT(*) AS count FROM utilisateurs WHERE EMAIL = ? AND ID != ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("si", $email, $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                
                    if ($row['count'] > 0) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger'>Cet email est déjà utilisé par une autre coopérative.</div>";
                        header("Location: ../cooperatives.php");
                        exit;
                    }
                
                    // Requête pour mettre à jour la coopérative
                    $query_update = "UPDATE utilisateurs SET NOM = ?, PRENOM = ?, EMAIL = ?, MOT_DE_PASSE = ?, TELEPHONE = ?, NOM_COOPERATIVE = ? WHERE ID = ?";
                    $stmt = $conn->prepare($query_update);
                    $stmt->bind_param("ssssssi", $nom, $prenom, $email, $mot_de_passe, $telephone, $nom_cooperative, $id);
                
                    if ($stmt->execute()) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-success'>Coopérative mise à jour avec succès</div>";
                    } else {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger'>Erreur lors de la mise à jour de la coopérative</div>";
                    }
                
                    header("Location: ../cooperatives.php");
                }
                }



?>