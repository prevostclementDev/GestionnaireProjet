<?php

    require_once("../config.php");
    require_once('../fonction/class.action.php');
    require_once('../fonction/class.projet.php');

    $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);

    if ( isset($_GET["slug"])  && gestionnaireAction::projet_exist($_GET["slug"],$cursor)  ){

        $projet = new projet($cursor,$_GET["slug"]);

        $update = gestionnaireAction::update_option( 'recentlyView' , $_GET['slug'] , $cursor , 10 );

    } else {

        header('Location: ../page/404.php');
        exit();

    }