<?php 
    session_start();
    include "Functions/dbConnexion.php";

    $pageTitle = "Checkout";
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
                            <h1>Checkout</h1>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">home</a></li>
                                <li><span>Checkout</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- coupon-area start -->
        <section class="coupon-area pt-100 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                        sit amet ipsum luctus.</p>
                                    <form action="#">
                                        <p class="form-row-first">
                                            <label>Username or email <span class="required">*</span></label>
                                            <input type="text" />
                                        </p>
                                        <p class="form-row-last">
                                            <label>Password <span class="required">*</span></label>
                                            <input type="text" />
                                        </p>
                                        <p class="form-row">
                                            <button class="btn theme-btn" type="submit">Login</button>
                                            <label>
                                                <input type="checkbox" />
                                                Remember me
                                            </label>
                                        </p>
                                        <p class="lost-password">
                                            <a href="#">Lost your password?</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- coupon-area end -->
        <!-- checkout-area start -->
        <section class="checkout-area pb-70">
            <div class="container">
                <form action="Functions/valider_panier.php" methode='get'>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">
                                   
                                    
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                        <?php  if (isset($_SESSION["nTracking"])){ echo $_SESSION["nTracking"] ;unset($_SESSION["nTracking"]);} ?>
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" name="adressRue" id="" required>
                                        </div>
                                    </div>
                                 
                                    
                                   
                                    <div class="col-md-12">
                                        <div class="checkout-form-list create-acc">
                                            <label>Create an account?</label>
                                        </div>
                                        <div id="cbox_info" class="checkout-form-list create-account">
                                            <p>Create an account by entering the information below. If you are a returning
                                                customer please login at the top of the page.</p>
                                            <label>Account password <span class="required">*</span></label>
                                            <input type="password" placeholder="password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment mt-20">
                                        <button type="submit" name='checkout' class="btn theme-btn">Place order</button>
                                       
                                    </div>
                        </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form>
                            <div class="your-order mb-30 ">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php    $total_general = 0;
                                            if(isset($_SESSION['Panier'])) {
                                            foreach ($_SESSION['Panier'] as $index => $item):
                                                $total_general += $item['total']; ?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                <?=$item['produit'];?> <strong class="product-quantity"> × <?=$item['quantite'];?></strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount"><?=$item['prix'];?> DH</span>
                                                </td>
                                            </tr>
                                            <?php endforeach ; }?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount"><?=$total_general;?> DH</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        Stripe Transfer
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                <?php if (isset($_SESSION['Panier']) && $_SESSION['user_email']) { ?>
                                                    <div class="order-button-payment mt-20">
                                                            <button type="submit" name='check-carte' class="btn theme-btn"><a href="Stripe/siteStrip.php">Place order by Cart</a></button>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- checkout-area end -->


        </main>

        <!-- footer start -->
        <?php include "includes/footer.php" ?>