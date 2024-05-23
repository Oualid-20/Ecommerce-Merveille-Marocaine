<?php 
$catégories = afficherCategorie();   
$nbr_art = isset($_SESSION['Panier']) && is_array($_SESSION['Panier']) ? count($_SESSION['Panier']) : '0';   
?>
<header class="transparent-header transparent-header-2">
    <div class="header-area box-90">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-6 col-md-6 col-7 col-sm-3 d-flex align-items-center">
                    <div class="basic-bar cat-toggle">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                    </div>
                    <div class="logo">
                        <a href="index.html"><img src="assets/img/logo/logo-white.png" alt=""></a>
                    </div>
                    <div class="category-menu">
                        <h4>Category</h4>
                        <?php foreach ($catégories as $cat){ ?>
                        <ul>
                            <li><a href="shop-filter.php"><i class="flaticon-shopping-cart-1"></i><?=$cat['NOM'];?></a></li>
                        </ul>
                        <?php }?>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-8 col-8 d-none d-xl-block">
                    <div class="main-menu menu-white text-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li><a href="index.php">Home</a> </li>
                                <li><a href="shop-filter.php">Products</a></li>
                                <li>
                                    <a href="blog.php">Blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog.php">Blog</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Pages</a>
                                    <ul class="submenu">
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                        <li><a href="php/connecter_clt.php">Login</a></li>
                                        <li><a href="php/s'inscrire.php">Register</a></li>
                                        <li><a href="cart.php">Shopping Cart</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-5 col-sm-7 pl-0">
                    <div class="header-right f-right">
                        <ul>
                            <li class="search-btn">
                                <a class="search-btn nav-search search-trigger" href="#"><i class="fas fa-search"></i></a>
                            </li>
                            <li class="login-btn"><a href="php/connecter_clt.php"><i class="far fa-user"></i></a></li>
                            <li class="d-shop-cart"><a href="#"><i class="flaticon-shopping-cart"></i> <span class="cart-count"><?=$nbr_art;?></span></a>
                                <ul class="minicart">
                                    <?php   
                                    $total_general = 0;
                                    if(isset($_SESSION['Panier'])) {
                                        foreach ($_SESSION['Panier'] as $index => $item):
                                            $total_general += $item['total']; ?>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="cart.php">
                                                        <img src="<?=$item['image'];?>" alt="Photo du Produit">
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3><a href="product-details.php"><?=$item['produit'];?></a></h3>
                                                    <div class="cart-price">
                                                        <span class="new"><?=$item['prix'];?> DH</span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="Functions/panier.php?supprimeCart=ok&classementCart=<?=$index;?>" onclick="return confirm('Êtes-vous sûr de vouloir enlever ce produit ?');">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endforeach; 
                                    }?>
                                    <li>
                                        <div class="total-price">
                                            <span class="f-left">Total:</span>
                                            <span class="f-right"><?=$total_general;?> DH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkout-link">
                                            <a href="cart.php">Shopping Cart</a>
                                            <a class="red-color" href="checkout.php">Checkout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 d-xl-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
