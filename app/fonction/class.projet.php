<?php
    class projet {

        
        private object $bdd;

        public $slug;
        public string $name;
        public string $startDate;
        public string $endDate;

        public object $diffDate;
        public string $htmlDiff;
        
        public string $categorie;
        public string $description;
        public string $owner;
        public string $state;
        public array $list_task = [];

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

            if ( $this->endDate != "" && $this->state == '0' ) {

                $this->setDiffDate();

            } else if ( $this->state == '1' ) {

                $this->htmlDiff = '<h3 style="color : #D5573B;">PROJET TERMINÉ<h3>';

            } else {

                $this->htmlDiff = "";

            }

            $this->getList();

            return true;

        }

        private function setDiffDate(){

            $firstDate = new dateTime(date('Y-m-d'));
            $secondDate = new dateTime($this->endDate);

            $this->diffDate = $firstDate->diff($secondDate);

            if ( $firstDate > $secondDate ) {

                $this->htmlDiff = '<h3 style="color : red;">Délai dépassé de : '.$this->diffDate->days.' j</h3>';

            } else {

                $this->htmlDiff = "<h3>Délai restant : ".$this->diffDate->days."j</h3>";

            }

        }

        private function getList(){

            $arr_response = [];

            $listTop = $this->bdd->query("SELECT list_id,id_project,list_name
                                        FROM listtask_top 
                                        WHERE id_project = '$this->slug';");

            if ($this->bdd->errorInfo()[2] == null) {
        
                while($value = $listTop->fetch(PDO::FETCH_ASSOC)) {

                    $arr_response[$value["list_id"]] = $value;
                    $arr_response[$value["list_id"]]['task'] = array();

                    $task = $this->bdd->query("SELECT task_id,task_name,task_desc,task_state,task_user
                                                  FROM task_list 
                                                  WHERE id_list = '".$value["list_id"]."';");

                    if ($this->bdd->errorInfo()[2] == null) {

                        while($valueTask = $task->fetch(PDO::FETCH_ASSOC)) {

                            array_push($arr_response[$value["list_id"]]['task'] , $valueTask);

                        }

                    } else {

                        return false;

                    }

                }

                $this->list_task = $arr_response;
                return true;

            } else {

                return false;

            }

        }

    }