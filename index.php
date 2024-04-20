<?php 
    session_start();
    $pageTitle = "Acceuil";
    include"includes/head.php" ;
    //var_dump($_SESSION);
    
?>

    <!-- déja connecter -->
    <?php  echo isset($_SESSION["message_dejaIN"]) ? $_SESSION["message_dejaIN"] : ""; unset($_SESSION["message_dejaIN"]);?>
</head>

<body>
    <div class="ecran-divise">
        <div class="cote-gauche">
            <div class="illustration">
                <img src="assets/img/connecte.png" alt="illustrateur" srcset="">
            </div>
            <div class="description">
                <h2>Nouveau ici?</h2>
                <p>Merveille Marocaine est un site e-com conçue pour vendre l'artisanat du Maroc.</p> <br>
                <button class="bouton-login"><a href="s'inscrire.php">S'INSCRIRE</a></button>
            </div>
        </div>
        <div class="cote-droit">
            <form action="#" method="POST">
                <h2>Se Connecter</h2> <br>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Mot de passe" required> <br>
                <button type="submit" class="bouton-connexion">CONNEXION</button>
            </form>
        </div>
    </div>
    <?php include"includes/footer.php" ?>
