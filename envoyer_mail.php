<?php
// on démarre les sessions
session_start();
$_SESSION['erreur']='';
// si on n'est pas passé par le formulaire, on retourne au formulaire

if ($_SESSION=='') {
    header('Location: contact.php');
}

//require 'debut_html.inc.php';

//NOM//
if(!empty($_POST['nom'])) {
    //mettre le nom en minuscule
    $prenom= ucfirst(mb_strtolower($_POST['nom']));

    //PRENOM//
    if(!empty($_POST['prenom'])) {
        //mettre le prénom en minuscule
        $nom= mb_strtoupper($_POST['prenom']);

       //MAIL//
        if(!empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email = $_POST['email']; 
                //MESSAGE//
                if(!empty($_POST['message'])) {
                    //tester si le message est vide
                    $message= mb_strtoupper($_POST['message']);

                    
                            // 3) Envoi du mail
                    $destinataire = 'killian.spam03@gmail.com';
                    $sujet = 'Message de contact sur killian-david.fr '.date('d/m/Y');
                    $headers = 'From: '.$email. "\r\n" .
                        'Reply-To: ' .$email . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                    $message = 'Le prénom est : '.$prenom ."\n".
                            'Le nom est : '.$nom ."\n".
                                "L'email est : ".$email ."\n\n\n".
                                $message ;
                    if (mail($destinataire, $sujet, $message, $headers)) {
                        $_SESSION['erreur']= "Message envoyé : OK !"."\n";
                        //echo 'Message envoyé : OK !'."\n";
                        // on revient à la page d'accueil
                        //header('Location: index.php');
                        } else {
                            $_SESSION['erreur']= '<p class="error_message" style="color: red"> Erreur : message non envoyé !</p>';
                            header('Location: contact.php');
                        }
                            // Mail de confirmation pour l’internaute
                           
                            if (mail($_POST['email'], 'Confirmation de demande', 'Nous avons bien reçu votre demande !')) {
                                $_SESSION['erreur']= '<p class="error_message" style="color: green">Message de confirmation envoyé : OK !</p>';
                                // on revient à la page d'accueil
                                header('Location: contact.php');
                            } else {
                                $_SESSION['erreur']= '<p class="error_message" style="color: red">Erreur : message de confirmation non envoyé !</p>';
                                header('Location: contact.php');
                            }
                } else {
                    $_SESSION['erreur']= '<p class="error_message" style="color: red">Erreur : le champ message est vide !</p>';
                    header('Location: contact.php');
                    }
            }else {
                $_SESSION['erreur']= '<p class="error_message" style="color: red">Erreur : l\'email n\'est pas valide !</p>';
            header('Location: contact.php');
        }
        } else {
            $_SESSION['erreur']= '<p class="error_message" style="color: red">Erreur : l\'email est vide !</p>';
            header('Location: contact.php');
    }
    }else {
        $_SESSION['erreur']= '<p class="error_message" style="color: red">Erreur : le champ prénom est vide !</p>';
    header('Location: contact.php');
    }
}
else {
    $_SESSION['erreur']= '<p class="error_message" style="color: red">Erreur : le champ nom est vide !</p>';
    header('Location: contact.php');
}
?>





