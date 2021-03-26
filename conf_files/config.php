<?php

/*------ Mode Maintenance ------*/

$maintance = 0;

if ($maintance == 1) {
    echo "L'admin fait des grosses mise à jour ! \n Site dispo prochainement";
    exit ();
}

/*------ Variables importantes ------*/

$available_places = 60;

// Date de la LAN sous la forme ("heure,minute,seconde,mois,jour,année")
$event_timestamp = mktime(17,30,0,2,13,2010);

$adresse_contact = "julien.tessieau@gmail.com";

/*------ Fonctions utiles ------*/

function connection_sql() {
    $connection = mysql_connect("localhost","database","password");
    mysql_select_db("database",$connection);
}

function deconnection_sql() {
    mysql_close($connection);
}

?>