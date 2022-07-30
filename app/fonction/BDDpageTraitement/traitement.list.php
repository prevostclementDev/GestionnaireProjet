<?php

    @require_once $_SERVER['DOCUMENT_ROOT']."/__site/__fromscratch/GestionnaireProjet/app/config.php";
    @require_once $_SERVER['DOCUMENT_ROOT']."/__site/__fromscratch/GestionnaireProjet/app/fonction/class.action.php";

    /* CREATE BDD INSTANCE */
    $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);

    /* GET TYPE OF LIST */
    $pageType = $_GET['type'];

    /* MAKE BASE REQUEST */
    $request = "SELECT project_slug,project_name,project_owner FROM projet_list WHERE project_state=";

    /* INIT RESPONSE */
    $arr_response = [];


    if ( $pageType == "now" ) {

        $request .= "0";

    } else if ( $pageType == "finish" ) {

        $request .= "1";

    } else {
        /* GET ONLY 10 LAST PROJECT ADD */

        $option = gestionnaireAction::getOptionValue( "recentlyView" , $cursor );
        // TRAITEMENT DE L'OPTION A FAIRE

    }

    /* ACTIVE REQUEST */
    $selection = $cursor->query($request);

    if ($cursor->errorInfo()[2] == null) {

        while($value = $selection->fetch(PDO::FETCH_ASSOC)) {
            array_push($arr_response,$value);
        }

        $selection = true;
        
    } else {

        $selection = false;

    }