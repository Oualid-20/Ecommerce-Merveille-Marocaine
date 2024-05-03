<?php 
        session_start();
        $pageTitle = "Produites";
        include "../Functions/dbConnexion.php";
        include "../includes/head.php";

        include "crud/affiche.php"; 
        //dashboard
        include "../includes/navDashboard.php"; 
        include "../includes/sidebar.php" ;
    ?>
    <div id="main-content" class="container allContent-section py-4">
            <div> <?php if (isset($_SESSION["message_CRUD"]) ){ echo $_SESSION["message_CRUD"]; unset($_SESSION["message_CRUD"]); } ?>  </div>
            <div class="container mt-3 d-flex justify-content-between">
                <h2>Produits</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Ajouter un Produit
                </button>
        </div>
        <table class="table table-striped mt-4">
            <thead class='table-success'>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Cooperative</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               <?php
                    $produits = afficherProduit();
                    $base_path = '../uploads/produits/';  
                    foreach ($produits as $pdt) {
                        ?>
                        <tr> 
                            <td><?=$pdt['ID_PDT']; ?></td>
                            <td><?=$pdt['NOM_PDT']; ?></td>
                            <td><?=$pdt['DESCRIPTION_PDT'];?></td>
                            <td><?=$pdt['ID_CATEGORIE']; ?></td>
                            <td><?=$pdt['PRIX_PDT'];?> MAD</td>
                            <td><?=$pdt['COOPERATIVE']; ?></td>
                            <td> <img src="<?=$base_path . basename($pdt['IMAGE_PDT']);?>" alt="Produit Image" style="max-width: 60px; max-height: 60px;" /></td>
                            <td> 
                                <div class='btn-group btn-group'>
                                    <a name="modifier_pdt"  type='button' class='btn btn-warning mr-2' data-bs-toggle="modal" data-bs-target="#Modal_modifier<?=$pdt['ID_PDT']; ?>">Modifier</a>
                                    <a name="supprim_pdt"  href='crud/supprimer.php?type=produits&Id=<?=$pdt['ID_PDT']?>' type='button' class='btn btn-danger'>Supprimer</a>
                                </div> 
                            </td>
                        </tr>
                 <?php 
                }                 
                 ?>
            </tbody>
        </table>                    
                           <!-- The Modal insere -->
                           
                        <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ajouter un Produit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <form action="crud/ajouter.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="type" value="produit">
                                                <div class="mb-3">
                                                    <label for="productName" class="form-label">Nom Produit</label>
                                                    <input type="text" name="NOM_PDT" class="form-control" id="productName" placeholder="Nom Produit" required>
                                                </div>

                                                <!-- Catégorie -->
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Nom Catégorie</label>
                                                    <select name="nom_cat" class="form-control" required>
                                                        <option value="">Sélectionnez une catégorie</option>
                                                        <?php
                                                            $categories = afficherCategorie();
                                                            foreach ($categories as $cat) {
                                                                echo "<option value='".$cat['ID_CATEGORIE']."'>".$cat['NOM']."</option>";
                                                            } ?>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="productDescription" class="form-label">Description Produit</label>
                                                    <textarea name="DESCRIPTION_PDT" class="form-control" id="productDescription" rows="5" placeholder="Description Produit" required></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="productPrice" class="form-label">Prix Produit</label>
                                                    <input type="number" name="PRIX_PDT" class="form-control" id="productPrice" placeholder="Prix Produit" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="productImage" class="form-label">Image Produit</label>
                                                    <input type="file" name="IMAGE_PDT" class="form-control" id="productImage" accept="image/*" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="cooperative" class="form-label">Coopérative</label>
                                                    <select name="nom_coop" class="form-control" required>
                                                        <option value="">Sélectionnez une coopérative</option>
                                                        <?php
                                                            $cooperatives = afficherCoop();
                                                            foreach ($cooperatives as $coop) {
                                                                echo "<option value='".$coop['NOM_COOPERATIVE']."'>".$coop['NOM_COOPERATIVE']."</option>";
                                                            }  ?>
                                                    </select>
                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" name='ajouter_pdt' class="btn btn-primary">Ajouter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal modifier -->
                            <?php
                                foreach ($produits as $pdt) { ?>

                            <div class="modal fade" id="Modal_modifier<?=$pdt['ID_PDT'];?>">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modifier un Produit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <form action="crud/modifier.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="type" value="produit">
                                                <div class="mb-3">
                                                    <label for="productName" class="form-label">Nom Produit</label>
                                                    <input type="text" name="NOM_PDT" class="form-control" id="productName" placeholder="Nom Produit" value="<?=$pdt['NOM_PDT']; ?>" required>
                                                </div>

                                                <!-- Catégorie -->
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Nom Catégorie</label>
                                                    <input type="hidden" name="id_pdt" value="<?=$pdt['ID_PDT'];?>">
                                                    <select name="nom_cat" class="form-control" required>
                                                        <?php
                                                            $categories = afficherCategorie();
                                                            foreach ($categories as $cat) {
                                                                echo "<option value='".$cat['ID_CATEGORIE']."'>".$cat['NOM']."</option>";
                                                            } ?>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="productDescription" class="form-label">Description Produit</label>
                                                    <textarea name="DESCRIPTION_PDT" class="form-control" id="productDescription" rows="5" placeholder="Description Produit" required><?=$pdt['DESCRIPTION_PDT']; ?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="productPrice" class="form-label">Prix Produit</label>
                                                    <input type="number" name="PRIX_PDT" class="form-control" id="productPrice" placeholder="Prix Produit" value="<?=$pdt['PRIX_PDT'];?>" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="productImage" class="form-label">Image Produit</label>
                                                    <input type="file" name="IMAGE_PDT" class="form-control" id="productImage" accept="image/*" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="cooperative" class="form-label">Coopérative</label>
                                                    <select name="nom_coop" class="form-control" required>
                                                        <?php 
                                                            $cooperatives = afficherCoop();
                                                            foreach($cooperatives as $coop) { 
                                                                echo "<option value='".$coop['NOM_COOPERATIVE']."'>".$coop['NOM_COOPERATIVE']."</option>";
                                                            }  ?>
                                                    </select>
                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" name="modifier_produit" class="btn btn-primary">Changer le pdt</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>                                    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
</body>
</html>