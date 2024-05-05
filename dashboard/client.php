<?php 
    session_start();
    $pageTitle = "Client";
    include "../Functions/dbConnexion.php";
    include "../includes/head.php" ;
   // include_once"../Functions/verificationRole.php";
    include "crud/affiche.php"; 

     include "../includes/navDashboard.php" ;
     include "../includes/sidebar.php";

            // Récupérer le numéro de page depuis l'URL
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Définir le nombre d'éléments par page
        $perPage = 10;
        // Récupérer les clients pour la page actuelle
        $clients = afficherClient($page, $perPage);

        $totalClients = $conn->query("SELECT COUNT(*) AS count FROM UTILISATEURS WHERE ROLE = 'client'")->fetch_assoc()['count'];
        $totalPages = ceil($totalClients / $perPage);
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

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">Précédent</a>
        <?php endif; ?>
        
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>"<?php if ($i == $page) echo ' class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>
        
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Suivant</a>
        <?php endif; ?>
    </div>
</div>
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>