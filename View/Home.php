<?php 
  include '../Model/Commande.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Public/Style/HomeStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light style=background-color:#cacaca">
                <img src="../Public/Images/logo.png">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" style="color: #EBBE2A;" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="#platJour">Plat du jour</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="#Services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="#AboutUs">About-Us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="#Contact">Contact</a>
                    </li>
                </ul>
                </div>
            </nav>


            <div class="home">
                <div class="slider">
                    <div class="slide active" style="background-image: url('../Public/Images/supermarket.jpg')">
                        <div class="container">
                            <div class="caption">
                                <h1 >Bienvenue dans Health&Food  </h1>
                                <p>Chaque jour, un nouveau plat </p>
                                <a  href="#commande">Commandes maintenant !</a>
                            </div>
                        </div>
                    </div>

                    <div class="slide" style="background-image: url('../Public/Images/LEGUMES.jpg')">
                        <div class="container">
                            <div class="caption">
                                <h1> Besoin d'un plat décilieux immédiatement ?</h1>
                                <p> Livraison jusqu'à votre maison </p>
                                <a  href="#commande">Commandes maintenant !</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="slide" style="background-image: url('../Public/Images/fruit.jpg')">
                        <div class="container">
                            <div class="caption">
                                <h1>Avec des produits 100% naturels</h1>
                                <p>Pour une bonne santé.</p>
                                <a  href="#commande">Commandes maintenant !</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="slide" style="background-image: url('../Public/Images/market.jpg')">
                        <div class="container">
                            <div class="caption">
                                <h1> Des offres et des promotions pour vous! </h1>
                                <p> Des prix convenables</p>
                                <a  href="#commande">Commandes maintenant !</a>
                            </div>
                        </div>
                    </div>

                    <div class="slide" style="background-image: url('../Public/Images/achat.jpg')">
                        <div class="container">
                            <div class="caption">
                                <h1> Nous sommes toujours à votre disposition </h1>
                                <p> N'importe quel temps, N'importe quel lieu !</p>
                                <a  href="#commande">Commandes maintenant !</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="controls">
                    <div class="prev">&#10094;</div>
                    <div class="next">&#10095;</div>
                </div>
            </div>
    </header>

    <div class="espace"></div>
    <?php echo $Success; ?> 
    <div class="PartPlat">
        <div class="platJ" id="platJour">
            <h2 id="PlatJ">Plat du jour </h2>
            <hr><br>
            <div class="imagePlat" style="background-image: url(../Public/Image_plat/<?php echo $image_plat ?>">

            </div>
            <p> <?php echo $nom_plat ?> </p>
            <p style="font-size:18px;color:red"> Prix : <?php echo $prix_plat ?> DH</p>
        </div>
        <div class="formPlat">
            <p id="commande"> Remplissez ce formulaire pour commander !</p><br>
            <form  method="post">
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" required >
                </div>
                <div>
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" required>
                </div>
                <div>
                    <label for="num"> Numéro de téléphone :</label>
                    <input type="number" name="num">
                </div>
                <div>
                    <label for="adresse">Adresse :</label>
                    <textarea name="adresse"></textarea>
                </div>
                <input type="hidden" value="<?php echo $nom_plat ?>" name="nom_plat">
                <p><button type="submit" name="Commander"> Commander </button></p>
            </form>
        </div>
    </div>

    <div class="espace"></div>
    <div class="espace"></div>

    <div class="description">
        <h2 id="AboutUs">A propos de nous </h2>
        <hr><br>
        <p> Préparer des plats chaque jour n'est plus un sujet de préoccupation! <br><b>Food&Health</b> vous donne la possibilité de faire votre commande du plat proposé par nos chefs
            en ligne. De notre temps, et à cause de ce virus contagieux, une simple sortie ou visite aux hypermarchés est devenue un véritable défi. Plus besoin de faire un long trajet pour 
            faire vos commandes, vous pouvez commander facilement depuis notre épicerie en ligne et on se charge de la livraison de votre commande. 
        </p>
    </div>
    <div class="espace"></div>
    <div class="espace"></div>


    <div class="commande">
        <h2 id="Services">Notre service </h2>
        <hr><br>
        <div class="commander">
            <div class="part">
                <p> 
                    <ul>
                        <li>Livraison immédiate.</li>
                        <li>Tous les produits sont de bonne qualité.</li>
                        <li>Tous nos plats sont soigneusement préparés par nos chefs cuisiniers.</li>
                        <li>Respect des règles d'hygiène.</li>
                    </ul>
                    <a  href="#commande"><button > Commandes maintenant !</button></a>
                </p>
            </div>
            <div  class="part"><img src="../Public/Images/delivreur.svg" alt="market"></div>
        </div>
    </div>

    <div class="espace"></div>
    <div class="espace"></div>

    <footer id="Contact">
        <div class="block">
                <div class="block1">  
                        <img src="../Public/Images/logo.png" alt="logo">
                        <p> Suivez-nous sur les réseaux sociaux</p>
                        <a><img style="cursor: pointer;" id="facebook" src="../Public/Images/facebook.png" alt="facebook" ></a>
                        <a ><img style="cursor: pointer;" src="../Public/Images/twitter.png" alt="twitter" ></a>
                        <a><img style="cursor: pointer;" src="../Public/Images/linkedin-in.png" alt="linkedin" ></a>
                </div>

                <div class="block1"> 
                        <strong>QUICK LINKS</strong><br>
                        <p style="cursor: pointer;">HOME</p>
                        <p style="cursor: pointer;">ABOUT US</p>
                        <p style="cursor: pointer;">CITY GUIDE</p>
                        <p style="cursor: pointer;">BLOG</p>
                        <p style="cursor: pointer;">FAQ's</p>
                </div>

                <div class="block1">
                        <strong style="font-size: 30px;">CONTACT US</strong>
                        <p>Feel free to get in touch with us via phone or send<br> us a message</p>
                        <div class="contact">
                            <p>+1 800 123 1234</p>
                            <p><b>Food-health@website.com</b></p>
                        </div>
                </div>
        </div>
        <div class="copy">
            <div class="p">
                    <p>@Copyright 2020. All Right Reserved</p>
                    <div class="p2">
                            <p>Privacy Policy </p>
                            <p>Terms & Conditions</p>
                    </div>
            </div>
        </div>

        <div class="footer2">
                <img id="logo" src="../Public/Images/logo.png" alt="logo"><br>
                <p>CONTACT US</p>
                <strong>+1 800 123 1234</strong><br>
                <strong>Food-health@website.com</strong>
                <p> Suivez-nous sur les réseaux sociaux</p>
                <a ><img id="facebook" src="../Public/Images/facebook.png" alt="facebook" ></a>
                <a ><img src="../Public/Images/twitter.png" alt="twitter" ></a>
                <a><img src="../Public/Images/linkedin-in.png" alt="linkedin" ></a>
                <p>@Copyright 2020</p>
                <p> All Right Reserved</p>
        </div>
    </footer>


    <script src="../Public/JS/script.js"></script>
</body>
</html>