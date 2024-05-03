<?php
    session_start();
    include "../../Functions/dbConnexion.php";  
/*    
        if (isset($_GET['Id_cat']) ){

            $id = intval($_GET['Id_cat']);


            $requete_supprime = $conn->prepare("DELETE FROM CATEGORIES WHERE ID_CATEGORIE = ?");
            $requete_supprime->bind_param("i", $id); 

            if ($requete_supprime->execute()) { // Exécution de la requête
                $_SESSION["message_CRUD"] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Catégorie supprimée avec succès
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            } else {
                $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Erreur lors de la suppression de la catégorie
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            
            }header("Location: ../categories.php");
        exit;
        }*/
        
            if (isset($_GET['type']) && isset($_GET['Id'])) {
                $entity_type = $_GET['type']; 

                $id = intval($_GET['Id']); 

                switch ($entity_type) {
                    case 'categories':
                        $requete = $conn->prepare("DELETE FROM CATEGORIES WHERE ID_CATEGORIE = ?");
                        $message_success = "Catégorie supprimée avec succès.";
                        break;

                    case 'produits':
                        $requete = $conn->prepare("DELETE FROM PRODUITS WHERE ID_PDT = ?");
                        $message_success = "Produit supprimé avec succès.";
                        break;

                    case 'admins':
                        $requete = $conn->prepare("DELETE FROM UTILISATEURS WHERE ID = ?");
                        $message_success = "Administrateur supprimé avec succès.";
                        break;

                    case 'cooperatives':
                        $requete = $conn->prepare("DELETE FROM UTILISATEURS WHERE ID = ?");
                        $message_success = "Coopérative supprimée avec succès.";
                        break;

                    default:
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Type d'entité inconnu.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        header("Location: ../categories.php");
                        exit;
                }

                // Si la requête est définie, exécutez-la
                if (isset($requete)) {
                    $requete->bind_param("i", $id); // Lier l'ID comme paramètre
                    if ($requete->execute()) {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            $message_success
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    } else {
                        $_SESSION["message_CRUD"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Erreur lors de la suppression.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
    
                    header("Location: ../".$_GET["type"].".php");
                    exit;
                }
               
            }

/*
            */


    ?>