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
                                    <a name="supprim_coop" id="supprimer" data-id="<?= $cooperative['ID']?>"   type='button' class='btn btn-danger'>Supprimer</a>
                                </div> 
                            </td>
                        </tr>
                 <?php } ?>
            </tbody>
        </table>


                     


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
                confirmButtonText: "Oui, supprimez-le!",
                cancelButtonText: "Non, annulez!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                window.location.href = `crud/supprimer.php?type=cooperatives&Id=${coopId}`;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Annulé",
                    text: "La coopérative est en sécurité :)",
                    icon: "error",
                });
                }
            });
        });
        });


    </script>
</body>
</html>