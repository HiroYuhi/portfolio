<!--traitement du formulaire de contact-->
<?php
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    if (
        isset($_POST['nom']) &&
        isset($_POST['prenom']) &&
        isset($_POST['email']) &&
        isset($_POST['sujet']) &&
        isset($_POST['message'])
    ) {

        $champs_vides = 0;

        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur);
            $_POST[$indice] = trim($valeur);
            if (trim($_POST[$indice] == '')) {
                $champs_vides++;
            }
        }

        if ($champs_vides > 0) {
            $_SESSION['error'] = 'veuillez remplir tout les champs';
        } else {

            //pour l'envoi en text / local

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $sujet = $_POST['sujet'];
            $message =
                'Depuis le site PORTFOLIO :
                      De : ' . $prenom . ' ' . $nom . ' 
                      Email : ' . $email . '
                      Message : ' . wordwrap($_POST['message'], 70, "\r\n");

            $headers[] = 'From: hiroyuhi.site@laposte.net';
            $headers[] = 'Reply-to:' . $email;

            $mail = mail('hiroyuhi@laposte.net', $sujet, $message, implode("\r\n", $headers));


            //pour l'envoi en html / hebergeur

            // $to = 'hiroyuhi@laposte.net';
            // $nom = $_POST['nom'];
            // $prenom = $_POST['prenom'];
            // $email = $_POST['email'];
            // $sujet = $_POST['sujet'];
            // $message =
            //     "<p>Depuis le <strong>Portfolio</strong> </p>
            //      <p>De : " . $prenom . " <strong>" . $nom . "</strong> </p>
            //      <p>Email : <strong>" . $email . "</strong> </p>
            //      <p>Sujet  : <strong>" . $sujet . "</strong> </p>
            //      <p>Message : <strong>" . $_POST['message'] . "</strong> </p>";

            // //$headers[] = 'MIME-Version: 1.0';   // ?? fonctionne sans mais pas avec !! ??
            // $headers[] = "Content-type:text/html; charset=UTF-8";
            // $headers[] = "From: <" . $email . ">";
            // $headers[] = "Reply-to: <" . $email . ">";

            // $mail = mail($to, $sujet, $message, implode("\r\n", $headers));
            // // from / reply ne fonctionnent pas..
        }

        if ($mail) {
            $_SESSION['success'] = 'l\'email a été envoyé.';
        } else {
            $_SESSION['error_envoi'] = 'L\'email n\'a pas pu être envoyé.';
        }
    } else {
        $_SESSION['error'] = 'Veuillez remplir tout les champs.';
    }
}

function debug($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

// debug($_POST);
// debug($_SESSION);
// debug($champs_vides);

?>

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

    <div class="message">
        <?php
        if (!empty($_SESSION['error'])) {
        ?> <p class="error"><?= $_SESSION['error'] ?></p> <?php
                                                            unset($_SESSION['error']);
                                                        }
                                                            ?>
        <?php
        if (!empty($_SESSION['error_email'])) {
        ?> <p class="error"><?= $_SESSION['error_email'] ?></p> <?php
                                                                unset($_SESSION['error_email']);
                                                            }
                                                                ?>
        <?php
        if (!empty($_SESSION['error_envoi'])) {
        ?> <p class="error"><?= $_SESSION['error_envoi'] ?></p> <?php
                                                                unset($_SESSION['error_envoi']);
                                                            }
                                                                ?>
        <?php
        if (!empty($_SESSION['success'])) {
        ?> <p class="success"><?= $_SESSION['success'] ?></p> <?php
                                                                unset($_SESSION['success']);
                                                            }
                                                                ?>
    </div>


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
                    <a href="http://wwbrdma.cluster030.hosting.ovh.net/mariage/?op=home">Visiter</a>
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
                <input type="submit" name="submit" value="Envoyer">
            </form>

        </div>

    </section>

    <footer></footer>


    <script src="assets/portfolio3.js"></script>
</body>

</html>