<?php 
    session_start();
    $pageTitle = "Se Connecter";
    include"../includes/head.php" ;
    include_once"../Functions/sessionConnect.php";
?>
    <link rel="stylesheet" href="/merveille_marocaine/assets/css/connexion.css">
    <link rel="stylesheet" href="/merveille_marocaine/assets/css/s'inscrire.css">

<body>
    <div class="ecran-divise">
        <div class="cote-gauche">
            <div class="illustration">
                <img src="/merveille_marocaine/assets/img/connecte.png" alt="illustrateur" srcset="">
            </div>
            <div class="description">
                <h2>Nouveau ici?</h2>
                <p>Merveille Marocaine est un site e-com conçue pour vendre l'artisanat du Maroc.</p> <br>
                <button class="bouton-login"><a href="/merveille_marocaine/php/s'inscrire.php"> S'INSCRIRE</a></button>
            </div>
        </div>
        <div class="cote-droit">
        <?php  if (isset($_SESSION["message_cnct"]) ){ echo $_SESSION["message_cnct"]; unset($_SESSION["message_cnct"]); } ?>
            <form action="../Functions/functions.php" method="POST">
                <h2 class="mb-3">Se Connecter</h2> 
                <input class="mb-3" name='email' type="email" placeholder="Email" required>
                <input class="mb-3" name='password' type="password" placeholder="Mot de passe" required>
                <button type="submit" name='btn-connecte' class="bouton-connexion">CONNEXION</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>