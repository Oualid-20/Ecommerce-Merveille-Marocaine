<?php
    session_start();
    $pageTitle = "nav Login";
    include "../Functions/dbConnexion.php";
    include "../includes/head.php";

    include "../dashboard/crud/affiche.php"; ?>


<style>
                    .testimonial-animated {
                        max-width: 700px;
                        margin: 40px auto;
                        background: #ffffff;
                        padding: 20px;
                        border-radius: 15px;
                        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                        transition: transform 0.5s ease, box-shadow 0.5s ease;
                    }

                    .testimonial-animated:hover {
                        transform: translateY(-10px);
                        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                    }
                            
                    .testimonial-animated h2 {
                        font-size: 22px;
                        color: #3498db;
                        margin-bottom: 15px;
                        text-align: center;
                        animation: fadeInDown 1s ease both;
                    }

                    .testimonial-animated select,
                    .testimonial-animated textarea {
                        width: 100%;
                        padding: 12px;
                        border: 2px solid #3498db;
                        border-radius: 6px;
                        margin-bottom: 15px;
                        font-size: 14px;
                        transition: border-color 0.3s;
                        animation: zoomIn 0.6s ease both;
                    }

                    .testimonial-animated select:focus,
                    .testimonial-animated textarea:focus {
                        border-color: #2980b9;
                    }

                    .testimonial-animated button {
                        display: block;
                        width: 100%;
                        background: #3498db;
                        color: white;
                        font-weight: bold;
                        border: none;
                        border-radius: 6px;
                        padding: 10px 0;
                        cursor: pointer;
                        font-size: 16px;
                        transition: background-color 0.3s;
                        animation: rubberBand 1s ease both;
                    }

                    .testimonial-animated button:hover {
                        background-color: #2980b9;
                    }

                    .container {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        gap: 20px;
                    }

                   
                </style>
</head>
<body>
    <?php include "../includes/navBar.php" ; ?>


    <div class="container">
                    <?php $produits = afficherProduit();
                    $base_path = '../uploads/produits/';  
                    foreach ($produits as $pdt) {
                        ?>
                        <div class="card" style="width: 18rem;">
                        <img src="<?=$base_path . basename($pdt['IMAGE_PDT']);?>" style ='max-width: 120px; max-height: 120px;' class="card-img-top" alt="photo du produit">
                            <div class="card-body">
                                <h5 class="card-title"><?=$pdt['NOM_PDT']; ?></h5>
                                <p class="card-text"><?=$pdt['DESCRIPTION_PDT'];?></p>
                                <a href='pdt.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>' class="btn btn-primary">Voir le Produit</a>
                            </div>
                        </div>

                        <?php } ?>


   
        <section class="testimonial-animated">
            <h2>Partagez votre expérience</h2>
            <form method="post" action="submit_review.php">
                <label for="rating">Votre note :</label>
                <select name="rating" id="rating" required>
                    <option value="">--Choisissez une note--</option>
                    <option value="1">★ - Pas satisfait</option>
                    <option value="2">★★ - Peu satisfait</option>
                    <option value="3">★★★ - Moyennement satisfait</option>
                    <option value="4">★★★★ - Satisfait</option>
                    <option value="5">★★★★★ - Très satisfait</option>
                </select>

                <label for="testimonial">Votre témoignage :</label>
                <textarea name="testimonial" id="testimonial" rows="4" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
        </section>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>