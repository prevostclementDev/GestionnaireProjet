<?php

    /* ACTION ON BDD */
    class gestionnaireAction {

        /* ADD PROJECT FONCTION */
        public static function add_project(object $dbCursor, string $name, string $startDate, string $endDate,string $categorie,string $description, string $owner) : array {

                $requete = 'INSERT INTO projet_list (project_slug,project_name,project_StartDate,project_EnDate,project_categorie,project_description,project_owner,project_state) 
                        VALUES 
                        ("'.gestionnaireAction::slugify($name).'","'.$name.'","'.$startDate.'","'.$endDate.'","'.$categorie.'","'.$description.'","'.$owner.'",0);';
            
            $insert = $dbCursor->exec($requete);
            if ($dbCursor->errorInfo()[2] == null) {
                return array(true,$requete);
            }else {
                return array(false,$requete,$dbCursor->errorInfo());
            }
    
        }

        /* TO -> AVIABLE LINK */
        public static function slugify($string){

            $slug = trim($string); // space first and last character
    
            $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );
            
            $slug= str_replace(' ','-', $slug);
    
            $slug= strtolower($slug);
    
            return $slug;
        }

        /* GET OPTION IN TALBE GESTIONNAIRE_ADDONS */
        public static function getOptionValue ( string $name, object $bddCursor ) {

            $selection = $bddCursor->exec("SELECT addons_option FROM gestionnaire_addons WHERE addons_name=".$name);
            $arr_response = [];

            if ($bddCursor->errorInfo()[2] == null) {
        
                while($value = $selection->fetch(PDO::FETCH_ASSOC)) {
                    array_push($arr_response,unserialize($value));
                }
            }

            return $arr_response;

        }

        public static function projet_exist(string $slug, object $bddCursor) {

            $arr_response = [];

            $check = $bddCursor->query("SELECT project_name FROM projet_list WHERE project_slug = '$slug' ;");

            if ($bddCursor->errorInfo()[2] == null) {
        
                while($value = $check->fetch(PDO::FETCH_ASSOC)) {

                    array_push($arr_response,$value);

                }

            }

            if ( sizeof($arr_response) == 1 ) {

                return true;

            } else {

                return false;

            }

        }

    }
