<?php 
    session_start();
    $pageTitle = "Cooperatives";
    include "../Functions/dbConnexion.php";
    include "../includes/head.php" ;
   // include_once"../Functions/verificationRole.php";
    include "crud/affiche.php"; 

     include "../includes/navDashboard.php" ;
     include "../includes/sidebar.php";
     ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div> <?php if (isset($_SESSION["message_CRUD"]) ){ echo $_SESSION["message_CRUD"]; unset($_SESSION["message_CRUD"]); } ?> </div>
            <div class="container mt-3 d-flex justify-content-between">
                <h2>Coopératives</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Ajouter une Cooperative
                </button>
            </div>
        
        </div>
        <table class="table table-striped mt-4">
            <thead class='table-success'>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Nom Cooperative</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               <?php
                       $cooperatives = afficherCoop(); 
                    foreach ($cooperatives as $cooperative) {
                        ?>
                        <tr> 
                            <td><?php echo $cooperative['ID']; ?></td>
                            <td><?php echo $cooperative['NOM']; ?></td>
                            <td><?php echo $cooperative['PRENOM']; ?></td>
                            <td><?php echo '0'.$cooperative['TELEPHONE']; ?></td>
                            <td><?php echo $cooperative['NOM_COOPERATIVE']; ?></td>
                            <td> 
                                <div class='btn-group btn-group'>
                                    <a name="modifier_coop"  type='button' class='btn btn-warning mr-2' data-bs-toggle="modal" data-bs-target="#Modal_modifier<?=$cooperative['ID']; ?>" >Modifier</a>
                                    <a name="supprim_coop"  href='crud/supprimer.php?type=cooperatives&Id=<?=$cooperative['ID']?>' type='button' class='btn btn-danger'>Supprimer</a>
                                </div> 
                            </td>
                        </tr>
                 <?php } ?>
            </tbody>
        </table>


                        <!--Modal d'insertion -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">                       
                                <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ajouter une Cooperative</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal Body -->
                                
                                                <div class="modal-body">
                                                    <form action="crud/ajouter.php" method="post" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Nom</label>
                                                            <input type="text" name="NOM" class="form-control" placeholder="Nom" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="lastName" class="form-label">Prénom</label>
                                                            <input type="text" name="PRENOM" class="form-control" placeholder="Prénom" required>
                                                            <input type="hidden" name="type" value="cooperative">
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" name="EMAIL" class="form-control" placeholder="Email" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Mot de passe</label>
                                                            <input type="password" name="MOT_DE_PASSE" class="form-control" placeholder="Mot de passe" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Téléphone</label>
                                                            <input type="tel" name="TELEPHONE" class="form-control" placeholder="Téléphone" required>
                                                        </div>

                                                        <!-- Nom de la coopérative -->
                                                        <div class="mb-3">
                                                            <label for="coopName" class="form-label">Nom de la Coopérative</label>
                                                            <input type="text" name="NOM_COOPERATIVE" class="form-control" placeholder="Nom de la Coopérative" required>
                                                        </div>

                                                        <!-- Pied du modal -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" name='ajouter_coop' class="btn btn-primary">Ajouter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                 </div>
                            </div>
                        </div>
                        <!-- Modal modifier-->
                        <?php
                            foreach ($cooperatives as $cooperative) { ?>

                                    <div class="modal fade" id='Modal_modifier<?=$cooperative['ID'];?>'>
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">                       
                                            <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier une Cooperative</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <!-- Modal Body -->
                                            
                                                            <div class="modal-body">
                                                                <form action="crud/modifier.php" method="post" enctype="multipart/form-data">
                                                                    <div class="mb-3">
                                                                        <label for="firstName" class="form-label">Nom</label>
                                                                        <input type="text" name="NOM" class="form-control" placeholder="Nom" value="<?=$cooperative['NOM']; ?>" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="lastName" class="form-label">Prénom</label>
                                                                        <input type="hidden" name="id_coop" value="<?=$cooperative['ID'];?>">
                                                                        <input type="text" name="PRENOM" class="form-control" placeholder="Prénom" value="<?=$cooperative['PRENOM'];?> " required>
                                                                        <input type="hidden" name="type" value="cooperative">
                                                                    </div>

                                                                    <!-- Email -->
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label">Email</label>
                                                                        <input type="email" name="EMAIL" class="form-control" placeholder="Email" value="<?=$cooperative['EMAIL'];?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="password" class="form-label">Mot de passe</label>
                                                                        <input type="password" name="MOT_DE_PASSE" class="form-control" placeholder="Mot de passe" value="<?=$cooperative['MOT_DE_PASSE'];?>" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="phone" class="form-label">Téléphone</label>
                                                                        <input type="tel" name="TELEPHONE" class="form-control" placeholder="Téléphone" value="0<?=$cooperative['TELEPHONE'];?>" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="coopName" class="form-label">Nom de la Coopérative</label>
                                                                        <input type="text" name="NOM_COOPERATIVE" class="form-control" placeholder="Nom de la Coopérative" value="<?=$cooperative['NOM_COOPERATIVE'];?>" required>
                                                                    </div>
                                                                    <!-- Pied du modal -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                        <button type="submit" name="modifier_cooperative" class="btn btn-primary">Changer</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php }?>


    </div>
    <script type="text/javascript" src="/merveille_marocaine//assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>