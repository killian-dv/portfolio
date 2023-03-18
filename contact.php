<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Killian David | Contact">
    <meta name="description" content="Contactez Killian David, développeur full stack à Troyes.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://killian-david.fr">
    <meta property="og:title" content="Killian David | Contact">
    <meta property="og:description" content="Contactez Killian David, développeur full stack à Troyes.">
    <!-- <meta property="og:image" content="memoji.png"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="assets/memoji.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500;600;700&family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400&display=swap" rel="stylesheet">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" ></script> 
    <script src="js/script_defer.js" defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Killian David | Contact</title>
</head>
<body>
    <header>
        <nav>
            <p>Killian David</p>
            <input type="checkbox" id="active">
            <label for="active" class="menu-btn"><span></span></label>
            <div class="wrapper">
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/#about">À propos</a></li>
                <li><a href="/#creations">Réalisations</a></li>
                <li><a href="/#contact">Contact</a></li>
            </ul>
            </div>  
        </nav>
      </header>
    <main>
        <div class="bg-noise"></div>
        <div class="bg-gradient"></div>
        <section id="contact-page">
            <h2>Contactez-moi&nbsp;!</h2>
            <p>Remplissez ce formulaire, je vous recontacterai dès que possible.</p>
            <div class="wrapper-1">
                <div class="wrapper-2">
                    <div class="container">
                        <form method="POST" action="envoyer_mail.php">
                            <div class="form-field-wrapper">
                                <label for="nom">Nom:</label>
                                <input type="text" id="nom" name="nom" required>
                            </div>
                            <div class="form-field-wrapper">
                                <label for="prenom">Prénom:</label>
                                <input type="text" id="prenom" name="prenom" required>
                            </div>
                            <div class="form-field-wrapper">
                                <label for="email">E-mail:</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-field-wrapper">
                                <label for="message">Message:</label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit">Envoyer</button>
                        </form>
                        <?php
            // s'il y a une erreur
            if (!empty($_SESSION['erreur'])) {
                // on affiche cette erreur
                echo '<div id="message_contact" class="error_contact">'.$_SESSION['erreur'].'</div>'."\n";
                // on n'oublie pas de vider l'erreur juste après l'avoir affichée
                $_SESSION['erreur']='';
            }
            ?>
                    </div>
                </div>
            </div>
    </main>
    <footer>
        <p>Fait avec ❤️ par moi.</p>
        <div class="social-container">
            <a href="https://www.linkedin.com/in/killian-david/">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16"> <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path></svg>
            </a>
            <a href="https://github.com/killian-dv">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"> <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
            </a>
        </div>
    </footer>
    <script>
        AOS.init();
    </script>
</body>
</html>