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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/portfolio3.css">
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
            </li>
            <li class="icone">
                <i class="fa-sharp fa-solid fa-book-open"></i>
            </li>
            <li class="icone">
                <i class="fa-sharp fa-solid fa-envelope"></i>
            </li>
        </ul>
    </nav>

    <section>
        <!--tab titre-->
        <div class="tableau tab-titre trans-tableau-hide">
            <div class="cube">
                <div class="face front"></div>
                <div class="face back"></div>
                <div class="face left"></div>
                <div class="face right"></div>
                <div class="face top"></div>
                <div class="face bottom"></div>

                <div class="cube2">
                    <div class="face2 front2"></div>
                    <div class="face2 back2"></div>
                    <div class="face2 left2"></div>
                    <div class="face2 right2"></div>
                    <div class="face2 top2"></div>
                    <div class="face2 bottom2"></div>
                </div>
            </div>

            <div class="titre">
                <h1>HiroYuhi</h1>
                <h2>
                    <div>Web</div>
                    <div>Developer</div>
                </h2>
            </div>
        </div>

        <!--tab projet-->
        <div class="tableau  tab-projet trans-tableau-hide">
            <h3>Réalisation</h3>
            <div class="carte-conteneur">
                <div class="carte">
                    <img class="img" src="assets/images/home_mariage.png" alt="">
                    <h4>Photographie</h4>
                    <div class="langage">
                        <img src="assets/images/css.png" alt="">
                        <img src="assets/images/js.png" alt="">
                        <img src="assets/images/php.png" alt="">
                        <img src="assets/images/mysql.png" alt="">
                    </div>
                    <a href="http://wwbrdma.cluster030.hosting.ovh.net/?op=home">Visiter</a>
                </div>
            </div>
        </div>

        <!--tab contact-->
        <div class="tableau tab-contact trans-tableau-hide">
            <h3>Contact</h3>
            <form method="post">
                <div class="nom-prenom">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="prenom" placeholder="Prenom">
                </div>

                <input type="email" name="email" placeholder="Email">
                <input type="text" name="sujet" placeholder="Sujet">
                <textarea id="textarea" name="message" placeholder="Message"></textarea>
                <input type="submit" value="Envoyer">
            </form>

            <!--traitement du formulaire de contact-->
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
                        'Depuis le site PORTFOLIO
                        De : ' . $prenom . ' ' . $nom . ' 
                        Email : ' . $email . '
                        Message : '
                        . wordwrap($_POST['message'], 70, "\r\n");
                }
                $mail = mail('hiroyuhi@laposte.net', $sujet, $message, 'From: hiroyuhi.site@laposte.net,' . "\r\n" . 'Reply-to:' . $email);
                if ($mail) {
                    $msgSucces = 'l\'email a ete envoyé';
                } else {
                    $msgError = 'une erreur est survenue';
                }
            } else {
                $msgError = 'veuillez remplir le formulaire avant envoie';
            }

            // function debug($variable)
            // {
            //     echo '<pre>';
            //     var_dump($variable);
            //     echo '</pre>';
            // }
            ?>
        </div>

    </section>

    <footer></footer>


    <script src="assets/portfolio3.js"></script>
</body>

</html>