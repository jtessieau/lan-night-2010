<?php include("conf_files/config.php"); ?>

<?php
$label = array(
    "nom_de_famille",
    "prenom",
    "jour",
    "mois",
    "annee",
    "adresse",
    "code_postal",
    "ville",
    "email",
    "telephone",
    "cable"
);

$delai = 5;
$url = "http://".$_SERVER['HTTP_HOST'];

// On verifie que les champs sont rempli

$j = 0;

for ($i = 0;$i < count($label); $i++) {
    if ($_POST[$label[$i]]==NULL AND $label[$i] != "telephone") {
        $champ_formulaire_inscription_null[$j] = $label[$i];
        $j++;
    }
}

// Si tout est ok on enregistre

if ($champ_formulaire_inscription_null == NULL){

    $value="''";
    for ($i = 0;$i < count($label); $i++) {
        $value .= ", '".$_POST[$label[$i]]."'";
    }
    $value .=", '".time()."'";

    connection_sql();
        $requete = mysql_query("SELECT * FROM inscriptions ORDER BY timestamp_inscription DESC LIMIT 0,1");
        $donnees = mysql_fetch_array($requete);
        if ($donnees["nom_de_famille"] != $_POST["nom_de_famille"] AND $donnees["prenom"] != $_POST["prenom"] AND $donnees["email"] != $_POST["email"]) {
            mysql_query("INSERT INTO inscriptions VALUE($value)");
        }
    deconnection_sql();

    // Un ptit mail pour me prevenir d'un inscrit

    $message = $_POST["nom_de_famille"]." ".$_POST["prenom"]." vient de s'inscrire avec l'adresse mail ".$POST['email'];

    mail($adresse_contact,"inscription" , $message);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>

    <title>Lan night - Brienon Sur Arman&ccedil;on - Inscriptions</title>
    <meta http-equiv="Content-Type" content="text/html ; charset=iso-8859-1" />
    <?php
        if ($champ_formulaire_inscription_null == NULL){
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
if ($champ_formulaire_inscription_null == NULL){
    echo "<p>Votre inscription a bien &eacute;t&eacute; enregistr&eacute;.</p>";
    echo "<p>Merci pour votre participation.</p>";
    echo "<p> Vous allez &ecirc;tre redirig&eacute; dans ".$delai."s.</p>";

    exit();
}

// Sinon, retour au formulaire

else {
    echo "FORMULAIRE NON VALIDE<br />";
    echo "VEUILLEZ RENSEIGNER CORRECTEMENT TOUS LES CHAMPS AVEC UN ASTERISQUE (*) !";
    echo "<form method=\"post\" action=\"inscriptions.php\"> \n";

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