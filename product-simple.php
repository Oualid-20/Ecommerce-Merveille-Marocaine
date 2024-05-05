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
        <section class="breadcrumb-area" data-background="img/bg/page-title.png">
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
                                <a href="#">decor,</a>
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
                                        <li><span>Brands:</span> Hewlett-Packard</li>
                                        
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
                                        aria-selected="true">Description </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
                                    <div class="desc-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis
                                        unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                        illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
                                        ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="pro-details-banner">
                            <a href="shop.html"><img src="assets/img/banner/pro-details.jpg" alt=""></a>
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
                                        <img class="secondary-img" src="assets/img/product/pro5.jpg" alt="Photo de Produit">
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