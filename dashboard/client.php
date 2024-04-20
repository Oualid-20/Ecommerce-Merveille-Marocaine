<?php 
    session_start();
    $pageTitle = "Client";
    include"../includes/head.php" ;
   // include_once"../Functions/verificationRole.php";
?>

<body>
    <?php include"../includes/navDashboard.php" ?>
<!-- Sidebar -->
    <?php include"../includes/sidebar.php" ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">

            <!-- cards -->
            <table class="table table-striped mt-4">
            <thead class='table-success'>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date d'integration</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                            <td></td>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>john@example.com</td>
                            <td>john@example.com</td>
                      
                    
                        <div class="btn-group btn-group">
                            <button type="button" class="btn btn-warning mr-2">Modifier</button>
                            <button type="button" class="btn btn-danger">Supprimer</button>
                        </div> 
                    </td>
                </tr>
            </tbody>
        </table>

        </div>  
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
</body>
</html>