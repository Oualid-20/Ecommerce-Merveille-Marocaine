            <?php $catégories = afficherCategorie();    ?>
        <header>
            <div id="header-sticky" class="header-area box-90">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-6 col-md-6 col-7 col-sm-5 d-flex align-items-center pos-relative">
                            <div class="basic-bar cat-toggle">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span>
                            </div>
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>

                            <div class="category-menu">
                                <h4>Category</h4>
                                    <?php foreach ($catégories as $cat){ ?>
                                <ul>
                                    <li><a href="shop.php"><i class="flaticon-shopping-cart-1"></i><?=$cat['NOM'];?></a></li>
                                </ul>
                                     <?php }?>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-6 col-md-8 col-8 d-none d-xl-block">
                            <div class="main-menu text-center">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="index.php">Home</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="index.php">Home Style 1</a>
                                                </li>
                                                <li>
                                                    <a href="index-2.php">Home Style 2</a>
                                                </li>
                                                <li>
                                                    <a href="index-3.php">Home Style 3</a>
                                                </li>
                                                <li>
                                                    <a href="index-4.php">Home Style 4</a>
                                                </li>
                                                <li>
                                                    <a href="index-5.php">Home Style 5</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-filter.php">Products </a>
                                        </li>
                                        <li>
                                            <a href="blog.php">Blog</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="blog-3-col-mas.php">Blog 3 Col Masonry</a>
                                                </li>
                                                <li>
                                                    <a href="blog-details.php">Blog Details</a>
                                                </li>
                                               
                                                <li>
                                                    <a href="blog-details-gallery.php">Blog Details Gallery</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="about.php">About Us</a>
                                                </li>

                                                <li>
                                                    <a href="contact.php">Contact Us</a>
                                                </li>
                                                <li>
                                                    <a href="login.php">login</a>
                                                </li>
                                                <li>
                                                    <a href="register.php">Register</a>
                                                </li>
                                                <li>
                                                    <a href="cart.php">Shoping Cart</a>
                                                </li>
                                                <li>
                                                    <a href="checkout.php">Checkout</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.php">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 col-5 col-sm-7 pl-0">
                            <div class="header-right f-right">
                                <ul>
                                    <li class="search-btn">
                                        <a class="search-btn nav-search search-trigger" href="#"><i
                                                class="fas fa-search"></i></a>
                                    </li>
                                    <li class="login-btn"><a href="login.php"><i class="far fa-user"></i></a></li>
                                    <li class="d-shop-cart"><a href="#"><i class="flaticon-shopping-cart"></i> <span
                                                class="cart-count">3</span></a>
                                        <ul class="minicart">
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.php">
                                                        <img src="assets/img/product/pro1.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.php">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.php">
                                                        <img src="assets/img/product/pro2.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.php">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.php">
                                                        <img src="assets/img/product/pro3.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.php">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total-price">
                                                    <span class="f-left">Total:</span>
                                                    <span class="f-right">$300.0</span>
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