<?php 
        session_start();
        $pageTitle = "Catégories";
        include "../includes/head.php";
    ?>
<body>
    <?php include "../includes/navDashboard.php" ?>
    <?php include "../includes/sidebar.php" ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="container mt-3 d-flex justify-content-between">
                <h2>Catégories</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Ajouter une Catégorie
                </button>
        <!-- The Modal -->

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
                                <form action="#" method="#" enctype="">
                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label">Nom de la Catégorie</label>
                                        <input type="text" class="form-control" id="categoryName" placeholder="Nom de la Catégorie">
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="categoryDescription" rows="5" placeholder="Description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryImage" class="form-label">Image</label>
                                        <input type="file" name='icone' class="form-control" id="categoryImage" accept="image/*">

                                    </div>
                                </form>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        
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
                <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td> 
                        <div class="btn-group btn-group">
                            <button type="button" class="btn btn-warning mr-2">Modifier</button>
                            <button type="button" class="btn btn-danger">Supprimer</button>
                        </div> 
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>