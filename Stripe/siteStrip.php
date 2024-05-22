<?php 
session_start();
require_once 'vendor/autoload.php';

$stripe_secret_key = "sk_test_51PIfBRRrE3idEDXKzoCm7BQjgWwou4ALoFrXz1RiUAQ4LfDd8RN2UKMVDyjon2C1VOK6gwGPy2X2tR2j6X8Uj0cX00qIBuhtKq";
\Stripe\Stripe::setApiKey($stripe_secret_key);

// Vérifier si le panier existe dans la session
if(isset($_SESSION['Panier'])) {


    $line_items = [];
    foreach ($_SESSION['Panier'] as $item) {
        $line_items[] = [
            "quantity" => $item['quantite'],
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => $item['prix'] * 100, 
                "product_data" => [
                    "name" => $item['produit']
                ]
            ]
        ];
    }

    // Créer la session de paiement avec Stripe en utilisant les articles du panier
    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/merveille_marocaine/Stripe/faitP.php",
        "cancel_url" => "http://localhost/merveille_marocaine/checkout.php",
        "line_items" => $line_items
    ]);

    // Redirection vers le processus de paiement Stripe
    http_response_code(303);
    header("Location: " . $checkout_session->url);
    exit;
} else {
    // Rediriger vers une page d'erreur si le panier est vide
    header("Location: http://localhost/empty_cart.php");
    exit;
}
?>
