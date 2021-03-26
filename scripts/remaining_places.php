<?php
function remaining_places ($available_places){

    connection_sql ();

    $requete = mysql_query("SELECT COUNT(*) AS reserved_places FROM inscriptions");
    $donnees = mysql_fetch_array($requete);

    $remaining_places = $available_places - $donnees['reserved_places'];

    deconnection_sql();

    return ($remaining_places);
}
?>