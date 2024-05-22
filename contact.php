<?php 
    session_start();
    include "Functions/dbConnexion.php";

    $pageTitle = "Contact Us";
    include "includes/HeadTemplate.php";

    include "dashboard/crud/affiche.php";?>
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
                            <h1>Contact Us</h1>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">home</a></li>
                                <li><span>Contact</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area start -->
        <section class="contact-area pt-120 pb-90" data-background="assets/img/bg/bg-map.html">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="contact text-center mb-30">
                            <i class="fas fa-envelope"></i>
                            <h3>Mail Here</h3>
                            <p><a href="https://wphix.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a4e5c0c9cdcae4e6c5d7cdc7f0ccc1c9c18ac7cbc9">[email&#160;protected]</a></p>
                            <p><a href="https://wphix.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="561f38303916023e333b332623247835393b">[email&#160;protected]</a></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="contact text-center mb-30">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>Visit Here</h3>
                            <p>27 Division St, New York, NY 10002,
                                Jaklina, United Kingpung</p>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-4 col-md-4 ">
                        <div class="contact text-center mb-30">
                            <i class="fas fa-phone"></i>
                            <h3>Call Here</h3>
                            <p>+8 (123) 985 789</p>
                            <p>+787 878897 87</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area end -->

        <!-- contact-form-area start -->
        <section class="contact-form-area grey-bg pt-100 pb-100">
            <div class="container">
                <div class="form-wrapper">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8">
                            <div class="section-title mb-55">
                                <p><span></span> Anything On your Mind</p>
                                <h1>Estimate Your Idea</h1>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-3 d-none d-xl-block ">
                            <div class="section-link mb-80 text-right">
                                <a class="btn theme-btn" href="#"><i class="fas fa-phone"></i> make call</a>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form id="contact-form" action="Functions/functions.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box phone-icon mb-30">
                                        <input type="text" name="phone" placeholder="Your Phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="text" name="subject" placeholder="Your Subject">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-30">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="contact-btn text-center">
                                        <button class="btn theme-btn" name='contactUs' type="submit">get action</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="ajax-response text-center"></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-form-area end -->

        <section class="map-area">
            <div id="contact-map" class="contact-map"></div>
        </section>


        </main>

        <!-- footer start -->
        <?php include "includes/footer.php" ?>