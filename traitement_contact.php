<?php include("conf_files/config.php"); ?>

<?php
$label = array(
    "email",
    "sujet",
    "message",
);

$url = "http://".$_SERVER['HTTP_HOST'];
$delai = 5;

// On verifie que les champs sont rempli

$j = 0;

for ($i = 0;$i < count($label); $i++) {
    if ($_POST[$label[$i]]==NULL) {
        $champ_formulaire_contact_null[$j] = $label[$i];
        $j++;
    }
}

// Si tout est ok on enregistre

if ($champ_formulaire_contact_null == NULL){

    // On envoie l'email

    $message = $_POST['email']." a ecrit ".$_POST['message'];

    mail($adresse_contact,$_POST['sujet'] , $message);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>

    <title>Lan night - Brienon Sur Arman&ccedil;on - Contact</title>
    <meta http-equiv="Content-Type" content="text/html ; charset=iso-8859-1" />
    <?php
        if ($champ_formulaire_contact_null == NULL){
            echo "<meta http-equiv=\"refresh\" content=\"".$delai.";url=".$url."\" />";
        }
    ?>

    <link rel="stylesheet" media="screen" type="text/css" title="Design Officiel" href="stylesheet/main.css" />
    <link rel="shortcut icon" media="screen" type="image/png" href="pictures/favicon.png" />

</head>

<body>

<div class="header"></div>

<div class="conteneur">

<?php include("menu_horizontal.php"); ?>

<div class="corps">
<?php

// Si tout est ok on enregistre

if ($champ_formulaire_contact_null == NULL){

    echo "<p>Votre message a bien &eacute;t&eacute; transmis.</p>";

    echo "<p>Nous t&acirc;cherons de vous r&eacute;pondre sous peu.</p>";
    echo "<p> Vous allez &ecirc;tre redirig&eacute; dans ".$delai."s.</p>";

    exit();
}

// Sinon, retour au formulaire

else {
    echo "FORMULAIRE NON VALIDE<br />";
    echo "VEUILLEZ RENSEIGNER CORRECTEMENT TOUS LES CHAMPS !";
    echo "<form method=\"post\" action=\"contact.php\"> \n";

    for ($i = 0;$i < count($label); $i++) {
        echo "<input type=\"hidden\" name=\"".$label[$i]."\" value=\"".$_POST[$label[$i]]."\" /> \n";
    }

    echo "<input type=\"submit\" value=\"Retourner au formulaire\" name=\"retour\" id=\"retour\" /> \n";
    echo "</form>";

}
?>

    <div class="footer"></div>
</div> <!-- Fin div class corps -->
</div> <!-- Fin div class conteneur -->
</body>

</html>