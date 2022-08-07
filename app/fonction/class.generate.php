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

        public static function generateAccueil($degProject,$degTask,$projectFiveList) {

            $returnContent = '';

            $returnContent .= '<div class="list-recentlyView">

            <h2>Dernier(s) projet(s)</h2>

            <div class="container-list">';

            if ( empty($projectFiveList) ) {

                $returnContent.='<h3>Pas de projet</h3>';

            } else {
                
                foreach( $projectFiveList as $projet ) {

                    $returnContent.='

                    <div class="projet">
    
                        <h2>'.$projet['project_name'].'</h2>
    
                        <a href="'.$projet['project_slug'].'">Voir</a>
    
                    </div>
    
                    ';

                }

            }

            $returnContent .= '</div>

                </div>

                <div class="firststat stat">

                    <div class="statInfo">
                        <div id=camenberProjet style="';
                        
                        if ( $degProject['Finish'] > 0 && $degProject['UnFinish'] > 0 ) {

                            $returnContent .='background-image: conic-gradient(#16302b '.$degProject['Finish'].'deg, #85b79d70 0 '.$degProject['UnFinish'].'deg);';

                        } else {

                            $returnContent .='background-image: conic-gradient(#16302b 0deg, #85b79d30 0 360deg);';

                        }
                        
                        $returnContent .='"></div>
                        <div class="initule">
                        
                            <span class="firstCat">
                            
                                Projet(s) non fini(s)

                            </span>

                            <span class="SecondCat">
                            
                                Projet(s) fini(s)

                            </span>

                        </div>
                    </div>
                

                </div>

                <div class="Secondstat stat">

                    <div class="statInfo">
                        <div id=camenberProjet style="';
                        
                        if ( $degTask['Finish'] > 0 && $degTask['UnFinish'] > 0 ) {

                            $returnContent .='background-image: conic-gradient(#16302b '.$degTask['Finish'].'deg, #85b79d70 0 '.$degTask['UnFinish'].'deg);';

                        } else {

                            $returnContent .='background-image: conic-gradient(#16302b 0deg, #85b79d30 0 360deg);';

                        }

                        
                        $returnContent .='"></div>
                        <div class="initule">
                        
                        <span class="firstCat">
                        
                            Tache(s) non fini(s)

                        </span>

                        <span class="SecondCat">
                        
                            Tache(s) fini(s)

                        </span>

                        </div>
                    </div>

                </div>
            ';

            return $returnContent;

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

                <h2>'.$projet['project_name'].'</h2>';

                if ( $projet['project_state'] == "1" ) {

                    $pageList .= '<div class="projectPourcentView">
                    <div class="pourcentBar"><span style="width: 100%;"></span></div>
                    <h4>100%</h4>
                </div>';

                } else {

                    $pageList .= '<div class="projectPourcentView">
                    <div class="pourcentBar"><span style="width: '.$projet['taskState']['pourcent'].'%;"></span></div>
                    <h4>'.$projet['taskState']['pourcent'].'%</h4>
                </div>

                <h4> '.$projet['taskState']['finish'].' tâches sur '.$projet['taskState']['total'].' réalisées </h4>';

                }

                $pageList .='<h4> Propriétaire : '.$projet['project_owner'].' </h4> <a href="'.$projet['project_slug'].'">Voir</a>

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
        
                            '.$projet->htmlDiff;

                if ( $projet->state == "1" ) {

                    $returnContent .= '
                    </div>
        
                    <div class="projectPourcentView">
                        <div class="pourcentBar"><span style="width: 100%;"></span></div>
                        <h4>100%</h4>
                    </div>
    
                    <div class="description"><p>'.$projet->description.'</p></div><h5>Géré par : <span>'.$projet->owner.'</span></h5>

                    </div>
                    <div class="actionAbout">
    
                        <div class="projectAction">
    
                            <button attr_slug="'.$projet->slug.'" id="deleteProject">Supprimez le projet</button>
    
                        </div>
    
                    </div>
    
                    </div>
                    
                    <div class="taskProject">

                    <div class="projectList">

                    ';

                } else {

                    $returnContent .=  '
                        </div>
            
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: '.strval($projet->pourcentProgression).'%;"></span></div>
                            <h4>'.strval($projet->pourcentProgression).'%</h4>
                        </div>
        
                        <div class="description"><p>'.$projet->description.'</p></div><h5>Géré par : <span>'.$projet->owner.'</span></h5>

                        </div>
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

                                $returnContent.='<h2>'.$task['task_name'].'</h2>';

                            } else {

                                $returnContent.='<h2>'.$task['task_name'].' (Validé) </h2>';

                            }          

                            $returnContent.='<p class="desc">'.$task['task_desc'].'</p>
                                <p class="assign">Assigner à : '.$task['task_user'].'</p>
                            </div>

                            <div class="actionAbout">';

                            if ( $projet->state == "0" ) {

                                $returnContent.='<button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" id_task="'.$task['task_id'].'" class="deleteTask">Supprimez</button>';

                                if ( $task['task_state'] == "0" ) {

                                    $returnContent.='<button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" id_task="'.$task['task_id'].'" class="valideTask"> Valider</button>';

                                } else {

                                    $returnContent.='<button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" id_task="'.$task['task_id'].'" class="unvalideTask"> Invalider</button>';

                                }

                            }

                            $returnContent.='</div></div>';

                        }

                        $returnContent.='</div>
                        <div class="addTask">';

                        if ($projet->state == "0") {

                            $returnContent.='<button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" class="addTaskIn" >Ajout une tache</button>
                            <button project_slug="'.$projet->slug.'" id_list="'.$list['list_id'].'" id="RemoveList" >Supprimer la liste</button>';

                        }

                        $returnContent.='</div>
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