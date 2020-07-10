<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <?php
                    session_start();
                    if (isset($_SESSION['mail'])) {
                        echo $_SESSION['mail'];
                    } ?>
                </div>
                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="index.php" class="js-logo-clone">Nikon</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            <li><a href="#"><i class="far fa-heart" id="heart"></i></a></li>
                            <?php
                            // affiche bouton se déconnecter + panier au lieu de mon compte si une session est ouverte
                            if (!isset($_SESSION)) {
                                session_start();
                            }
                            if (isset($_SESSION['mail'])) {
                                echo '<li>
                                <a href="cart.php" class="site-cart">
                                <i class="fas fa-shopping-cart" id="cart"></i>
                                </a>
                                </li>';
                                $nb = mysqli_query($bdd, "SELECT * 
                                                          FROM Panier;");

                                $row = mysqli_fetch_assoc($nb);
                            ?>
                                <li>
                                    <a href="logout.php" class="site-cart">
                                        <i class="fas fa-sign-out-alt" id="cart" style="font-size: 20px;"></i>
                                    </a>
                                </li>
                            <?php } else {
                                echo '<li><a href="account.php"><i class="fas fa-user" id="account"></i></a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="about.php">A propos</a></li>
                <li><a href="shop.php">Produits</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>