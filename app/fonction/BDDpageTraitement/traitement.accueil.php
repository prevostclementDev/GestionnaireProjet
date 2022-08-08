<?php

    @require_once "../config.php";

    $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);

    $requestProject = 'SELECT * FROM projet_list';
    $requestTask = 'SELECT task_state FROM task_list';

    /* PROJECT EXECUTION */
    $projectFiveList = array();

    $projectFinish = 0;
    $projectUnfinish = 0;

    $execProject = $cursor->query($requestProject);

    if ( $cursor->errorInfo()[2] == null ) {

        while ( $project = $execProject->fetch(PDO::FETCH_ASSOC) ) {

            if ( sizeof($projectFiveList) <= 5 ) {

                array_push($projectFiveList,$project);

            }

            if ( $project['project_state'] == "1" ) {

                $projectFinish += 1;

            } else {

                $projectUnfinish +=1;

            }

            

        }

    }

    /* TASK EXECUTION */
    $taskFinish = 0;
    $taskUnfinish = 0;

    $execTask = $cursor->query($requestTask);
    if ( $cursor->errorInfo()[2] == null ) {

        while ( $task = $execTask->fetch(PDO::FETCH_ASSOC) ) {

            if ( $task['task_state'] == "1" ) {

                $taskFinish += 1;

            } else {

                $taskUnfinish +=1;

            }

        }

    }
    
    $totalProject = $projectFinish + $projectUnfinish;
    $degProject = array(
        "Finish" => ( 360 * ( ( 100 * $projectFinish ) / $totalProject ) ) / 100,
        "UnFinish" => ( 360 * ( ( 100 * $projectUnfinish ) / $totalProject ) ) / 100
    );

    $totalTask = $taskFinish + $taskUnfinish;
    $degTask = array(
        "Finish" => ( 360 * ( ( 100 * $taskFinish ) / $totalTask ) ) / 100,
        "UnFinish" => ( 360 * ( ( 100 * $taskUnfinish ) / $totalTask ) ) / 100
    );

    $cursor = false;