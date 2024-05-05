<?php


//fct Afficher les catégories

 function afficherCategorie() {

    global $conn;

    $requetteSelect= "SELECT * FROM CATEGORIES";

    $result = $conn->query($requetteSelect);
    
    $categories = $result->fetch_all(MYSQLI_ASSOC); 
    return $categories;
}

function afficherClient($page = 1, $perPage = 10) {
    global $conn;

    // Calculer l'offset
    $offset = ($page - 1) * $perPage;

    $requetteSelect = "SELECT * FROM UTILISATEURS WHERE ROLE = 'client' LIMIT $perPage OFFSET $offset";

    $result = $conn->query($requetteSelect);

    $clients = $result->fetch_all(MYSQLI_ASSOC);
    return $clients;
}



function afficherCoop() {

    global $conn;

    $requetteSelect= "SELECT * FROM UTILISATEURS WHERE ROLE = 'cooperative'";

    $result = $conn->query($requetteSelect);
    
    $coops = $result->fetch_all(MYSQLI_ASSOC); 
    return $coops;
}

function afficherAdmin() {

    global $conn;

    $requetteSelect= "SELECT * FROM UTILISATEURS WHERE ROLE = 'admin'";

    $result = $conn->query($requetteSelect);
    
    $admins = $result->fetch_all(MYSQLI_ASSOC); 
    return $admins;
}

function afficherProduit() {
    global $conn;

    $requeteSelect = "SELECT * FROM PRODUITS";

    $result = $conn->query($requeteSelect);

    $produits = $result->fetch_all(MYSQLI_ASSOC);

    return $produits;
}




function affichePdt($id) {
    global $conn;
    
    $requeteSelect = $conn->prepare("SELECT * FROM PRODUITS WHERE ID_PDT = ?");
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