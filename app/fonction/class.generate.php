<?php

    /* class to generate part of app */
    class generate_page {

        public static function get_head($base,$title) {

            return '<!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                '.$base.'
                <link rel="stylesheet" href="assets/production/style/style-min.css">
                <script src="https://kit.fontawesome.com/5c16673c29.js" crossorigin="anonymous"></script>

                <title>'.$title.'</title>
            </head>
                <body>';

        }

        public static function get_footer(){

            return '
                        <div id="returnInfo" class="error"><p>non</p><div class="close"><i class="fa-solid fa-xmark"></i></div></div>

                        <div id="add_project">
                            <i class="fa-solid fa-plus"></i>
                            <span>Ajouter un projet</span>
                        </div>

                        <div id="containerPopUp">

                            <div id="confirmationBox">

                                <div class="centerBox">
                
                                    <h2>êtes-vous sur de vouloir <span> supprimer le projet </span></h2>
                                    <div class="action">
                
                                        <button id="validation">Valider</button>
                                        <button id="annulation">Annuler</button>
                
                                    </div>
                
                                </div>
                
                            </div>

                            <div class="loader">

                                <div class="containsAnimation">
                
                                    <div class="round">
                
                                        <span class="bull bull1"></span>
                                        <span class="bull bull2"></span>
                                        <span class="bull bull3"></span>
                
                                    </div>
                
                                </div>
                
                            </div>

                            <div class="add_project_popUp">

                                <div class="containsProjectAdd">

                                    <div id="AddcloseProject">
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                    
                                    <div id="form-addProject">
                    
                                        <label for="projectName">
                                            <span>Nom du projet :</span>
                                            <input type="text" name="projectName" id="projectName" placeholder="Gestionnaire de projet">
                                        </label>
                                        
                    
                                        <div class="date">
                                            <label for="startDate">
                                                <span>Date de départ :</span>
                                                <input type="date" name="startDate" id="startDate">
                                            </label>
                                            <label for="endDate">
                                                <span>Date de fin :</span>
                                                <input type="date" name="endDate" id="endDate">
                                            </label>
                                        </div>
                    
                                        <label for="categorie">
                                            <span>catégorie(s) :</span>
                                            <input type="text" name="categorie" id="categorie" placeholder="Développement web/Marketing/HTML/CSS/">
                                        </label>
                                        
                                        <label for="projectDesc">
                                            <span>Déscription :</span>
                                            <textarea name="projectDesc" id="projectDesc" cols="30" rows="10" placeholder="gestionnaire de projet avec pour objectif..."></textarea>
                                        </label>
                                        
                                        <label for="projectOwner">
                                            <span>Propriétaire du projet</span>
                                            <input type="text" name="projectOwner" id="projectOwner" placeholder="Maxime beaujardin">
                                        </label>
                                        
                                        <input type="submit" id="submitProject" value="Ajouter un projet">

                                        <div id="response">
                            
                                        </div>
                    
                                    </div>
                    
                                </div>
                    
                            </div>

                            <div class="add_taskPopUp">

                                <div class="containstaskAdd">

                                    <div id="Addclosetask">
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                    
                                    <div id="form-addtask">
                    
                                        <label for="taskName">
                                            <span>Nom de la tâche :</span>
                                            <input type="text" name="taskName" id="taskName" placeholder="Faire le design :">
                                        </label>
                    
                                        <label for="taskdesc">
                                            <span>Description :</span>
                                            <input type="text" name="taskdesc" id="taskdesc" placeholder="completer le design sur figma...">
                                        </label>
                                        
                                        <label for="taskOwner">
                                            <span>Propriétaire de la tâche</span>
                                            <input type="text" name="taskOwner" id="taskOwner" placeholder="Maxime beaujardin">
                                        </label>
                                        
                                        <input type="submit" id="submittask" value="Ajouter la tâche">

                                        <div id="responseTask">
                            
                                        </div>
                    
                                    </div>
                    
                                </div>
                    
                            </div>

                        </div>
                        
                        
                        <script src="assets/production/js/actionOpenMenu-min.js"></script>
                        <script src="assets/production/js/script.navigation-min.js"></script>
                        <script src="assets/production/js/main-min.js"></script>
                    </body>
                </html>

            ';

        }

        public static function generateHeader(string $active = "") {

            $links = array(
                array(
                    'href' => "accueil",
                    'text' => "Accueil",
                    'class' => "accueil",
                    "icone" => '<i class="fa-solid fa-house"></i>',
                    "type" => 'noneA'
                ),
                array(
                    'href' => "projets-recently",
                    'text' => "Projet recent",
                    'class' => "view-list",
                    "icone" => '<i class="fa-solid fa-clock-rotate-left"></i>',
                    "type" => 'recently'
                ),
                array(
                    'href' => "projets-now",
                    'text' => "Projet en cours",
                    'class' => "view-list",
                    "icone" => '<i class="fa-solid fa-clock"></i>',
                    "type" => 'now'
                ),
                array(
                    'href' => "projets-finish",
                    'text' => "Projet fini",
                    'class' => "view-list",
                    "icone" => '<i class="fa-solid fa-calendar-check"></i>',
                    "type" => 'finish'
                ),
                array(
                    'href' => "search",
                    'text' => "Recherche",
                    'class' => "searchPage",
                    "icone" => '<i class="fa-solid fa-magnifying-glass"></i>',
                    "type" => 'noneS'
                ),
            );

            $header = '
            <div class="topVisibleHeader">

                <div class="containsTitle">

                    <h1>Gestionnaire de projet</h1>
                    <h2>'.date("d/m/Y").'</h2>

                </div>

            </div>

            <nav id="navigationHeader">

                <ul class="listMenu">
            ';

            foreach ( $links as $link ) {

                $class = "";

                if ( $active == $link["href"] ) {

                    $class = "active";

                }

                $header .= '
                <li><a class="Hlink '.$class.' '.$link["href"].'" href="'.$link["href"].'" attr_type="'.$link["type"].'" attr_class="'.$link["class"].'">
                '.$link["icone"].'
                <span>'.$link["text"].'</span>
                </a></li>
                ';

            }

            $header .= '</ul></nav>';

            return $header;

        }

        public static function generateAccueil() {
            return '

                <div class="list-recentlyView">

                <h2>Dernier(s) projet(s)</h2>

                <div class="container-list">

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>File Manager</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 60%;"></span></div>
                            <h4>60%</h4>
                        </div>

                        <h4> 6 tâches sur 10 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Portfolio</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 20%;"></span></div>
                            <h4>20%</h4>
                        </div>

                        <h4> 2 tâches sur 20 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Partiel B2 S1</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 30%;"></span></div>
                            <h4>30%</h4>
                        </div>

                        <h4> 6 tâches sur 19 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Révision PHP</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 52%;"></span></div>
                            <h4>52%</h4>
                        </div>

                        <h4> 6 tâches sur 13 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                </div>

                </div>

                <div class="statistique">

                <ul class="statList">

                    <li>
                        <div class="round-information">15</div>
                        <div class="information-about-round">Projet(s) en cours</div>
                    </li>

                    <li>
                        <div class="round-information">9</div>
                        <div class="information-about-round">Projet(s) fini(s)</div>
                    </li>

                    <li>
                        <div class="round-information">38</div>
                        <div class="information-about-round">Tâche(s) restante(s)</div>
                    </li>

                    <li>
                        <div class="round-information">128</div>
                        <div class="information-about-round">Tâche(s) fini(s)</div>
                    </li>

                </ul>

                </div>
            ';

        }

        public static function generateListPage($arrProject) {

            $pageList = '<section id="FilterBar">

                    <div class="containerItemsLeft">

                        <label for="searchProject">
                            <input type="text" name="searchProject" id="searchProject" placeholder="search by project name">
                            <button><i class="fa-solid fa-magnifying-glass"></i></button>
                        </label>

                    </div>

                </section>

                <section id="list-projet">

                <section class="containList">';

            foreach( $arrProject as $projet ) {

                $pageList .= '
                <div class="projet">

                <h2>'.$projet['project_name'].'</h2>
                <div class="projectPourcentView">
                    <div class="pourcentBar"><span style="width: 0%;"></span></div>
                    <h4>0%</h4>
                </div>

                <h4> 0 tâches sur 0 réalisées </h4>
                <h4> Propriétaire : '.$projet['project_owner'].' </h4>

                <a href="'.$projet['project_slug'].'">Voir</a>

                </div>';

            }

            $pageList .= '</section>
            </section>';

            return $pageList;
            
        }

        public static function generateSearch() {

            return'
            <div id="searchProjectPage">
                <label for="searchProject">
                    <input type="text" name="searchProject" id="searchProject" placeholder="search by project name">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </label>
            </div>
            ';

        }

        public static function generateProject(object $projet) {

            if ( $projet->state_object == false ) {

                return '<h2>Projet non existant</h2>';

            } else {

                if ( $projet->endDate == "" ) {

                    $dateEnd = "";

                } else {

                    $dateEnd = date("d/m/Y",strtotime($projet->endDate));

                }

                $returnContent = '<div class="topViewProject"><div class="information-about"><h2>'.$projet->name.'</h2>
                
                    <div class="dateInfo">
        
                            <h3>Date début : '.date("d/m/Y",strtotime($projet->startDate)).'</h3>
                            <h3>Date fin : '.$dateEnd.'</h3>
        
                            '.$projet->htmlDiff.'
        
                        </div>
        
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 0%;"></span></div>
                            <h4>0%</h4>
                        </div>
        
                        <div class="description"><p>'.$projet->description.'</p></div><h5>Géré par : <span>'.$projet->owner.'</span></h5>

                    </div>';

                if ( $projet->state == "1" ) {

                    $returnContent .= '
                    <div class="actionAbout">
    
                        <div class="projectAction">
    
                            <button attr_slug="'.$projet->slug.'" id="deleteProject">Supprimez le projet</button>
    
                        </div>
    
                    </div>
    
                    </div>';

                } else {

                    $returnContent .=  '
                        <div class="actionAbout">
        
                            <div class="projectAction">
        
                                <button id="finishProject" attr_slug="'.$projet->slug.'">Finir le projet</button>
                                <button attr_slug="'.$projet->slug.'" id="deleteProject">Supprimez le projet</button>
                                <button attr_slug="'.$projet->slug.'">Modifier les informations du projets</button>
        
                            </div>
        
                            <div class="taskAction">
        
                                <button id="add_list_btn" attr_slug="'.$projet->slug.'">Ajouter une liste de tache</button>
        
                            </div>
        
                        </div>
        
                        <div class="ajoutList" id="ajoutList-menu">
                            <input type="text" id="add_list" placeholder="nom de la nouvelle liste">
                            <button id="addListToProject" attr_slug="'.$projet->slug.'">ajouter</button>
                        </div>
        
                    </div>                 
                    
                    <div class="taskProject">

                    <div class="projectList">';

                }

                if ( sizeof($projet->list_task) == 0 ) {

                    $returnContent.='<h2> Pas de tâches </h2>';

                } else {

                    foreach( $projet->list_task as $list ) {

                        $returnContent.='<div class="taskList" listName="'.$list['list_name'].'">

                        <h2>'.utf8_encode($list['list_name']).'</h2>

                        <div class="firstContainer">';

                        foreach( $list['task'] as $task ) {

                            $returnContent.='<div class="task" state="'.$task['task_state'].'" listProperty="serverTask">
                            <div class="principeInfo">';
                                
                            if ( $task['task_state'] == "0" ) {

                                $returnContent.='<h2>'.utf8_encode($task['task_name']).'</h2>';

                            } else {

                                $returnContent.='<h2>'.utf8_encode($task['task_name']).' (Validé) </h2>';

                            }          

                            $returnContent.='<p class="desc">'.utf8_encode($task['task_desc']).'</p>
                                <p class="assign">Assigner à : '.utf8_encode($task['task_user']).'</p>
                            </div>

                            <div class="actionAbout">
                                <button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" id_task="'.$task['task_id'].'" class="deleteTask">Supprimez</button>';

                                if ( $task['task_state'] == "0" ) {

                                    $returnContent.='<button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" id_task="'.$task['task_id'].'" class="valideTask"> Valider</button>';

                                } else {

                                    $returnContent.='<button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" id_task="'.$task['task_id'].'" class="unvalideTask"> Invalider</button>';

                                }

                            $returnContent.='</div></div>';

                        }

                        $returnContent.='</div>
                        <div class="addTask">
                            <button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" class="addTaskIn" >Ajout une tache</button>
                            <button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" id="RemoveList" >Supprimer la liste</button>
                        </div>

                        </div>';

                    }
                }

                return $returnContent .'</div></div>';

            }

        }

        public static function generate404() {

            return '<h1> Erreur 404 : page non trouvée';

        }

    }