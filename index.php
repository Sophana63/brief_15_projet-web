<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hello.css">
    <link rel="stylesheet" href="css/carte.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <title>BS - Vélo</title>
</head>

<body>
    <!-- Back to top button -->
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <header>
        <nav class="navbar">
            <div class="parent">
                <div class="logo">
                    <img src="images/logo.svg" alt="mon logo" />
                </div>
                <div class="link">
                    <a href="#">Accueil |</a>
                    <a href="#section_carte">stations |</a>
                    <a href="#section_form">avis |</a>
                    <a href="#contact">Contact |</a>
                </div>
            </div>
        </nav>
    </header>
    <section class="section_carte" id="section_carte">
        <div class="parent_carte">
            <div class="carte">
                <h1>Carte de Lyon</h1>
                <div id="map"></div>
            </div>
            <div class="infos_station">
                <h1>Info Station</h1>
                <div class="infos_api"></div>
            </div>
        </div>
    </section>
    <section class="section_form" id="section_form">
        <div class="parent_carte">
            <div class="formulaire">
                <h1>Titre formulaire</h1>
                <hr>
                <p>&nbsp</p>
                <form action="verif.php" method="post">
                    <label for="pseudo">Pseudo : </label>
                    <input type="text" name="pseudo" id="pseudo" size="50" value="" required> <br><br>
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="7" cols="50" required></textarea> <br><br>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
            <div class="avis">
                <h1>Avis</h1>
                <hr>
                <p>&nbsp</p>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="contact_form">
            <h1>Formulaire de contact</h1>
            <form action="verif_contact.php" method="post">

                <label for="fname">Nom</label>
                <input type="text" id="fname" name="firstname" placeholder="Votre Nom.." required>

                <label for="lname">Prénom</label>
                <input type="text" id="lname" name="lastname" placeholder="Votre prénom.." required>

                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" placeholder="Votre mail.." required>

                <label for="subject">Commentaire</label>
                <textarea id="subject" name="subject" placeholder="Votre commentaire.." required></textarea>

                <br><br>
                <input type="submit" value="Submit">

            </form>
        </div>
    </section>
    <footer>
        <div class="parent_footer">
            <div class="f_logo">
                <img src="images/logo.svg" alt="mon logo" />
            </div>
            <div class="f_menu">

            </div>
            <div class="f_social">
                <img src="images/social/facebook.png" alt="facebook" />
                <img src="images/social/instagram.png" alt="instagram" />
                <img src="images/social/linkedin.png" alt="linkedin" />
                <img src="images/social/pay-pal.png" alt="pay-pal" />
                <img src="images/social/twitter.png" alt="twitter" />
            </div>
        </div>
    </footer>
</body>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="js/script.js"></script>
<script src="js/button.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>

</html>