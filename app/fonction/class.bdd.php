<?php

    class gestionBDD {

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

    }