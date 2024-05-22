<?php 
    session_start();
    $pageTitle = "Client";
    include "../Functions/dbConnexion.php";
    include "../includes/head.php" ;

    if (!isset($_SESSION['user_role'])) {
        header("location:../php/connecter_clt.php");
            
    } 

    $userRole = $_SESSION['user_role'];
    if ($userRole === 'client') {

        header("location:../index.php");
     } elseif ($userRole === 'cooperative') {

        header("location:produits.php");
         exit(); 
     }




    include "crud/affiche.php"; 

     include "../includes/navDashboard.php" ;
     include "../includes/sidebar.php";

        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        $clients = afficherClient($page);
        
        $result1 = $conn->query("SELECT COUNT(id) AS id FROM UTILISATEURS WHERE ROLE = 'client'");
        if ($result1) {
            $custCount = $result1->fetch_assoc(); 
            $total = $custCount['id'];
        } else {
            // Gérer les erreurs de requête SQL
            die("Erreur de requête SQL : " . $conn->error);
        }
        
        $pages = ceil($total / 9); // Toujours diviser par 9 pour obtenir le nombre total de pages
        $Previous = $page - 1;
        $Next = $page + 1;
     ?>

<div id="main-content" class="container allContent-section py-4">
    <div class="row">
        <div class="container mt-3 d-flex justify-content-between">
            <h2>Clients</h2>
        </div>
    </div>

    <table class="table table-striped mt-4">
        <thead class='table-success'>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Telephone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?php echo $client['ID']; ?></td>
                    <td><?php echo $client['NOM']; ?></td>
                    <td><?php echo $client['PRENOM']; ?></td>
                    <td><?php echo $client['EMAIL']; ?></td>
                    <td><?php echo "0".$client['TELEPHONE']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination" style="justify-content: center;">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item <?= $Previous <= 0 ? 'disabled' : '' ?>">
                    <a class="page-link" href="client.php?page=<?= $Previous <= 0 ? 1 : $Previous; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
                <?php for($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="client.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
                <li class="page-item <?= $Next > $pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="client.php?page=<?= $Next > $pages ? $pages : $Next; ?>" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>