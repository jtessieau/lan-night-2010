<?php include("conf_files/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>

    <title>Lan night - Brienon Sur Arman&ccedil;on - Inscriptions</title>
  <meta http-equiv="Content-Type" content="text/html ; charset=iso-8859-1" />

  <link rel="stylesheet" media="screen" type="text/css" title="Design Officiel" href="stylesheet/main.css" />
  <link rel="shortcut icon" media="screen" type="image/png" href="pictures/favicon.png" />

</head>

<body>

<div class="header"></div>

<div class="conteneur">

<?php include("menu_horizontal.php"); ?>

<div class="corps">
    <div class="introduction_inscription">
    <p>
        Vous &ecirc;tes sur le point de vous inscrire pour participer &agrave; la
        LAN NIGHT &eacute;dition 2010.
        Il reste encore
        <?php
            include("scripts/remaining_places.php");
            echo remaining_places($available_places);
        ?>
        places.
        L'inscription sera validée UNIQUEMENT sous ces conditions :
    </p>
    <ul>
        <li>r&eacute;ception du paiement de 5 euros (cf. <a href="infos.php">infos</a>)</li>
        <li>Signature du r&egrave;glement int&eacute;rieur</li>
        <li>Remise l'autorisation parentale sign&eacute; (si besoin)</li>
        <li>Pr&eacute;sentation de la pi&egrave;ce d'identit&eacute; du participant</li>
    </ul>

    <p>
        Les documents sont disponible &agrave; la Maison du Tourisme Brienonais
        (adresse sur <a href="contact.php" title="Nous contacter">cette page</a>).
        La secretaire pourra également prendre votre paiement.
    </p>

    <p>
        Ces formalit&eacute;s pourront &ecirc;tre r&eacute;alis&eacute;es le jour
        de la LAN NIGHT. Mais votre place ne sera pas r&eacute;serv&eacute;e.
    </p>

    <p class="mise_a_jour">
        ATTENTION : Les documents &agrave; remplir au MTB ne seront disponible
        que le 08/01/2010. Merci de votre compr&eacute;hention.
    </p>

    <p>
        Conformément &agrave; la loi "Informatique et Libert&eacute;s" N° 78-17
        du 6 Janvier 1978 , vous b&eacute;n&eacute;ficiez d'un droit d'acc&egrave;s,
        de rectification et d'opposition sur vos donn&eacute;es personnelles
        que vous pouvez exercer en nous contactant
        gr&acirc;ce &agrave; <a href="contact.php" title="Nous contacter">cette page</a>.
    </p>
    <p>
        Celles-ci ne seront ni transmises, ni utilis&eacute;es pour
        d'autres fins que l'organisation de la LAN NIGHT.
    </p>
</div> <!-- fin de la div Introduction Inscription -->

<?php
    // Traitement du retour si formulaire non comforme

    function inscription_value($var) {
        if ($_POST["retour"] != NULL) {
            $value = $_POST[$var];
        }
        else {
            $value = "";
        }
        echo $value;
    }

?>

<div class="inscription_illustration">
    <img src="pictures/inscription_illustration.jpg" alt="Photo lan night 2009" />
</div>

<div class="formulaire_inscription">
    <form method="post" action="traitement_inscription.php">
        <fieldset>
            <legend>Formulaire d'inscription</legend>
            <p>
                <label for="nom_de_famille">Nom de famille* : </label>
                <input type="text" name="nom_de_famille" id="nom_de_famille" size="50" maxlength="50" value="<?php inscription_value("nom_de_famille"); ?>" />
            </p>
            <p>
                <label for="prenom">Pr&eacute;nom* : </label>
                <input type="text" name="prenom" id="prenom" size="50" maxlength="50" value="<?php inscription_value("prenom"); ?>" />
            </p>
            <p>
                <label for="jour">Date de naissance* :</label>
                <input type="text" name="jour" id="jour" size="2" maxlength="2" value="<?php inscription_value("jour"); ?>" /> /
                <input type="text" name="mois" id="mois" size="2" maxlength="2" value="<?php inscription_value("mois"); ?>" /> /
                <input type="text" name="annee" id="annee" size="4" maxlength="4" value="<?php inscription_value("annee"); ?>" />
                &nbsp;&nbsp;&nbsp;&nbsp;(JJ/MM/AAAA)
            </p>
            <p>
                <label for="adresse">Adresse* : </label>
                <input type="text" name="adresse" id="adresse" size="50" maxlength="50" value="<?php inscription_value("adresse"); ?>" />
            </p>
            <p>
                <label for="code_postal">Code postal* : </label>
                <input type="text" name="code_postal" id="code_postal" size="5" maxlength="5" value="<?php inscription_value("code_postal"); ?>" />
            </p>
            <p>
                <label for="ville">Ville* : </label>
                <input type="text" name="ville" id="ville" size="50" maxlength="50" value="<?php inscription_value("ville"); ?>" />
            </p>
            <p>
                <label for="email">E-mail* : </label>
                <input type="text" name="email" id="email" size="50" maxlength="50" value="<?php inscription_value("email"); ?>" />
            </p>
            <p>
                <label for="telephone">T&eacute;l&eacute;phone : </label>
                <input type="text" name="telephone" id="telephone" size="10" maxlength="10" value="<?php inscription_value("telephone"); ?>" />
            </p>
            <p class="checkbox">
                <input type="radio" name="cable" value="cable_ok" id="cable_ok" <?php if ($_POST["cable"] == "cable_ok" ) { echo "checked = \"checked\"";} ?> />
                <label for="cable_ok">Je poss&egrave;de un cable r&eacute;seau d'au moins 5m que je ram&egrave;nerai.</label>
            </p>
            <p class="checkbox">
                <input type="radio" name="cable" value="cable_needed" id="cable_needed" <?php if ($_POST["cable"] == "cable_needed" ) { echo "checked = \"checked\"";} ?> />
                <label for="cable_needed">Je n'ai pas de tel cable, je souhaiterai que l'on m'en pr&ecirc;te un.</label>
            </p>
        <p class="envoi">
            <input type="submit" value="Envoyer" name="envoyer" id="envoyer" />
        </p>
        </fieldset> <!-- Fin du fieldset informations personnelles -->
    </form>
</div> <!-- Fin de la div formulaireInscription -->

<div class="footer"></div>
</div> <!-- Fin div class corps -->
</div> <!-- Fin div class conteneur -->

</body>

</html>