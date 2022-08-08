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

        } else if ( $_SERVER["HTTP_AJAXACTION"] == 'finishProject' ) {

            $action = gestionnaireAction::finish_project($cursor, $_POST['delete']);
            
            if ($action[0] == true) {

                echo json_encode("true");

            } else {

                echo json_encode('false');

            }
            
        } else if ( $_SERVER["HTTP_AJAXACTION"] == 'deleteProject' ) {

            $action = gestionnaireAction::delete_project($cursor, $_POST['delete']);
            
            if ($action[0] == true) {

                echo json_encode("true");

            } else {

                echo json_encode('false');

            }

        } else if ( $_SERVER["HTTP_AJAXACTION"] == 'addList' ) {

            $action = gestionnaireAction::addList($cursor,$_POST['slug'],$_POST['listName']);

            if( $action[0] == true ) {

                echo json_encode('true');

            } else {

                echo json_encode('false');

            }

        } else if ( $_SERVER["HTTP_AJAXACTION"] == 'deleteList' ) {
            
            $action = gestionnaireAction::removeList($cursor,$_POST['id_list']);

            if( $action[0] == true ) {

                echo json_encode('true');

            } else {

                echo json_encode('false');

            }

        } else if ( $_SERVER["HTTP_AJAXACTION"] == 'addTask' ) {

            $action = gestionnaireAction::addTask($cursor,$_POST['id_list'],$_POST['taskname'],$_POST['taskdesc'],$_POST['taskowner']);

            if( $action[0] == true ) {

                echo json_encode('true');

            } else {

                echo json_encode('false');

            }

        } else if ( $_SERVER["HTTP_AJAXACTION"] == 'finishTask' ) {

            $action = gestionnaireAction::finishTask($cursor,$_POST['id_task']);

            if( $action[0] == true ) {

                echo json_encode('true');

            } else {

                echo json_encode('false');

            }

        } else if ( $_SERVER["HTTP_AJAXACTION"] == 'unfinishTask' ) {

            $action = gestionnaireAction::unfinishTask($cursor,$_POST['id_task']);

            if( $action[0] == true ) {

                echo json_encode('true');

            } else {

                echo json_encode('false');

            }

        } else if ( $_SERVER["HTTP_AJAXACTION"] == 'deleteTask' ) {

            $action = gestionnaireAction::deleteTask($cursor,$_POST['id_task']);

            if( $action[0] == true ) {

                echo json_encode('true');

            } else {

                echo json_encode('false');

            }

        }

    } else {

        echo "Hello ;) what are you doing ?";

    }

    $cursor = false;