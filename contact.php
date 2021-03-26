<?php include("conf_files/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>

    <title>Lan night - Brienon Sur Arman&ccedil;on - Contact</title>
  <meta http-equiv="Content-Type" content="text/html ; charset=iso-8859-1" />

  <link rel="stylesheet" media="screen" type="text/css" title="Design Officiel" href="stylesheet/main.css" />
  <link rel="shortcut icon" media="screen" type="image/png" href="pictures/favicon.png" />

</head>

<body>

<div class="header"></div>

<div class="conteneur">

<?php include("menu_horizontal.php"); ?>

<div class="corps">
    <div class="contact">
    <p>
        Pour nous contacter rapidement, rien de plus simple ! Remplissez juste ce
        petit fomulaire en indiquant soit un numero de t&eacute;l&eacute;phone,
        soit une adresse mail o&ugrave; l'on peut vous joindre, ainsi que votre
        question, et nous t&acirc;cherons d'y r&eacute;pondre au plus vite.
    </p>
    </div>

    <div class="contact_adresse">
        <p>
            Adresse de la MTB
        </p>
        <p>
            Maison du Tourisme<br />
            9 place Emile BLONDEAU<br />
            89210 Brienon / Armançon<br />
            tel : 03&nbsp;86&nbsp;43&nbsp;03&nbsp;36
        </p>
    </div> <!-- fin div adresse -->

    <div class="formulaire_contact">
        <form method="post" action="traitement_contact.php">
            <fieldset>
                <legend>Formulaire de contact</legend>
                <p>
                    <label for="email">Votre e-mail ou numero de t&eacute;l&eacute;phone :</label><br />
                    <input type="text" name="email" id="email" size="38" maxlength="50" />
                </p>

                <p>
                    <label for="sujet">Sujet du message</label><br />
                    <select name="sujet" id="sujet">
                        <option value="none">Choisissez le sujet</option>
                        <option value="organisation">Question sur l'organisation</option>
                        <option value="technique">Question technique</option>
                        <option value="proposition_tools">Une proposition pour la section "tools"</option>
                        <option value="autre">Autres demandes</option>
                    </select>
                </p>
                <p>
                    <label for="message">Votre message :</label><br />
                    <textarea name="message" id="message" cols="50" rows="10"></textarea>
                </p>
                <p class="envoi">
                    <input type="submit" value="Envoyer" name="envoyer" id="envoyer" />
                </p>
            </fieldset>
        </form>
    </div>

    <div class="footer"></div>
</div> <!-- Fin div class corps -->
</div> <!-- Fin div class conteneur -->

</body>

</html>