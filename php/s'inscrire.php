<?php 
    session_start();
    $pageTitle = "S'inscrire";
    include"../includes/head.php" ;
    include_once"../Functions/sessionConnect.php";
?>
    <link rel="stylesheet" href="/merveille_marocaine/assets/css/s'inscrire.css">
    <link rel="stylesheet" href="/merveille_marocaine/assets/css/connexion.css">

<body>
    <style>
        @media screen and (max-width: 768px) {
            .ecran-divise {
                flex-direction: column; 
                height: auto; }
            .cote-gauche, .cote-droit {
                flex: 1;
                padding: 20px; }
            .cote-gauche {
                clip-path: circle(101.1% at 73% -25%);  } }
        @media screen and (max-width: 480px) {
            .cote-gauche {
                clip-path: circle(153.1% at 14% 12%) } } 
    </style>
    <div class="ecran-divise">
        <div class="section-gauche">
             <?php  if (isset($_SESSION["message"]) ){ echo $_SESSION["message"]; unset($_SESSION["message"]); } ?>
            <form action="../Functions/functions.php" method="post">
                <h2>S'inscrire</h2> <br>
                    <input class="mb-3" id="nom_user" name="nom" placeholder="Nom" required>
                    <input class="mb-3" id="prenom_user" name="prenom" placeholder="Prenom" required>
                    <input class="mb-3" type="email" id="email" name="email" placeholder="Email" required>
                    <input class="mb-3" type="number" id="tele" name="tele" placeholder="N°Tel" required>
                    <input class="mb-3" type="password" id="mot_de_passe" name="password" placeholder="Mot de passe" required>
                    <button type="submit" class="btn-bleu" name="ajouter_user">S'INSCRIRE</button>
            </form>
        </div>
        <div class="section-droite">
            <div class="illustration">
                <img src="/merveille_marocaine/assets/img/s'inscrire.png" alt="illustrateur">
            </div>
            <div class="description">
                <p>Un des nôtres ? Merveille Marocaine Chaque jour est défi!</p>
                <p> Il n’y a pas de temps à s’ennuyer dans un monde aussi beau que celui-ci.</p>
            </div>
            <button class="bouton-login"><a href="/merveille_marocaine/php/connecter_clt.php">SE CONNECTER</a></button>
        </div>
    </div>
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>