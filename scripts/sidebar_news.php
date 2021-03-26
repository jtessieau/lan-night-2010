<?php

function afficher_news() {
    connection_sql();

    $requete = mysql_query("SELECT * FROM sidebar_news ORDER BY timestamp DESC LIMIT 0,3");

    $starting_news = 1;

    while ($donnees = mysql_fetch_array($requete)) {

        if ($starting_news != 1) {
            echo "<div class=\"sidebar_news_separateur\"></div>\n";
        }

        echo "<div class=\"sidebar_news_title\">\n";
        echo date("d.m.y H\<\s\m\a\l\l\>i\<\/\s\m\a\l\l\>",$donnees['timestamp']);
        echo " par ".$donnees['auteur']."\n";
        echo "</div>\n";

        echo "<div class=\"sidebar_news_content\">\n";
        echo $donnees['content'];
        echo "</div>\n";

        $starting_news = 0;

    }

    deconnection_sql();
}