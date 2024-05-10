<?php
    session_start();
    include("dbConnexion.php");


    if(!isset($_SESSION["user_id"])){
        header("location: ../");
        exit;
    }
    
    if (empty($_POST['quantity']) || !is_numeric($_POST['quantity']) || intval($_POST['quantity']) <= 0) {
        header("Location: ../shop-filter.php");
        exit;
    }


    if (!isset($_SESSION['Panier'])) {

        $_SESSION['Panier'] = [];
    }
    
    $client = $_SESSION["user_id"];
    $idProduit = isset($_POST['id_produit']) ? intval($_POST['id_produit']) : null;
    $quantite = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    
    if ($idProduit === null || $quantite <= 0) {
        header("Location: ../shop-filter.php");
        exit;
    }
    
    // Obtenir les détails du produit
    $stmt = $conn->prepare("SELECT NOM_PDT, PRIX_PDT,IMAGE_PDT FROM produits WHERE ID_PDT = ?");
    $stmt->bind_param("i", $idProduit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nom_produit = $row['NOM_PDT'];
        $prix_produit = $row['PRIX_PDT'];
        $img_produit = $row['IMAGE_PDT'];
      


        $image_path = 'uploads/produits/'.basename($img_produit);


        $produit_existe = false;

        foreach ($_SESSION['Panier'] as &$item) { 
            if ($item['produit'] === $nom_produit) {
                $item['quantite'] += $quantite; 
                $item['total'] = $item['quantite'] * $item['prix']; 
                $produit_existe = true; 
                break; 
            }
        }
    
        // Si le produit n'existe pas, l'ajouter au panier
        if (!$produit_existe) {
            $_SESSION['Panier'][] = [
                'produit' => $nom_produit,
                'quantite' => $quantite,
                'prix' => $prix_produit,
                'total' => $quantite * $prix_produit,
                'image' => $image_path
            ];
        }
    } else {
        echo "Produit non trouvé.";
        exit;
    }
    

    header('location:../cart.php');

?>
