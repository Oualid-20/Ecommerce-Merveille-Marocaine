<?php
    session_start();
    include("dbConnexion.php");



    if (!isset($_SESSION["user_id"])) {
        header("location: ../");
        exit;
    }

    // Initialisation du total général
    if (!isset($_SESSION['total_general'])) {
        $_SESSION['total_general'] = 0;
    }

    if (!isset($_SESSION['Panier'])) {
        $_SESSION['Panier'] = [];
    }

    // Supprimer un produit du panier
    if (isset($_GET['supprimeCart']) && isset($_GET['classementCart'])) {
        $reponse = $_GET['supprimeCart'];
        $classement = $_GET['classementCart'];

        if (is_numeric($classement) && $reponse === 'ok') {

            foreach ($_SESSION['Panier'] as $index => $item) {
                if ($classement == $index) {

                    $montant_total_produit_retire = $item['total'];
                    unset($_SESSION['Panier'][$index]);
                    $_SESSION['total_general'] -= $montant_total_produit_retire;
                    break;
                }
            }
        }
        header('location:../cart.php');
        exit;
    }

    if (empty($_POST['quantity']) || !is_numeric($_POST['quantity']) || intval($_POST['quantity']) <= 0) {
        header("Location: ../shop-filter.php");
        exit;
    }

    $client = $_SESSION["user_id"];
    $idProduit = isset($_POST['id_produit']) ? intval($_POST['id_produit']) : null;
    $quantite = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

    if ($idProduit === null || $quantite <= 0) {
        header("Location: ../shop-filter.php");
        exit;
    }

    // Obtenir les détails du produit
    $stmt = $conn->prepare("SELECT ID_PDT,NOM_PDT, PRIX_PDT, IMAGE_PDT FROM produits WHERE ID_PDT = ?");
    $stmt->bind_param("i", $idProduit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pdtID = $row['ID_PDT'];
        $nom_produit = $row['NOM_PDT'];
        $prix_produit = $row['PRIX_PDT'];
        $img_produit = $row['IMAGE_PDT'];
    
        $image_path = 'uploads/produits/' . basename($img_produit);
    
        $produit_existe = false;
    
        // Vérifier si le produit est déjà dans le panier
        foreach ($_SESSION['Panier'] as &$item) {
            if ($item['produit'] === $nom_produit) {
                $item['quantite'] += $quantite;
                $item['total'] = $item['quantite'] * $item['prix'];
                $produit_existe = true;
                break;
            }
        }
    
        // Si le produit n'existe pas, l'ajouter au panier et mettre à jour le total général
        if (!$produit_existe) {
            $_SESSION['Panier'][] = [
                'ID_produit' => $pdtID,
                'produit' => $nom_produit,
                'quantite' => $quantite,
                'prix' => $prix_produit,
                'total' => $quantite * $prix_produit,
                'image' => $image_path
            ];
    
            // Mettre à jour le total général uniquement si le produit est ajouté pour la première fois
            $_SESSION['total_general'] += $quantite * $prix_produit;
        }
    } else {
        echo "Produit non trouvé.";
        exit;
    }

    header('location:../cart.php');
?>