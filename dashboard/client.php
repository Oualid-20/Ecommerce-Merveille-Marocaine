<?php 
    session_start();
    $pageTitle = "Client";
    include "../Functions/dbConnexion.php";
    include "../includes/head.php" ;
   // include_once"../Functions/verificationRole.php";
    include "crud/affiche.php"; 

     include "../includes/navDashboard.php" ;
     include "../includes/sidebar.php";
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
               <?php
                       $clients = afficherClient(); 
                    foreach ($clients as $client) {
                        ?>
                        <tr> 
                            <td><?php echo $client['ID']; ?></td>
                            <td><?php echo $client['NOM']; ?></td>
                            <td><?php echo $client['PRENOM']; ?></td>
                            <td><?php echo $client['EMAIL']; ?></td>
                            <td><?php echo "0".$client['TELEPHONE']; ?></td>
                        </tr>
                 <?php } ?>
            </tbody>
        </table>

    </div>
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>