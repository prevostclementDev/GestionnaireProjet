<?php

    require_once "../config.php";

    if ( isset($_SERVER["HTTP_AJAXACTION"]) ) {

        $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);
        
        if ( $_SERVER["HTTP_AJAXACTION"] == 'addproject' ) {

            $action = add_project($cursor,
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

    function add_project(object $dbCursor, string $name, string $startDate, string $endDate,string $categorie,string $description, string $owner) : array {

         $requete = 'INSERT INTO projet_list (project_slug,project_name,project_StartDate,project_EnDate,project_categorie,project_description,project_owner,project_state) 
                    VALUES 
                    ("'.slugify($name).'","'.$name.'","'.$startDate.'","'.$endDate.'","'.$categorie.'","'.$description.'","'.$owner.'",0);';
        
        $insert = $dbCursor->exec($requete);
        if ($dbCursor->errorInfo()[2] == null) {
            return array(true,$requete);
        }else {
            return array(false,$requete,$dbCursor->errorInfo());
        }

    }

    function slugify($string){

        $slug = trim($string); // space first and last character

        $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );
        
        $slug= str_replace(' ','-', $slug);

        $slug= strtolower($slug);

        return $slug;
       }