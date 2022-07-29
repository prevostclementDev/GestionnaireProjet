<?php

    @require_once $_SERVER['DOCUMENT_ROOT']."/__site/__fromscratch/GestionnaireProjet/app/config.php";
    @require_once $_SERVER['DOCUMENT_ROOT']."/__site/__fromscratch/GestionnaireProjet/app/fonction/class.bdd.php";
    $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);

    $pageType = $_GET['type'];

    $request = "SELECT project_slug,project_name,project_owner FROM projet_list WHERE project_state=";

    $arr_response = [];

    if ( $pageType == "now" ) {

        $request .= "0";

    } else if ( $pageType == "finish" ) {

        $request .= "1";

    } else {

        $option = gestionBDD::getOptionValue( "recentlyView" , $cursor );

        // TRAITEMENT DE L'OPTION A FAIRE

    }

    $selection = $cursor->query($request);

    if ($cursor->errorInfo()[2] == null) {

        while($value = $selection->fetch(PDO::FETCH_ASSOC)) {
            array_push($arr_response,$value);
        }

        $selection = true;
        
    } else {

        $selection = false;

    }