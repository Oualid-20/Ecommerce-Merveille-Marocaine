<?php 
    session_start();
    include "Functions/dbConnexion.php";

    $pageTitle = "Cart-Panier";
    include "includes/HeadTemplate.php";

    include "dashboard/crud/affiche.php";   //unset($_SESSION['Panier']);?>
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
                            <h1>Shoping Cart</h1>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Cart</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- Cart Area Strat-->
        <section class="cart-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table">
                                <?php  if (isset($_SESSION["message"]) ){ echo $_SESSION["message"]; unset($_SESSION["message"]); } ?>

                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="product-price">Unit Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php    $total_general = 0;
                                            if(isset($_SESSION['Panier'])) {
                                            foreach ($_SESSION['Panier'] as $index => $item):
                                                $total_general += $item['total']; ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?=$item['image'];?>" alt="Photo du Produit"></a></td>
                                            <td class="product-name"><a href="#"><?=$item['produit'];?></a></td>
                                            <td class="product-price"><span class="amount"><?=$item['prix'];?> DH</span></td>
                                            <td class="product-quantity">
                                                <div class="cart"><input type="text" value="<?=$item['quantite'];?>"/></div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount"><?=$item['total'];?> DH</span></td>
                                            <td class="product-remove"><a href="Functions/panier.php?supprimeCart=ok&idp=<?=$item['ID_produit'];?>&classementCart=<?=$index;?>" onclick="return confirm('Êtes-vous sûr de vouloir enlever ce produit ?');"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                            <?php endforeach ;  $_SESSION["total_general"]= $total_general;
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul class="mb-20">
                                            <li>Total <span><?=$total_general;?> DH</span></li>
                                        </ul>
                                        <a class="btn theme-btn" href="Functions/valider_panier.php" type="button">Valider Mon Panier</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cart Area End-->
        </main>

        <!-- footer start -->
        <?php include "includes/footer.php" ?>