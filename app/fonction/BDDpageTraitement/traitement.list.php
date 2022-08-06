<?php

    require_once("../config.php");
    require_once('../fonction/class.action.php');

    /* CREATE BDD INSTANCE */
    $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);

    /* GET TYPE OF LIST */
    $pageType = $_GET['type'];

    /* MAKE BASE REQUEST */
    $request = "SELECT project_slug,project_name,project_owner,project_state FROM projet_list WHERE project_state=";

    /* INIT RESPONSE */
    $arr_response = [];


    if ( $pageType == "now" ) {

        $request .= "0";

    } else if ( $pageType == "finish" ) {

        $request .= "1";

    } else  if ( $pageType == "recently" ) {

        $option = gestionnaireAction::getOptionValue( "recentlyView" , $cursor );

        $in = '';

        foreach( array_unique($option[0]) as $value ) {

            $in .= '"'.$value.'",';

        }

        $request = 'SELECT project_slug,project_name,project_owner,project_state
                    FROM projet_list 
                    WHERE project_slug 
                    IN('.substr($in,0,-1).')
                    ORDER BY FIELD(project_slug,'.substr($in,0,-1).');
                    ';

    } else {

        header('Location: page/404.php');
        exit();

    }

    /* ACTIVE REQUEST */
    $selection = $cursor->query($request);

    if ($cursor->errorInfo()[2] == null) {

        while($value = $selection->fetch(PDO::FETCH_ASSOC)) {

            $selectTask = 'SELECT task_state FROM task_list WHERE id_list IN(SELECT list_id FROM listtask_top WHERE id_project = "'.$value['project_slug'].'");';

            $taskSelection = $cursor->query($selectTask);

            $finishTask = 0;
            $unfinishTask = 0;

            if ($cursor->errorInfo()[2] == null) {

                while( $taskState = $taskSelection->fetch(PDO::FETCH_ASSOC) ) {

                    if ( $taskState['task_state'] == "1" ) {

                        $finishTask += 1;

                    } else {

                        $unfinishTask += 1;                        

                    }

                }

                $value['taskState'] = array(
                    "finish" => $finishTask,
                    "total" => $unfinishTask+$finishTask,
                    "pourcent" => round((100*$finishTask)/($finishTask+$unfinishTask))
                );

                array_push($arr_response,$value);

            } 

        }

        $selection = true;
        
    } else {

        $selection = false;

    }