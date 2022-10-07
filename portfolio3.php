<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio3</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/style.css.css">
</head>

<body>
    <header>
        <div id="btn-menu">
            <div id="btn-burger">
                <div class="burger-line"></div>
                <div class="burger-line"></div>
                <div class="burger-line"></div>
            </div>
        </div>
        <div id="logo">
            <div id="logo-img"></div>
            <p id="logo-name">hiroyuhi</p>
        </div>
    </header>

    <nav id="nav-icones" class="nav-icones-hide">
        <ul>
            <li class="icone">
                <i class="fa-solid fa-house"></i>
                <p class="link-name">home</p>
            </li>
            <li class="icone">
                <i class="fa-sharp fa-solid fa-book-open"></i>
                <p class="link-name">book</p>
            </li>
            <li class="icone">
                <i class="fa-sharp fa-solid fa-envelope"></i>
                <p class="link-name">contact</p>
            </li>
        </ul>
    </nav>

    <section>
        <div class="tableau tab-titre trans-tableau-hide">
            <h1>valery longchamps</h1>
            <h2>web developper</h2>
        </div>

        <div class="tableau  tab-projet trans-tableau-hide">
            <div class="element-slideshow">
                <div class="carte">
                    <img src="assets/images/site photo.png" alt="" class="carte-img">
                    <div class="carte-txt">
                        <h3>Photographe</h3>
                        <p>Site réalisé pour répondre aux besoin d'un photographe désirant
                            présenter son travail sur le net.
                            Largement inspiré de celui du studio "Huibvintges Photography".
                        </p>
                        <a href="http://wwbrdma.cluster030.hosting.ovh.net/?op=home">visiter</a>
                    </div>
                </div>
                <div class="carte">
                    <img src="assets/images/Love, Death + Robots - Saison 3.jpg" alt="" class="carte-img">
                    <div class="carte-txt">
                        <h3>Bibliothèque Video</h3>
                        <p>Application web permettant d'archiver les séries vivionnées.
                            Source rapide et pratique d'informations.
                        </p>
                        <a href="#">à venir</a>
                    </div>
                </div>
                <div class="carte">
                    <img src="assets/images/lecteur audio.jpg" alt="" class="carte-img">
                    <div class="carte-txt">
                        <h3>Lecteur Audio</h3>
                        <p>Application web permettant de diffuser du contenu audio.
                            A l'image d'une application audio telle que Deezer.
                        </p>
                        <a href="#">à venir</a>
                    </div>
                </div>

                <a class="bouton-slideshow suivant" id="suivant"><i class="fa-solid fa-angle-right"></i></a>
                <a class="bouton-slideshow precedent" id="precedent"><i class="fa-solid fa-angle-left"></i></a>
            </div>


            <div class="dot-slideshow">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>

        <div class="tableau tab-contact trans-tableau-hide">
            <form method="post">
                <input type="text" name="nom" placeholder="Nom">
                <input type="text" name="prenom" placeholder="Prenom">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="sujet" placeholder="Sujet">
                <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
                <input type="submit" value="Envoyer le message">
            </form>
            <a href="mailto:hiroyuhi@laposte.net">hiroyuhi@laposte.net</a>

            <?php

            if (!empty($_POST)) {
                $msgError = 0;
                $champs_vides = 0;

                foreach ($_POST as $indice => $valeur) {
                    $_POST[$indice] = htmlspecialchars($valeur);
                    $_POST[$indice] = trim($valeur);
                    if (trim($_POST[$indice] == '')) {
                        $champs_vides++;
                    }
                }

                if ($champs_vides > 0) {
                    $msgError = 'veuillez remplir tout les champs';
                } else {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $email = $_POST['email'];
                    $sujet = $_POST['sujet'];
                    $message =
                        'Depuis le portfolio, De : ' . $prenom . ' ' . $nom . 'Message : ' . wordwrap($_POST['message'], 70, "\r\n");
                }
                $mail = mail('hiroyuhi@laposte.net', $sujet, $message, 'From: hiroyuhi.site@laposte.net' . '\r\n' . 'reply-to:' . $email);
                if ($mail) {
                    $msgSucces = 'l\'email a ete envoyé';
                } else {
                    $msgError = 'une erreur est survenue';
                }
            } else {
                $msgError = 'veuillez remplir le formulaire avant envoie';
            }

            function debug($variable)
            {
                echo '<pre>';
                var_dump($variable);
                echo '</pre>';
            }
            ?>
        </div>
    </section>

    <footer></footer>


    <script src="assets/portfolio3.js"></script>
</body>

</html>