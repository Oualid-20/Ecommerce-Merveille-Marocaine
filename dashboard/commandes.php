<?php 
    session_start();
    $pageTitle = "Commande";
 
    include "../Functions/dbConnexion.php";
    include "../includes/head.php" ;


        if (!isset($_SESSION['user_role'])) {
            header("location:../php/connecter_clt.php");
                
        } 

        $userRole = $_SESSION['user_role'];
        if ($userRole === 'client') {
            // Redirigez le client vers la page d'accueil
            header("location:../index.php");
        } 

    include "crud/affiche.php"; 



        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        $commandes = afficherCommande($page);
        
        // Exécuter la requête pour compter le nombre total de commandes
        $stmt = $conn->prepare("SELECT COUNT(ID_COMMANDE) AS total FROM commandes");
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result) {
            $rowCount = $result->fetch_assoc(); 
            $total = $rowCount['total'];
        } else {
            // Gérer les erreurs de requête SQL
            die("Erreur de requête SQL : " . $conn->error);
        }
        
        $perPage = 9; // Nombre de commandes par page
        $pages = ceil($total / $perPage); // Calcul du nombre total de pages
        
        $Previous = $page - 1;
        $Next = $page + 1;
    

     include "../includes/navDashboard.php" ;
     include "../includes/sidebar.php";
     ?>

 

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">

        <div> <?php if (isset($_SESSION["message_CRUD"]) ){ echo $_SESSION["message_CRUD"]; unset($_SESSION["message_CRUD"]); } ?> </div>
            <div class="container mt-3 d-flex justify-content-between">
                <h2>Commandes</h2>
                
            </div>
        
        </div>
        <table class="table table-striped mt-4">
            <thead class='table-success'>
                <tr>
                    <th>#</th>
                    <th>Nom Prenom</th>
                    <th>Email</th>
                    <th>Télephone</th>
                    <th>Adress</th>
                    <th>Date</th>
                    <th>Tracking</th>
                </tr>
            </thead>
            <tbody>
               <?php
                    foreach ($commandes as $commande) {
                        ?>
                        <tr> 
                            <td><?= $commande['ID_COMMANDE']; ?></td>
                            <td><?= $commande['NOM'];', ' .$commande['PRENOM'];?></td>
                            <td><?= $commande['EMAIL']; ?></td>
                            <td><?= '0'.$commande['TELEPHONE']; ?></td>
                            <td><?= $commande['ADRESSE']; ?></td>
                            <td><?= $commande['DATE_COMMANDE']; ?></td>
                            <td><?= $commande['TRACKING']; ?></td>
                        </tr>
                 <?php } ?>
            </tbody>
        </table>


        <div class="pagination" style="justify-content: center;">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item <?= $Previous <= 0 ? 'disabled' : '' ?>">
                        <a class="page-link" href="commandes.php?page=<?= $Previous <= 0 ? 1 : $Previous; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                    </li>
                    <?php for($i = 1; $i <= $pages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="commandes.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item <?= $Next > $pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="commandes.php?page=<?= $Next > $pages ? $pages : $Next; ?>" aria-label="Next">
                            <span aria-hidden="true">Next &raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        </div>  
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
</body>
</html>