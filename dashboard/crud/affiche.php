<?php


//fct Afficher les catégories

 function afficherCategorie($page = 1) {

    global $conn;

    $perPage = 9;
    $offset = ($page - 1) * $perPage;

    // Utiliser une requête préparée pour plus de sécurité
    $stmt = $conn->prepare("SELECT * FROM CATEGORIES LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $perPage, $offset);
    $stmt->execute();

    $result = $stmt->get_result();
    $categories = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $categories;
}






function afficherClient($page = 1) {
    global $conn;

    $perPage = 9; // Nombre de clients à afficher par page

    // Calculer l'offset
    $offset = ($page - 1) * $perPage;

    // Utiliser une requête préparée pour plus de sécurité
    $stmt = $conn->prepare("SELECT * FROM UTILISATEURS WHERE ROLE = 'client' LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $perPage, $offset);
    $stmt->execute();

    $result = $stmt->get_result();
    $clients = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $clients;
}



function afficherCoop($page = 1) {

    global $conn;

        $perPage = 9;
        $offset = ($page - 1) * $perPage;

        // Utiliser une requête préparée pour plus de sécurité
        $stmt = $conn->prepare("SELECT * FROM UTILISATEURS WHERE ROLE = 'cooperative' LIMIT ?, ?");
        $stmt->bind_param("ii", $offset, $perPage);
        $stmt->execute();

        $result = $stmt->get_result();
        $coops = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $coops;
}

function afficherAdmin($page = 1) {
    global $conn;

    $perPage = 9; // Nombre d'administrateurs à afficher par page

    // Calculer l'offset
    $offset = ($page - 1) * $perPage;

    // Utiliser une requête préparée pour plus de sécurité
    $stmt = $conn->prepare("SELECT * FROM UTILISATEURS WHERE ROLE = 'admin' LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $perPage, $offset);
    $stmt->execute();

    $result = $stmt->get_result();
    $admins = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $admins;
}

function afficherProduit($page = 1, $coopName = null) {
    global $conn;

    $perPage = 9;
    $offset = ($page - 1) * $perPage;

    if ($coopName) {
        $stmt = $conn->prepare("SELECT p.ID_PDT, p.NOM_PDT, p.DESCRIPTION_PDT, p.PRIX_PDT, p.COOPERATIVE, p.IMAGE_PDT, p.IMAGE2_PDT, p.IMAGE3_PDT, c.NOM 
                                FROM PRODUITS p 
                                INNER JOIN CATEGORIES c ON p.ID_CATEGORIE = c.ID_CATEGORIE 
                                WHERE p.COOPERATIVE = ? 
                                LIMIT ?, ?");
        $stmt->bind_param("sii", $coopName, $offset, $perPage);
    } else {
        $stmt = $conn->prepare("SELECT p.ID_PDT, p.NOM_PDT, p.DESCRIPTION_PDT, p.PRIX_PDT, p.COOPERATIVE, p.IMAGE_PDT, p.IMAGE2_PDT, p.IMAGE3_PDT, c.NOM 
                                FROM PRODUITS p 
                                INNER JOIN CATEGORIES c ON p.ID_CATEGORIE = c.ID_CATEGORIE 
                                LIMIT ?, ?");
        $stmt->bind_param("ii", $offset, $perPage);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $produits = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $produits;
}
/*
function afficherCommande($page = 1){

    global $conn;

    $perPage = 9;
    $offset = ($page - 1) * $perPage;


    $requeteSelect=" SELECT c.ID_COMMANDE, u.NOM, u.PRENOM, u.EMAIL, u.TELEPHONE, c.ADRESSE, c.DATE_COMMANDE, c.TRACKING
                     FROM  commandes c INNER JOIN utilisateurs u ON c.ID = u.ID";

    $result = $conn->query($requeteSelect);
    $commandes = $result->fetch_all(MYSQLI_ASSOC);

    return $commandes;
}*/

function afficherCommande($page = 1){

    global $conn;

    $perPage = 9;
    $offset = ($page - 1) * $perPage;

    // Utiliser une requête préparée pour plus de sécurité
    $stmt = $conn->prepare("SELECT c.ID_COMMANDE, u.NOM, u.PRENOM, u.EMAIL, u.TELEPHONE, c.ADRESSE, c.DATE_COMMANDE, c.TRACKING
                            FROM commandes c 
                            INNER JOIN utilisateurs u ON c.ID = u.ID 
                            LIMIT ?, ?");
    $stmt->bind_param("ii", $offset, $perPage);
    $stmt->execute();

    $result = $stmt->get_result();
    $commandes = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $commandes;
}

function afficherAvis(){

    global $conn;

    $requeteSelect="SELECT t.TEXT_TEMOIGN, t.NOTE, t.ID_TEMOIGN ,u.ID, u.NOM, u.PRENOM FROM TEMOIGNAGES t INNER JOIN UTILISATEURS u 
                    ON t.ID = u.ID  ORDER BY t.ID_TEMOIGN DESC LIMIT 9";

    $result = $conn->query($requeteSelect);
    $avis = $result->fetch_all(MYSQLI_ASSOC);

    return $avis;
}

function affichePdt($id) {
    global $conn;
    
    //$requeteSelect = $conn->prepare("SELECT * FROM PRODUITS WHERE ID_PDT = ?");
    $requeteSelect = $conn->prepare("SELECT p.ID_PDT, p.NOM_PDT, p.DESCRIPTION_PDT, p.PRIX_PDT, p.COOPERATIVE, p.IMAGE_PDT, p.IMAGE2_PDT, p.IMAGE3_PDT, c.NOM 
                      FROM PRODUITS p INNER JOIN CATEGORIES c ON p.ID_CATEGORIE = c.ID_CATEGORIE WHERE p.ID_PDT = ? ");
    $requeteSelect->bind_param("i", $id); 

    $requeteSelect->execute();

    $result = $requeteSelect->get_result(); 

    if ($result->num_rows > 0) {
        $pdt = $result->fetch_assoc(); 
    } else {
        $pdt = null; 
    }
    return $pdt;
}



?>