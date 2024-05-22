<?php 
        session_start();
        $pageTitle = "Catégories";
        include "../Functions/dbConnexion.php";
        include "../includes/head.php";



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






        include "crud/affiche.php";   


        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Récupérer les catégories en utilisant la fonction afficherCategoriePag
        $categories = afficherCategorie($page);
        
        // Exécuter la requête pour compter le nombre total de catégories
        $result1 = $conn->query("SELECT COUNT(id_categorie) AS id FROM CATEGORIES");
        if ($result1) {
            $catCount = $result1->fetch_assoc(); // Utiliser fetch_assoc pour un seul résultat
            $total = $catCount['id'];
        } else {
            // Gérer les erreurs de requête SQL
            die("Erreur de requête SQL : " . $conn->error);
        }
        
        $pages = ceil($total / 9); // Toujours diviser par 9 pour obtenir le nombre total de pages
        $Previous = $page - 1;
        $Next = $page + 1;

        //dashboard
        include "../includes/navDashboard.php"; 
        include "../includes/sidebar.php"; ?>

     <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div> <?php if (isset($_SESSION["message_CRUD"]) ){ echo $_SESSION["message_CRUD"]; unset($_SESSION["message_CRUD"]); } ?>  </div>
            <div class="container mt-3 d-flex justify-content-between">
                <h2>Catégories</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Ajouter une Catégorie
                </button>
            </div>
        
        <table class="table table-striped mt-4">
            <thead class='table-success'>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Icône</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <!--affichage du tableau-->
               <?php
                    
                    $base_path = '../uploads/icones/'; 
                    foreach ($categories as $categorie) {
                        ?>
                        <tr> 
                            <td><?=$categorie['ID_CATEGORIE']; ?></td>
                            <td><?=$categorie['NOM']; ?></td>
                            <td><?=$categorie['DESCRIPTION_CAT'];?></td>
                            <td> <img src="<?=$base_path . basename($categorie['ICONE']);?>" alt="Catégorie Icône" style="max-width: 60px; max-height: 60px;" /></td>
                            <td> 
                                <div class='btn-group btn-group'>
                                    <a name="modifier_cat"  type='button' class='btn btn-warning mr-2' data-bs-toggle="modal" data-bs-target="#Modal_modifier<?=$categorie['ID_CATEGORIE']; ?>">Modifier</a>
                                    <a name="supprim_cat" id="supprimer" data-id='<?=$categorie['ID_CATEGORIE']?>' type='button' class='btn btn-danger'>Supprimer</a>
                                </div> 
                            </td>
                        </tr>
                 <?php 
                }                 
                 ?>
            </tbody>
        </table>
       <!--  pagination -->
            <div class="pagination" style="justify-content: center;">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item <?= $Previous <= 0 ? 'disabled' : '' ?>">
                            <a class="page-link" href="categories.php?page=<?= $Previous <= 0 ? 1 : $Previous; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Previous</span>
                            </a>
                        </li>
                        <?php for($i = 1; $i <= $pages; $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="categories.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item <?= $Next > $pages ? 'disabled' : '' ?>">
                            <a class="page-link" href="categories.php?page=<?= $Next > $pages ? $pages : $Next; ?>" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>                   
                           <!-- The Modal pour inserer  -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter une Catégorie</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body" >
                                    <form action="crud/ajouter.php" method="post" enctype="multipart/form-data">
                                      <input type="hidden" name="type" value="categorie"> 
                                        <div class="mb-3">
                                            <label for="categoryName" class="form-label">Nom de la Catégorie</label>
                                            <input type="text" name="nom_cat" class="form-control" id="categoryName" placeholder="Nom de la Catégorie" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoryDescription" class="form-label">Description</label>
                                            <textarea name="descrip_cat" class="form-control" id="categoryDescription" rows="5" placeholder="Description" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoryImage" class="form-label">Icône Catégorie</label>
                                            <input type="file" name='icone' class="form-control" id="categoryImage" accept="image/*" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" name='ajouter_catégorie' class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </form>
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <!-- The Modal pour modifier  -->
                        <?php
                            foreach ($categories as $categorie) { ?>

                                    <div class='modal fade' id='Modal_modifier<?=$categorie['ID_CATEGORIE'];?>'>
                                        <div class ='modal-dialog modal-dialog-centered modal-lg'>
                                            <div class='modal-content'>
                                            
                                            <div class='modal-header'>
                                                <h4 class='modal-title'>Modifier une Catégorie</h4>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                            </div>
            
                                            <div class='modal-body' >
                                                <form action='crud/modifier.php' method='post' enctype='multipart/form-data'>
                                                <input type="hidden" name="type" value="categorie"> 

                                                    <div class='mb-3'>
                                                    <input type="hidden" name="id_cat" value="<?=$categorie['ID_CATEGORIE'];?>"> 

                                                        <label for='categoryName' class='form-label'>Nom de la Catégorie</label>
                                                        <input type='text' name='nom_cat' class='form-control' id='categoryName' placeholder='Nom de la Catégorie' value='<?=$categorie['NOM'];?>'required>
                                                    </div>
                                                    <div class='mb-3'>
                                                        <label for='categoryDescription' class='form-label'>Description</label>
                                                        <textarea name='descrip_cat' class='form-control' id='categoryDescription' rows='5' placeholder='Description' required><?=$categorie['DESCRIPTION_CAT'];?></textarea>
                                                    </div>
                                                    <div class='mb-3'>
                                                        <label for='categoryImage' class='form-label'>Icône Catégorie</label>
                                                        <input type='file' name='icone' class='form-control' id='categoryImage' accept="image/*" value="<?=$categorie['ICONE']; ?>">
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fermer</button>
                                                    <button type='submit' name='modifier_catégorie' class='btn btn-primary'>Changer</button>
                                                </div>
                                                </form>
                                            </div>                                            
                                            </div>
                                        </div>
                                    </div>

                           <?php }?>

            </div>                        
    </div>
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.all.min.js" integrity="sha512-ziDG00v9lDjgmzxhvyX5iztPHpSryN/Ct/TAMPmMmS2O3T1hFPRdrzVCSvwnbPbFNie7Yg5mF7NUSSp5smu7RA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
       const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
            
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
                });
                document.querySelectorAll(".btn-danger").forEach((button) => {
                button.addEventListener("click", function(event) {
                event.preventDefault(); 
            
                const coopId = this.getAttribute("data-id"); 
            
                swalWithBootstrapButtons
            .fire({
                title: "Êtes-vous sûr?",
                text: "Vous ne pourrez pas annuler cela!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Oui, supprimez!",
                cancelButtonText: "Non,annulez!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                window.location.href = `crud/supprimer.php?type=categories&Id=${coopId}`;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Annulé",
                    text: "La categorie est en sécurité :)",
                    icon: "error",
                });
                }
            });
        });
        });

    </script>
</body>
</html>