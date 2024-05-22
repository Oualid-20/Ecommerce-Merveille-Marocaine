<?php 
    session_start();
    include "Functions/dbConnexion.php";

    $pageTitle = "Blog";
    include "includes/HeadTemplate.php";

    include "dashboard/crud/affiche.php";?>
    </head>
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
                            <h1>Blog 3 Column Masonry</h1>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">home</a></li>
                                <li><span>blog</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- blog-area start -->
        <section class="blog-area pt-120 pb-80">
            <div class="container">
                <div class="row blog-masonry">
                    <div class="col-lg-4 col-md-6 grid-item">
                        <article class="postbox post format-image mb-40">
                            <div class="postbox__thumb">
                                <a href="#">
                                    <img src="assets/img/blog/b1.jpg" alt="blog image">
                                </a>
                            </div>
                            <div class="postbox__text p-30">
                                <div class="post-meta mb-15">
                                    <span><a href="#"><i class="far fa-user"></i> Diboli </a></span>
                                    <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                </div>
                                <h3 class="blog-title blog-title-sm">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipisic
                                        .</a>
                                </h3>
                                <div class="post-text">
                                    <p>Lorem ipsum dolor sit amet, consecte tur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et.</p>
                                </div>
                                <div class="read-more">
                                    <a href="#" class="read-more">read more <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item">
                        <article class="postbox post format-image mb-40">
                            <div class="postbox__thumb">
                                <a href="#">
                                    <img src="assets/img/blog/ms1.jpg" alt="blog image">
                                </a>
                            </div>
                            <div class="postbox__text p-30">
                                <div class="post-meta mb-15">
                                    <span><a href="#"><i class="far fa-user"></i> Diboli </a></span>
                                    <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                </div>
                                <h3 class="blog-title blog-title-sm">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipisic
                                        .</a>
                                </h3>
                                <div class="post-text">
                                    <p>Lorem ipsum dolor sit amet, consecte tur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et.</p>
                                </div>
                                <div class="read-more">
                                    <a href="#" class="read-more">read more <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item">
                        <article class="postbox post format-image mb-40">
                            <div class="postbox__thumb">
                                <a href="#">
                                    <img src="assets/img/blog/b3.jpg" alt="blog image">
                                </a>
                            </div>
                            <div class="postbox__text p-30">
                                <div class="post-meta mb-15">
                                    <span><a href="#"><i class="far fa-user"></i> Diboli </a></span>
                                    <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                </div>
                                <h3 class="blog-title blog-title-sm">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipisic
                                        .</a>
                                </h3>
                                <div class="post-text">
                                    <p>Lorem ipsum dolor sit amet, consecte tur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et.</p>
                                </div>
                                <div class="read-more">
                                    <a href="#" class="read-more">read more <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item">
                        <article class="postbox post format-image mb-40">
                            <div class="postbox__thumb">
                                <a href="#">
                                    <img src="assets/img/blog/ms2.jpg" alt="blog image">
                                </a>
                            </div>
                            <div class="postbox__text p-30">
                                <div class="post-meta mb-15">
                                    <span><a href="#"><i class="far fa-user"></i> Diboli </a></span>
                                    <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                </div>
                                <h3 class="blog-title blog-title-sm">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipisic
                                        .</a>
                                </h3>
                                <div class="post-text">
                                    <p>Lorem ipsum dolor sit amet, consecte tur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et.</p>
                                </div>
                                <div class="read-more">
                                    <a href="#" class="read-more">read more <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item">
                        <article class="postbox post format-image mb-40">
                            <div class="postbox__thumb">
                                <a href="#">
                                    <img src="assets/img/blog/ms3.jpg" alt="blog image">
                                </a>
                            </div>
                            <div class="postbox__text p-30">
                                <div class="post-meta mb-15">
                                    <span><a href="#"><i class="far fa-user"></i> Diboli </a></span>
                                    <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                </div>
                                <h3 class="blog-title blog-title-sm">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipisic
                                        .</a>
                                </h3>
                                <div class="post-text">
                                    <p>Lorem ipsum dolor sit amet, consecte tur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et.</p>
                                </div>
                                <div class="read-more">
                                    <a href="#" class="read-more">read more <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item">
                        <article class="postbox post format-image mb-40">
                            <div class="postbox__thumb">
                                <a href="#">
                                    <img src="assets/img/blog/b1.jpg" alt="blog image">
                                </a>
                            </div>
                            <div class="postbox__text p-30">
                                <div class="post-meta mb-15">
                                    <span><a href="#"><i class="far fa-user"></i> Diboli </a></span>
                                    <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                </div>
                                <h3 class="blog-title blog-title-sm">
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipisic
                                        .</a>
                                </h3>
                                <div class="post-text">
                                    <p>Lorem ipsum dolor sit amet, consecte tur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et.</p>
                                </div>
                                <div class="read-more">
                                    <a href="#" class="read-more">read more <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination basic-pagination-2 text-center mb-40">
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
        <!-- blog-area end -->

        </main>
        <!-- footer start -->
        <?php include "includes/footer.php" ?>