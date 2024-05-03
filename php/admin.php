<?php
    session_start();
    $pageTitle = "Admin Login";
    include"../includes/head.php" ;
?>
    <link rel="stylesheet" href="/merveille_marocaine/assets/css/connexion.css">
    <link rel="stylesheet" href="/merveille_marocaine/assets/css/s'inscrire.css">

<body>
   <style>
    .section-droite{
        clip-path: polygon(0 0, 108% 0%, 146% 59%, 0 95%);
    background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%);
    }
   </style>
    <div class="ecran-divise">
        <div class="section-droite">
            <div class="cote-droit">
            <form action="../Functions/functions.php" method="POST">
                <h2>Admin</h2> <br>
                <input class='mb-3' name="email"type="email" placeholder="Email" required>
                <input class='mb-3' name="password" type="password" placeholder="Mot de passe" required>
                <button type="submit" name="btn-connecte" class="bouton-connexion">CONNEXION</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>