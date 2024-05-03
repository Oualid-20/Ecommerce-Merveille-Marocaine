<?php 
    session_start();
    $pageTitle = "Admin";
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
                <h2>Admin</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal_admin">
                    Ajouter un Admin
                </button>

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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               <?php
                    $admins = afficherAdmin(); 
                    foreach ($admins as $admin) {
                        ?>
                        <tr> 
                            <td><?php echo $admin['ID']; ?></td>
                            <td><?php echo $admin['NOM']; ?></td>
                            <td><?php echo $admin['PRENOM']; ?></td>
                            <td><?php echo $admin['EMAIL']; ?></td>
                            <td><?php echo "0".$admin['TELEPHONE']; ?></td>
                            <td> 
                                <div class='btn-group btn-group'>
                                    <a name="modifier_adm"  type='button' class='btn btn-warning mr-2' data-bs-toggle="modal" data-bs-target="#Modal_modifier<?=$admin['ID']; ?>">Modifier</a>
                                    <a name="supprim_adm"  href='crud/supprimer.php?type=admins&Id=<?=$admin['ID']?>' type='button' class='btn btn-danger'>Supprimer</a>
                                </div> 
                            </td>
                        </tr>
                 <?php } ?>
            </tbody>
        </table>
                         <!--Modal d'insertion -->

                                    <div class="modal fade" id="myModal_admin">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ajouter un Administrateur</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form action="crud/ajouter.php" method="post">


                                                        <div class="mb-3">
                                                            <label for="adminNom" class="form-label">Nom</label>
                                                            <input type="text" name="NOM" class="form-control" id="adminNom" placeholder="Nom" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="adminPrenom" class="form-label">Prénom</label>
                                                            <input type="text" name="PRENOM" class="form-control" id="adminPrenom" placeholder="Prénom" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="adminEmail" class="form-label">Email</label>
                                                            <input type="email" name="EMAIL" class="form-control" id="adminEmail" placeholder="Email" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="adminMotDePasse" class="form-label">Mot de passe</label>
                                                            <input type="password" name="MOT_DE_PASSE" class="form-control" id="adminMotDePasse" placeholder="Mot de passe" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="adminTelephone" class="form-label">Téléphone</label>
                                                            <input type="hidden" name="type" value="admin">

                                                            <input type="tel" name="TELEPHONE" class="form-control" id="adminTelephone" placeholder="Téléphone" required>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fermer</button>
                                                            <button type='submit' name='ajouter_admin' class='btn btn-primary'>Ajouter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                         <!--Modal de Modifier-->

                            <?php
                                foreach ($admins as $admin) { ?>

                                    <div class="modal fade" id='Modal_modifier<?=$admin['ID'];?>'>
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">                       
                                            <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modifier une admin</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <!-- Modal Body -->
                                            
                                                            <div class="modal-body">
                                                                <form action="crud/modifier.php" method="post">
                                                                    <div class="mb-3">
                                                                        <label for="firstName" class="form-label">Nom</label>
                                                                        <input type="text" name="NOM" class="form-control" placeholder="Nom" value="<?=$admin['NOM']; ?>" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="lastName" class="form-label">Prénom</label>
                                                                        <input type="text" name="PRENOM" class="form-control" placeholder="Prénom" value="<?=$admin['PRENOM'];?> " required>
                                                                        <input type="hidden" name="id_adm" value="<?=$admin['ID'];?>">
                                                                        <input type="hidden" name="type" value="admin">
                                                                    </div>

                                                                    <!-- Email -->
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label">Email</label>
                                                                        <input type="email" name="EMAIL" class="form-control" placeholder="Email" value="<?=$admin['EMAIL'];?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="password" class="form-label">Mot de passe</label>
                                                                        <input type="password" name="MOT_DE_PASSE" class="form-control" placeholder="Mot de passe" value="<?=$admin['MOT_DE_PASSE'];?>" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="phone" class="form-label">Téléphone</label>
                                                                        <input type="tel" name="TELEPHONE" class="form-control" placeholder="Téléphone" value="0<?=$admin['TELEPHONE'];?>" required>
                                                                    </div>
                                                                    <!-- Pied du modal -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                        <button type="submit" name="modifier_admin" class="btn btn-primary">Changer</button>
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