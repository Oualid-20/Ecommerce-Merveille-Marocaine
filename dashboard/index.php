<?php 
    session_start();
    $pageTitle = "Dashboard";
    include "../Functions/dbConnexion.php";
    include "../includes/head.php" ;

            // Vérification du rôle de l'utilisateur
            if (!isset($_SESSION['user_role'])) {
                header("location:../php/connecter_clt.php");
                    
            } 

            $userRole = $_SESSION['user_role'];
            if ($userRole === 'client') {
                 // Redirigez le client vers la page d'accueil
                 header("location:../index.php");
             } elseif ($userRole === 'cooperative') {
                 // Redirigez la coopérative vers produits.php
                 header("location:produits.php");
                 exit(); // Arrêtez l'exécution du script après la redirection
             }












   //statistique 
        $nbrAdmins = $conn->query("SELECT COUNT(*) AS total FROM utilisateurs WHERE ROLE='admin'")->fetch_assoc()['total'];
        $nbrClients = $conn->query("SELECT COUNT(*) AS total FROM utilisateurs WHERE ROLE='client'")->fetch_assoc()['total'];
        $nbrCooperatives = $conn->query("SELECT COUNT(*) AS total FROM utilisateurs WHERE ROLE='cooperative'")->fetch_assoc()['total'];
        $nbrCategories = $conn->query("SELECT COUNT(*) AS total FROM categories")->fetch_assoc()['total'];


     include"../includes/navDashboard.php" ;

     include"../includes/sidebar.php" ?>

   

<div id="main-content" class="container allContent-section py-2">
        <section id="contenue">
            <main>
                <ul class="box-info">
                    <li>
                        <i class='bx bx-user'></i>
                        <span>
                            <h3><?= $nbrAdmins; ?></h3>
                            <p>Total Admins</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-group'></i>
                        <span>
                            <h3><?= $nbrClients; ?></h3>
                            <p>Clients</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bx-store-alt' ></i>
                        <span>
                            <h3><?= $nbrCooperatives; ?></h3>
                            <p>Total Cooperatives</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bx-category'></i>
                        <span>
                            <h3><?= $nbrCategories; ?></h3>
                            <p>Total Catégories</p>
                        </span>
                    </li>
                </ul>
            </main>
        </section>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
</body>
</html>