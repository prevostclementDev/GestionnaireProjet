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

            $selection = $bddCursor->query('SELECT addons_option FROM gestionnaire_addons WHERE addons_name="'.$name.'";');
            $arr_response = [];

            if ($bddCursor->errorInfo()[2] == null) {
        
                while($value = $selection->fetch(PDO::FETCH_ASSOC)) {
                    array_push($arr_response,unserialize($value['addons_option']));
                }

            } else {

                return false;

            }

            return $arr_response;

        }

        public static function update_option( string $name, string $value ,object $bddCursor, $nb_value ) : bool {

            $option = gestionnaireAction::option_exist( $name, $bddCursor );
            if ( $option != false ) {

                $option = $option[0]['addons_option'];

                if ( $option == "" ) {

                    $option = serialize($value);

                } else {

                    $option = unserialize($option);

                    if ( sizeof($option) >= $nb_value ) {

                        array_pop($option);

                    } 

                    array_unshift($option,$value);

                }

                $requete = 'UPDATE gestionnaire_addons 
                SET addons_option = "'.addslashes(serialize($option)).'"
                WHERE addons_name="'.$name.'";';

            } else {

                $requete = 'INSERT INTO gestionnaire_addons (addons_name,addons_option) 
                VALUES 
                ("'.$name.'","'.addslashes(serialize(array($value))).'");';

            }

            $insert = $bddCursor->exec($requete);
            if ($bddCursor->errorInfo()[2] == null) {
                return true;
            } else {
                var_dump($bddCursor->errorInfo());
                return false;
            }

            

        }

        public static function option_exist( string $name, object $bddCursor ) {

            $arr_response = [];

            $check = $bddCursor->query("SELECT addons_option FROM gestionnaire_addons WHERE addons_name = '$name' ;");

            if ($bddCursor->errorInfo()[2] == null) {
        
                while($value = $check->fetch(PDO::FETCH_ASSOC)) {

                    array_push($arr_response,$value);

                }

            }

            if ( sizeof($arr_response) == 1 ) {

                return $arr_response;

            } else {

                return false;

            }

        }

        /* CHECK IF PROJECT EXIST */
        public static function projet_exist(string $slug, object $bddCursor) : bool {

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
