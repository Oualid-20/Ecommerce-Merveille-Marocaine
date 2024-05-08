<?php 
    session_start();
    include "Functions/dbConnexion.php";

    $pageTitle = "Registre";
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
                            <h1>Login</h1>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">home</a></li>
                                <li><span>Login</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- login Area Strat-->
        <section class="login-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="basic-login">
                            <h3 class="text-center mb-60">Signup From Here</h3>
                            <form action="#">
                                <label for="name">Username <span>**</span></label>
                                <input id="name" type="text" placeholder="Enter Username or Email address..." />
                                <label for="email-id">Email Address <span>**</span></label>
                                <input id="email-id" type="text" placeholder="Enter Username or Email address..." />
                                <label for="pass">Password <span>**</span></label>
                                <input id="pass" type="password" placeholder="Enter password..." />
                                <div class="mt-10"></div>
                                <button class="btn theme-btn-2 w-100">Register Now</button>
                                <div class="or-divide"><span>or</span></div>
                                <button class="btn theme-btn w-100">login Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login Area End-->


        </main>

        <!-- footer start -->
        <?php include "includes/footer.php" ?>