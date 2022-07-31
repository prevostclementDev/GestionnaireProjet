<?php

    @require_once $_SERVER['DOCUMENT_ROOT']."/__site/__fromscratch/GestionnaireProjet/app/config.php";
    @require_once $_SERVER['DOCUMENT_ROOT']."/__site/__fromscratch/GestionnaireProjet/app/fonction/class.action.php";
    @require_once $_SERVER['DOCUMENT_ROOT']."/__site/__fromscratch/GestionnaireProjet/app/fonction/class.projet.php";
        
    $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);

    if ( isset($_GET["slug"])  && gestionnaireAction::projet_exist($_GET["slug"],$cursor)  ){

        $projet = new projet($cursor,$_GET["slug"]);

        $update = gestionnaireAction::update_option( 'recentlyView' , $_GET['slug'] , $cursor , 10 );

    } else {

        $projet = new projet($cursor);

    }

    // ADD INTO LIST OF 10 LAST VIEW