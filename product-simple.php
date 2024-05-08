<?php
    session_start();
    $pageTitle = "Page Produit";
    include "Functions/dbConnexion.php";
    include "includes/HeadTemplate.php";
    include "dashboard/crud/affiche.php"; 

                if(isset($_GET["id_pdt"]) && isset($_GET["nom_pdt"])  ){
                    $id= $_GET["id_pdt"];
                    $pdt= affichePdt($id);
                    $base_path = 'uploads/produits/'; 
                }
                else{
                    header("Location: shop-filter.php");
                    exit;
                }
    ?>
         <link rel="stylesheet" href="assets/css/btnTestemonial.css">
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- preloader end  -->

        <!-- header start -->
        <?php include "includes/NavTemplate.php";?>
        <!-- header end -->


        <main>

        <!-- breadcrumb-area-start -->
        <section class="breadcrumb-area" data-background="assets/img/bg/page-title.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-text text-center">
                            <h1>Our Shop</h1>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.php">Home</a></li>
                                <li><span>shop details</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-area start -->
        <section class="shop-details-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-4">
                        <div class="product-details-img mb-10">
                            <div class="tab-content" id="myTabContentpro">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="product-large-img">
                                        <img src="<?=$base_path . basename($pdt['IMAGE_PDT']);?>" alt="Photo du Produit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-xl-6 col-lg-8">
                        <div class="product-details mb-30 pl-30">
                            <div class="details-cat mb-20">
                                <a href="#"><?=$pdt['NOM'];?></a>
                            </div>
                            <h2 class="pro-details-title mb-15"><?=$pdt['NOM_PDT'];?></h2>
                            <div class="details-price mb-20">
                                <span><?=$pdt['PRIX_PDT'];?> MAD</span>
                            </div>
                            <div class="product-variant">


                                <div class="product-desc variant-item">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                </div>

                                <div class="product-info-list variant-item">
                                    <ul>
                                        <li><span>Cooperative:</span> <?=$pdt['COOPERATIVE'];?></li>
                                        
                                    </ul>
                                </div>

                                <div class="product-action-details variant-item">
                                    <div class="product-details-action">
                                        <form action="#">
                                            <div class="plus-minus">
                                                <div class="cart-plus-minus"><input type="text" value="1" /></div>
                                            </div>
                                            <div class="details-cart mt-40">
                                                <button class="btn theme-btn">purchase now</button>
                                            </div>
                                            <div class="btn">
                                                <button id="add-product"><svg width="22" height="20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M20.925 3.641H3.863L3.61.816A.896.896 0 0 0 2.717 0H.897a.896.896 0 1 0 0 1.792h1l1.031 11.483c.073.828.52 1.726 1.291 2.336C2.83 17.385 4.099 20 6.359 20c1.875 0 3.197-1.87 2.554-3.642h4.905c-.642 1.77.677 3.642 2.555 3.642a2.72 2.72 0 0 0 2.717-2.717 2.72 2.72 0 0 0-2.717-2.717H6.365c-.681 0-1.274-.41-1.53-1.009l14.321-.842a.896.896 0 0 0 .817-.677l1.821-7.283a.897.897 0 0 0-.87-1.114ZM6.358 18.208a.926.926 0 0 1 0-1.85.926.926 0 0 1 0 1.85Zm10.015 0a.926.926 0 0 1 0-1.85.926.926 0 0 1 0 1.85Zm2.021-7.243-13.8.81-.57-6.341h15.753l-1.383 5.53Z"
                                                            fill="#fff" fill-rule="nonzero" />
                                                    </svg><span>Add to cart</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-50">
                    <div class="col-xl-8 col-lg-8">
                        <div class="product-review">
                            <ul class="nav review-tab" id="myTabproduct" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab6" data-toggle="tab" href="#home6" role="tab" aria-controls="home"
                                        aria-selected="true">Review </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
                                    <div class="desc-text">
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

                                                <button type="submit" class="disabled">Envoyer</button>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="pro-details-banner">
                            <a href="shop-filter.php"><img src="assets/img/banner/pro-details.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area end -->

            <!-- product-area start -->
            <section class="product-area pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="area-title text-center mb-50">
                                <h2>Releted Products</h2>
                                <p>Browse the huge variety of our products</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-slider-2 owl-carousel">
                        <?php $produits= afficherProduit(); $base_path='uploads/produits/'; foreach($produits as $produit) { ?>
                        <div class="pro-item">
                            <div class="product-wrapper">
                                <div class="product-img mb-25">
                                    <a href="product-simple.php?id_pdt=<?=$produit['ID_PDT'];?>&nom_pdt=<?=$produit['NOM_PDT'];?>">
                                        <img src="<?=$base_path.basename($produit['IMAGE_PDT']);?>" alt="Photo de Produit">
                                        <img class="secondary-img" src="<?=$base_path.basename($produit['IMAGE_PDT']);?>" alt="Photo de Produit">
                                    </a>
                                    <div class="product-action text-center">
                                        <a href="#" title="Shoppingb Cart">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                        <a href="#" title="Quick View">
                                            <i class="flaticon-eye"></i>
                                        </a>
                                        <a href="#" data-toggle="tooltip" data-placement="right" title="Compare">
                                            <i class="flaticon-compare"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="pro-cat mb-10">
                                        <a href="shop-filter.php">decor, </a>
                                        <a href="shop-filter.php"><?=$produit['COOPERATIVE'];?></a>
                                    </div>
                                    <h4>
                                        <a href="product-simple.php?id_pdt=<?=$produit['ID_PDT'];?>&nom_pdt=<?=$produit['NOM_PDT'];?>"><?=$produit['NOM_PDT'];?></a>
                                    </h4>
                                    <div class="product-meta">
                                        <div class="pro-price">
                                            <span><?=$produit['PRIX_PDT'];?> MAD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php }?>
                    </div>
                </div>
            </section>
            <!-- product-area end -->


        </main>

        <!-- footer start -->
 <?php include "includes/footer.php" ?>