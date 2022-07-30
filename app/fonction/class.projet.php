<?php
    class projet {

        private $slug;
        private object $bdd;

        public string $name;
        public string $startDate;
        public string $endDate;
        public string $categorie;
        public string $description;
        public string $owner;
        public string $state;

        public bool $state_object;

        public function __construct($bddCursor,$slug = false) {
            
            $this->bdd = $bddCursor;
            $this->slug = $slug;

            if ( $this->get_project() == true ) {

                $this->state_object = true;

            } else {

                $this->state_object = false;

            }

        }

        public function __get($name){
            return false;
        }

        public function __set($name, $value){
            return false;
        }

        public function get_project() : bool {

            if ( $this->slug == false ) {

                return false;

            } else {

                $arr_response = [];

                $check = $this->bdd->query("SELECT * FROM projet_list WHERE project_slug = '$this->slug' ;");
    
                if ($this->bdd->errorInfo()[2] == null) {
            
                    while($value = $check->fetch(PDO::FETCH_ASSOC)) {
    
                        array_push($arr_response,$value);
    
                    }

                    if ($this->setProject($arr_response) == true) {

                        return true;

                    } else {

                        return false;

                    }
    
                } else {

                    return false;

                }

            }

        }

        private function setProject(array $arr) {

            $this->name = $arr[0]["project_name"];
            $this->startDate = $arr[0]["project_StartDate"];
            $this->endDate = $arr[0]["project_EnDate"];
            $this->categorie = $arr[0]["project_categorie"];
            $this->description = $arr[0]["project_description"];
            $this->owner = $arr[0]["project_owner"];
            $this->state = $arr[0]["project_state"];

            return true;

        }

    }