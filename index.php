<?php include("conf_files/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>

    <title>Lan night - Brienon Sur Arman&ccedil;on - Accueil</title>
  <meta http-equiv="Content-Type" content="text/html ; charset=iso-8859-1" />

  <link rel="stylesheet" media="screen" type="text/css" title="Design Officiel" href="stylesheet/main.css" />
  <link rel="shortcut icon" media="screen" type="image/png" href="pictures/favicon.png" />

</head>

<body>

<div class="header"></div>

<div class="conteneur">

<?php include("menu_horizontal.php"); ?>

<div class="corps">
    <div class="sidebar">
        <div class="sidebar_remaining_days">
            <?php
                //include("scripts/remaining_days.php");
               // echo "J - ".remaining_days($event_timestamp);
            ?>
        </div> <!-- Fin div class sidebar_remaining_days -->

        <div class="sidebar_remaining_places">
            <?php
              //  include("scripts/remaining_places.php");
                //echo remaining_places($available_places)." places restantes";
            ?>
        </div> <!-- Fin div class sidebar_remaining_places -->

        <div class="sidebar_news">
            <div class="sidebar_news_headtitle">Au Rapport</div>
            <?php
               // include("scripts/sidebar_news.php");
               // afficher_news();
            ?>
        </div> <!-- Fin div class sidebar_news -->
    </div>

    <div class="mot_accueil">
        <p>
            A l'intention du <i>gamer</i> qui sommeil en toi.
        </p>

        <p>
            Suite au succ&egrave;s rencontr&eacute; l'an pass&eacute; par la
            premi&egrave;re &eacute;dition de la nuit du jeu en r&eacute;seau,
            la section &#171;&nbsp;<i>Informatique</i>&nbsp;&#187; de la Sentinelle a reprit le
            flambeau pour mettre en place la <strong>LAN&nbsp;NIGHT&nbsp;&Eacute;dition&nbsp;2010</strong>.
        </p>
        <p>
            L'instant d'une nuit, rejoint d'autres <i>gamers</i> (passionn&eacute;s ou
            d�butants) dans des parties multi-joueurs jouissives. Pas de
            comp&eacute;tition, juste le plaisir de jouer, et l'ambiance du r�seau local.
        </p>
        <p>
            Si tu as encore des points &agrave; &eacute;claircir, rend toi sur la page
            <a href="infos.php">infos</a>. La plupart de tes doutes y seront
            lev&eacute;s.
        </p>
        <p>
            Si au contraire, tu sais tous ce qu'il y a &agrave; savoir et que tu veux
            participer, rends toi sur la page <a href="inscriptions.php">inscriptions</a>
            afin de r&eacute;server ta place pour cette nuit unique.
        </p>
        <p class = "mot_accueil_signature">
            Julien alias <b>$&kappa;&yen;</b>
        </p>
    </div> <!-- Fin class mot accueil -->
    <div class="footer"></div>
</div> <!-- Fin div class corps -->
</div> <!-- Fin div class conteneur -->

</body>

</html>