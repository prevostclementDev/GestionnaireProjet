<?php

    require_once "../config.php";
    require_once "class.action.php";

    if ( isset($_SERVER["HTTP_AJAXACTION"]) ) {

        $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);
        
        if ( $_SERVER["HTTP_AJAXACTION"] == 'addproject' ) {

            $action = gestionnaireAction::add_project($cursor,
                        htmlspecialchars($_POST['name']),
                        htmlspecialchars($_POST['startDate']),
                        htmlspecialchars($_POST['endDate']),
                        htmlspecialchars($_POST['categorie']),
                        htmlspecialchars($_POST['projectDesc']),
                        htmlspecialchars($_POST['projectOwner'])
                    );

            echo json_encode($action);

        }

    }