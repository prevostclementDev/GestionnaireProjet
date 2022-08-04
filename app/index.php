<?php

    @require_once "config.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= baseUrl ?>
    <link rel="stylesheet" href="assets/production/style/style-min.css">
    <script src="https://kit.fontawesome.com/5c16673c29.js" crossorigin="anonymous"></script>

    <title>Gestionnaire projets | accueil</title>
</head>
    <body>

        <header id="header">
            <!-- AJAX CONTENT -->
        </header>

        <main id="page-content">
            <!-- AJAX CONTENT -->
        </main>

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

                        <button id='validation'>Valider</button>
                        <button id='annulation'>Annuler</button>

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

        </div>
        
        <script src="assets/production/js/actionOpenMenu-min.js"></script>
        <script src="assets/production/js/script.navigation-min.js"></script>
        <script src="assets/production/js/main-min.js"></script>
    </body>
</html>