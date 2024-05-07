<?php 
    session_start();
    $pageTitle = "Product Page";
    include "../Functions/dbConnexion.php";
    include "../includes/head.php";
    include "../dashboard/crud/affiche.php"; 

        if(isset($_GET["id_pdt"]) && isset($_GET["nom_pdt"])  ){
            $id= $_GET["id_pdt"];
            $pdt= affichePdt($id);
            $base_path = '../uploads/produits/'; 
        }
        else{
            header("Location: ../index.php");
            exit;
        }
?>
    <style>
                    @import url('https://fonts.googleapis.com/css2?family=Kalnia:wght@300&family=Kumbh+Sans:wght@400;700&family=Poppins:wght@100&display=swap');

                    :root {
                        font-size: 16px;
                        --Pale-orange: hsl(25, 100%, 94%);
                        --orange: hsl(26, 100%, 55%);
                        --Dark-grayish-blue: hsl(219, 9%, 45%);
                        --Light-grayish-blue: hsl(223, 64%, 98%);
                    }

                    * {
                        margin: 0%;
                        padding: 0%;
                        box-sizing: border-box;
                        font-family: 'Kumbh Sans', sans-serif;
                    }

                    header {
                        width: 85%;
                        display: flex;
                        padding: 1rem 0;
                        align-items: center;
                        margin: 0 auto;
                        border-bottom: 1px solid var(--Dark-grayish-blue);
                    }


                    nav {
                        width: 40%;
                    }

                    nav ul {
                        display: flex;
                        justify-content: space-around;
                        list-style: none;
                    }

                    nav ul li {
                        position: relative;
                    }


                    nav ul li a {
                        text-decoration: none;
                        color: var(--Dark-grayish-blue);
                    }


                    .main {
                        width: 80%;
                        display: flex;
                        justify-content: space-around;
                        margin: 7rem auto 0;
                    }

                    .images-product {
                        width: 40%;
                    }

                    .next, .previous {
                        display: none;
                    }

                    .main-img img {
                        width: 100%;
                    }

                    .main-img img:hover {
                        transition: all ease 1s;
                        transform: scale(1.2);
                    }

                    img {
                        border-radius: 0.5rem;
                    }

                    .details-product {
                        margin-top: 2.5rem;
                        width: 50%;
                    }

                    .details-product h6 {
                        color: hsl(26, 100%, 55%);
                        letter-spacing: 0.1rem;
                        margin-bottom: 0.8rem;
                    }

                    .details-product h1 {
                        font-size: 2.5rem;
                        width: 70%;
                    }

                    .details-product p {
                        color: var(--Dark-grayish-blue);
                        width: 70%;
                        line-height: 1.4rem;
                        font-size: 0.9rem;
                        margin-top: 2.1rem;
                    }

                    .price {
                        margin-top: 1.9rem;
                    }

                    .new-price span:first-child {
                        font-size: 1.6rem;
                        font-weight: 700;
                    }

                    .new-price span:last-child {
                        background-color: var(--Pale-orange);
                        color: var(--orange);
                        padding: 0.1rem 0.3rem;
                        border-radius: 0.2rem;
                        margin-left: 0.7rem;
                        font-size: 1rem;
                        font-weight: 700;
                    }


                    .Add-To-card {
                        margin-top: 2rem;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        width: 110%;
                    }

                    .Quantity {
                        width: 35%;
                        background-color: var(--Light-grayish-blue);
                        display: flex;
                        align-items: center;
                        border-radius: 0.3rem;
                    }

                    .Quantity button {
                        display: flex;
                        padding: 1rem;
                        cursor: pointer;
                        width: 100%;
                        background: transparent;
                        border: none;
                    }

                    .Quantity button:last-child {
                        justify-content: flex-end;
                    }

                    .btn {
                        width: 60%;
                        display: flex;
                        align-items: center;
                    }

                    .btn span {
                        display: inline-block;
                        margin-left: 0.7rem;
                    }

                    .btn button, .testimonial-animated button {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background: none;
                        border: none;
                        background-color: hsl(26, 100%, 55%);
                        padding: 0.7rem;
                        border-radius: 0.3rem;
                        width: 85%;
                        color: white;
                        font-weight: 700;
                        transition: all ease 1s;
                    }

                    .btn button:hover, .testimonial-animated button:hover  {
                        cursor: pointer;
                        box-shadow: 0px 2px 15px 1px hsl(26, 100%, 55%);
                        transform: scale(1.02);
                    }

                    .testimonial-animated {
                        max-width: 700px;
                        margin: 40px auto;
                        background: #ffffff;
                        padding: 20px;
                        border-radius: 15px;
                        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                        transition: transform 0.5s ease, box-shadow 0.5s ease;
                    }

                    .testimonial-animated:hover {
                        transform: translateY(-10px);
                        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                    }

                    .testimonial-animated h2 {
                        font-size: 22px;
                        color: var(--orange);
                        margin-bottom: 15px;
                        text-align: center;
                        animation: fadeInDown 1s ease both;
                    }

                    .testimonial-animated select, .testimonial-animated textarea {
                        width: 100%;
                        padding: 12px;
                        border: 2px solid #3498db;
                        border-radius: 6px;
                        margin-bottom: 15px;
                        font-size: 14px;
                        transition: border-color 0.3s;
                        animation: zoomIn 0.6s ease both;
                    }                    
                    @keyframes fadeInDown {
                        from {
                            opacity: 0;
                            transform: translate3d(0, -100%, 0);
                        }
                        to {
                            opacity: 1;
                            transform: none;
                        }
                    }

                    @keyframes zoomIn {
                        from {
                            opacity: 0;
                            transform: scale3d(0.3, 0.3, 0.3);
                        }
                        to {
                            opacity: 1;
                            transform: none;
                        }
                    }

                    @media screen and (max-width: 800px) {
                        :root {
                            font-size: 8px;
                        }

                        header {
                            border: none;
                            height: 8rem;
                            width: 90%;
                        }

                        nav {
                            display: none;
                        }

                        .main {
                            flex-direction: column;
                            width: 100%;
                            justify-content: center;
                            align-items: center;
                            margin: 0;
                        }

                        .images-product {
                            width: 90%;
                        }


                        .details-product {
                            width: 85%;
                            margin-top: 1.5rem;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                        }

                        .details-product h6 {
                            font-size: 1.3rem;
                        }

                        .details-product h1 {
                            font-size: 3.5rem;
                        }

                        .details-product p {
                            width: 100%;
                            font-size: 1.8rem;
                            line-height: 2.5rem;
                            font-weight: 700
                        }

                        .price {
                            width: 100%;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        }

                    
                        .new-price span:last-child {
                            font-size: 1.5rem;
                            margin-left: 2rem;
                        }

                        .Add-To-card {
                            flex-direction: column;
                            width: 100%;
                        }

                        

                        .Quantity span {
                            font-size: 2rem;
                        }

                        .main-img img:hover {
                            transform: scale(1);
                        }  
                    }
    </style>
    <body>


        <div class="container">
            <header>  
                <nav> 
                    <ul>
                      <li><a href="#">Collections</a></li>
                      <li><a href="#">Men</a></li>
                      <li><a href="#">Women</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </header>
                    <section class="main">
                          <article class="images-product">
                                <div class="main-img">
                                    <img src="<?=$base_path . basename($pdt['IMAGE_PDT']);?>" alt="pdt-image" id="main-img">
                                </div>
                         </article>
                         <article class="details-product">
                                <h6><?=$pdt['COOPERATIVE']; ?></h6>
                                <h1><?=$pdt['NOM_PDT'];?></h1>
                                <p><?=$pdt['DESCRIPTION_PDT'];?></p>
                                <div class="price">
                                    <div class="new-price">
                                        <span><?=$pdt['PRIX_PDT'];?> MAD</span>
                                    </div>
                                </div>
                                <div class="Add-To-card">
                                    <div class="Quantity">
                                        <button id="minus"><svg width="12" height="4" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <defs>
                                                    <path
                                                        d="M11.357 3.332A.641.641 0 0 0 12 2.69V.643A.641.641 0 0 0 11.357 0H.643A.641.641 0 0 0 0 .643v2.046c0 .357.287.643.643.643h10.714Z"
                                                        id="a" />
                                                </defs>
                                                <use fill="#FF7E1B" fill-rule="nonzero" xlink:href="#a" />
                                            </svg></button>
                                        <span id="quantity-value">1</span>
                                        <button id="plus"><svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <defs>
                                                    <path
                                                        d="M12 7.023V4.977a.641.641 0 0 0-.643-.643h-3.69V.643A.641.641 0 0 0 7.022 0H4.977a.641.641 0 0 0-.643.643v3.69H.643A.641.641 0 0 0 0 4.978v2.046c0 .356.287.643.643.643h3.69v3.691c0 .356.288.643.644.643h2.046a.641.641 0 0 0 .643-.643v-3.69h3.691A.641.641 0 0 0 12 7.022Z"
                                                        id="b" />
                                                </defs>
                                                <use fill="#FF7E1B" fill-rule="nonzero" xlink:href="#b" />
                                            </svg></button>

                                    </div>
                                    <div class="btn">
                                        <button id="add-product"><svg width="22" height="20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.925 3.641H3.863L3.61.816A.896.896 0 0 0 2.717 0H.897a.896.896 0 1 0 0 1.792h1l1.031 11.483c.073.828.52 1.726 1.291 2.336C2.83 17.385 4.099 20 6.359 20c1.875 0 3.197-1.87 2.554-3.642h4.905c-.642 1.77.677 3.642 2.555 3.642a2.72 2.72 0 0 0 2.717-2.717 2.72 2.72 0 0 0-2.717-2.717H6.365c-.681 0-1.274-.41-1.53-1.009l14.321-.842a.896.896 0 0 0 .817-.677l1.821-7.283a.897.897 0 0 0-.87-1.114ZM6.358 18.208a.926.926 0 0 1 0-1.85.926.926 0 0 1 0 1.85Zm10.015 0a.926.926 0 0 1 0-1.85.926.926 0 0 1 0 1.85Zm2.021-7.243-13.8.81-.57-6.341h15.753l-1.383 5.53Z"
                                                    fill="#fff" fill-rule="nonzero" />
                                            </svg><span>Add to cart</span></button>
                                    </div>
                                </div>
                            </article>
                        </section> <br> <br>
                    <section class="testimonial-animated">
                            <h2>Partagez votre expérience</h2>
                            <form method="post" action="submit_review.php">
                                <label for="rating">Votre note :</label>
                                <select name="rating" id="rating" required>
                                    <option value="">--Choisissez une note--</option>
                                    <option value="1">★ - Pas satisfait</option>
                                    <option value="2">★★ - Peu satisfait</option>
                                    <option value="3">★★★ - Moyennement satisfait</option>
                                    <option value="4">★★★★ - Satisfait</option>
                                    <option value="5">★★★★★ - Très satisfait</option>
                                </select>

                                <label for="testimonial">Votre témoignage :</label>
                                <textarea name="testimonial" id="testimonial" rows="4" required></textarea>

                                <button type="submit">Envoyer</button>
                            </form>
                        </section>
        </div>
    </body>
</html>