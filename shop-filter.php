<?php 
    session_start();
    include "Functions/dbConnexion.php";

    $pageTitle = "Our Shop";
    //include "includes/HeadTemplate.php";
    include "includes/HeadTemplate.php";

    include "dashboard/crud/affiche.php"; $produits = afficherProduit(); $base_path = 'uploads/produits/'; ?>



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
                                <li><a href="index.html">home</a></li>
                                <li><span>shop</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-area start -->
        <section class="shop-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- tab filter -->
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <div class="product-showing mb-40">
                                    <p>Showing 1–22 of 32 results</p>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-6">
                                <div class="shop-tab f-right">
                                    <ul class="nav text-center" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                                aria-selected="true"><i class="fas fa-list-ul"></i> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                                aria-selected="false"><i class="fas fa-th-large"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-filter-btn mb-40 f-right">
                                    <button id="filter-btn">Filter +</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        <!-- tab content -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <?php $produits = afficherProduit();
                                            $base_path = '../uploads/produits/';  
                                            foreach ($produits as $pdt) {
                                    ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-wrapper mb-50">
                                            <div class="product-img mb-25">
                                                <a href="product-simple.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>">
                                                    <img src="assets/img/product/pro14.jpg" alt="">
                                                    <img class="secondary-img" src="assets/img/product/pro14.jpg" alt="">
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
                                                <div class="sale-tag">
                                                    <span class="new">new</span>
                                                    <span class="sale">sale</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-cat mb-10">
                                                    <a href="product-simple.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>">decor, </a>
                                                    <a href="product-simple.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>">furniture</a>
                                                </div>
                                                <h4>
                                                    <a href="product-simple.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>"><?=$pdt['NOM_PDT'];?></a>
                                                </h4>
                                                <div class="product-meta">
                                                    <div class="pro-price">
                                                        <span><?=$pdt['PRIX_PDT'];?> MAD</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                <?php $produits = afficherProduit();
                                            $base_path = 'uploads/produits/';  
                                            foreach ($produits as $pdt) {
                                    ?>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="product-wrapper mb-30">
                                            <div class="product-img">
                                                <a href="product-simple.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>">
                                                    <img src="<?=$base_path.basename($pdt['IMAGE_PDT']);?>" alt="Photo de pdt">
                                                    <img class="secondary-img" src="<?=$base_path.basename($pdt['IMAGE_PDT']);?>" alt="Photo de pdt">
                                                </a>
                                                <div class="sale-tag">
                                                    <span class="new">new</span>
                                                    <span class="sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8">
                                        <div class="product-content pro-list-content pr-0 mb-50">
                                            <div class="pro-cat mb-10">
                                                <a href="product-simple.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>">decor, </a>
                                                <a href="product-simple.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>">furniture</a>
                                            </div>
                                            <h4>
                                                <a href="product-simple.php?id_pdt=<?=$pdt['ID_PDT'];?>&nom_pdt=<?=$pdt['NOM_PDT'];?>"><?=$pdt['NOM_PDT'];?></a>
                                            </h4>
                                            <div class="product-meta mb-10">
                                                <div class="pro-price">
                                                    <span><?=$pdt['PRIX_PDT'];?> MAD</span>
                                                </div>
                                            </div>
                                            <p><?=$pdt['DESCRIPTION_PDT'];?>.</p>
                                            <div class="product-action">
                                                <a href="#" title="Shoppingb Cart">
                                                    <i class="flaticon-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Quick View">
                                                    <i class="flaticon-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="basic-pagination basic-pagination-2 text-center mt-20 mb-0" >
                            <ul>
                                <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                <li><a href="#">01</a></li>
                                <li class="active"><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area end -->

        </main>
        <!-- footer start -->
        <footer class="footer-area pl-100 pr-100">
            <div class="footer-area box-90 pt-100 pb-60" data-background="img/bg/footer.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-6 ">
                            <div class="footer-widget mb-40 pr-70">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="img/logo/footer-logo.png" alt=""></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore mag na
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat.
                                </p>
                                <div class="footer-time d-flex mt-30">
                                    <div class="time-icon">
                                        <img src="img/icon/time.png" alt="">
                                    </div>
                                    <div class="time-text">
                                        <span>Got Questions ? Call us 24/7!</span>
                                        <h2>(0600) 874 548</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3">
                            <div class="footer-widget mb-40">
                                <h3>Social Media</h3>
                                <ul class="footer-link">
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Behance</a></li>
                                    <li><a href="#"> Dribbble</a></li>
                                    <li><a href="#">Linkedin</a></li>
                                    <li><a href="#">Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-md-3 d-md-none d-xl-block">
                            <div class="footer-widget pl-50 mb-40">
                                <h3>Location</h3>
                                <ul class="footer-link">
                                    <li><a href="#">New York</a></li>
                                    <li><a href="#">Tokyo</a></li>
                                    <li><a href="#">Dhaka</a></li>
                                    <li><a href="#">Chittagong</a></li>
                                    <li><a href="#">China</a></li>
                                    <li><a href="#">Japan</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3">
                            <div class="footer-widget mb-40">
                                <h3>About</h3>
                                <ul class="footer-link">
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#"> Privacy Policy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Wholesale</a></li>
                                    <li><a href="#">Direction</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area box-105">
                <div class="container-fluid">
                    <div class="pt-30 pb-30">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="copyright text-center">
                                    <p>Copyright © 2023-2024 <a href="#">Merveille Marocaine</a>. All Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
        <!-- Fullscreen search -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fas fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get">
                        <div class="search-field-holder">
                            <input type="search" class="main-search-input" placeholder="Search Entire Store...">
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end fullscreen search -->

		<!-- JS here -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <script src="assets/js/ajax-form.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.scrollUp.min.js"></script>
        <script src="assets/js/jquery.final-countdown.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
