<?php 
    session_start();
    include "Functions/dbConnexion.php";

    $pageTitle = "Acceuil";
    include "includes/HeadTemplate.php";

    include "dashboard/crud/affiche.php";?>
<body>
        <!-- header start -->

        <?php include "includes/NavTemplate.php";?>  
    
        <!-- header end -->
        <main>
        <section class="slider-area pos-relative">
                <div class="slider-active">
                    <div class="single-slider slide-1-style slide-height-2 slide-height-4 d-flex align-items-center" data-background="assets/img/slider/slide5.jpg">
                        <div class="shape-title shape-title-4 bounce-animate">
                            <h2>2024
                            </h2>
                        </div>
                        <div class="shape-icon shape-icon-4 bounce-animate">
                            <img src="assets/img/slider/shape-icon-2.png" alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="slide-content slide-content-4 text-center pt-40">
                                        <h1 data-animation="fadeInUp" data-delay=".3s">New Arrival</h1>
                                        <div class="slide-btn">
                                            <a class="btn theme-btn" href="shop-filter.php" data-animation="fadeInLeft" data-delay=".6s">shop now</a>
                                            <a class="btn white-btn" href="shop.html" data-animation="fadeInRight" data-delay=".9s">category</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider slide-1-style slide-height-2 slide-height-4 d-flex align-items-center" data-background="assets/img/slider/slide5-2.jpg">
                        <div class="shape-title shape-title-4 bounce-animate">
                            <h2>2024</h2>
                        </div>
                        <div class="shape-icon shape-icon-4 bounce-animate">
                            <img src="assets/img/slider/shape-icon-2.png" alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="slide-content slide-content-4 text-center pt-40">
                                        <h1 data-animation="fadeInUp" data-delay=".3s">Trendy Collection</h1>
                                        <div class="slide-btn">
                                            <a class="btn theme-btn" href="shop-filter.php" data-animation="fadeInLeft" data-delay=".6s">shop now</a>
                                            <a class="btn white-btn" href="shop-filter.php" data-animation="fadeInRight" data-delay=".9s">category</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider slide-1-style slide-height-2 slide-height-4 d-flex align-items-center" data-background="assets/img/slider/slide5-3.jpg">
                        <div class="shape-title shape-title-4 bounce-animate">
                            <h2>2024</h2>
                        </div>
                        <div class="shape-icon shape-icon-4 bounce-animate">
                            <img src="assets/img/slider/shape-icon-2.png" alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="slide-content slide-content-4 text-center pt-40">
                                        <h1 data-animation="fadeInUp" data-delay=".3s">Discover the moroccan handicrafts</h1>
                                        <div class="slide-btn">
                                            <a class="btn theme-btn" href="shop-filter.php" data-animation="fadeInLeft" data-delay=".6s">shop now</a>
                                            <a class="btn white-btn" href="shop-filter.php" data-animation="fadeInRight" data-delay=".9s">category</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

           <!-- banner area start -->
            <section class="banner-area pt-100 box-90">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="banner-2 pos-relative mb-30">
                                <a href="shop-filter.php"><img src="assets/img/banner/banner-2/banner3.jpg" alt=""></a>
                                <div class="banner-trend">
                                    <span>Trendy Item</span>
                                    <h2><a href="shop-filter.php">New Year Trend Coming 2024</a></h2>
                                    <div class="discover-link">
                                        <a href="shop-filter.php">discover</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="banner-2 pos-relative mb-30">
                                <a href="shop-filter.php"><img src="assets/img/banner/banner-2/banner4.jpg" alt=""></a>
                                <div class="banner-look">
                                    <span>Get the look</span>
                                    <h2>Festive Looks</h2>
                                    <img src="assets/img/icon/look.png" alt="">
                                    <p>Your delivery of outfit ideas, updated daily</p>
                                    <a href="shop-filter.php" class="btn theme-btn">discover</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner area end -->

        <!-- shop-area start -->
        <section class="shop-area pt-100 pb-100">
            <!-- product-area start -->
            <section class="product-area pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="area-title text-center mb-50">
                                <h2>Discover Our Products</h2>
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
                                            <span><?=$produit['PRIX_PDT'];?> $</span>
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
            <!-- features-area start -->
            <section class="features-area box-90">
                <div class="container-fluid">
                    <div class="theme-soft-bg fix pt-100 pb-50">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="area-title text-center mb-50">
                                    <h2>Special Features</h2>
                                    <p>Get special services from our shop.</p>
                                </div>
                            </div>
                        </div>
                        <div class="features">
                            <div class="single-seatures width-20 mb-50 text-center">
                                <i class="flaticon-shopping-cart-1"></i>
                                <span>Free Delivery</span>
                                <h3>Free Delivery</h3>
                            </div>
                            <div class="single-seatures width-20 mb-50 text-center">
                                <i class="flaticon-good"></i>
                                <span>100% Customer</span>
                                <h3>Feedbacks</h3>
                            </div>
                            <div class="single-seatures width-20 mb-50 text-center">
                                <i class="flaticon-return-1"></i>
                                <span>10 Days</span>
                                <h3>For Free Return</h3>
                            </div>
                            <div class="single-seatures width-20 mb-50 text-center">
                                <i class="flaticon-return"></i>
                                <span>Payment</span>
                                <h3>Secure System</h3>
                            </div>
                            <div class="single-seatures width-20 mb-50 text-center">
                                <i class="flaticon-customer-service"></i>
                                <span>24/7</span>
                                <h3>Online Supports</h3>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Témoignage-->
                <div class="product-slider-2 owl-carousel">
                        <?php $avis= afficherAvis();  foreach($avis as $avi) { ?>
                        <div class="pro-item">
                            <div class="product-wrapper">
                                <div class="product-img mb-25">
                                    <a href="#">
                                        <img src="assets/img/logo_dash.png" style="max-width: 120px; max-height: 120px;" alt="Photo de avi">
                                    </a>
                                    <div class="product-action text-center">
                                       
                                       
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="pro-cat mb-10">
                                        <a href="#"><?=$avi['NOM'];?></a>
                                        <a href="#"><?=$avi['PRENOM'];?></a>
                                    </div>
                                    <h4>
                                        <a href="#"><?=$avi['TEXT_TEMOIGN'];?></a>
                                    </h4>
                                    <div class="product-meta">
                                        <div class="pro-price">
                                            <span><?=$avi['NOTE'];?> /5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php }?>
                    </div>
                </div>




            </section>
            <!-- features-area end -->

            
    </section>
        <!-- shop-area end -->
           <!-- latest-blog-area start -->
           <section class="latest-blog-area pt-95 pb-60 box-90">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="area-title text-center mb-50">
                                <h2>News Feeds</h2>
                                <p>Check it out every updates</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="latest-news mb-40">
                                <div class="news__thumb mb-25">
                                    <img src="assets/img/blog/latest/lb11.jpg" alt="">
                                </div>
                                <div class="news__caption white-bg">
                                    <div class="news-meta mb-15">
                                        <span><i class="far fa-calendar-check"></i> Sep 15, 2018 </span>
                                        <span><a href="#"><i class="far fa-user"></i> Diboli</a></span>
                                        <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                    </div>
                                    <h2><a href="blog-details.html">Inspiration Is Under Construction Business &
                                    Fashion 2024. In this situation we do that..</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo..</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="latest-news mb-40">
                                <div class="news__thumb mb-25">
                                    <img src="assets/img/blog/latest/lb12.jpg" alt="">
                                </div>
                                <div class="news__caption white-bg">
                                    <div class="news-meta mb-15">
                                        <span><i class="far fa-calendar-check"></i> Sep 15, 2018 </span>
                                        <span><a href="#"><i class="far fa-user"></i> Joly</a></span>
                                        <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                    </div>
                                    <h2><a href="blog-details.html">Inspiration Is Under Construction Business &
                                    Fashion 2024. In this situation we do that..</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo..</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="latest-news mb-40">
                                <div class="news__thumb mb-25">
                                    <img src="assets/img/blog/latest/lb13.jpg" alt="">
                                </div>
                                <div class="news__caption white-bg">
                                    <div class="news-meta mb-15">
                                        <span><i class="far fa-calendar-check"></i> Sep 15, 2018 </span>
                                        <span><a href="#"><i class="far fa-user"></i> Joly</a></span>
                                        <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                    </div>
                                    <h2><a href="blog-details.html">Inspiration Is Under Construction Business &
                                    Fashion 2024. In this situation we do that..</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- latest-blog-area end -->


        </main>



    
 <!-- footer start -->
 <?php include "includes/footer.php" ?>