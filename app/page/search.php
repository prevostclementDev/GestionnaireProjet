<?php

    @require_once "../config.php";
    @require_once "../fonction/class.projet.php";

    if ( isset($_SERVER['HTTP_AJAXREQUESTSERVER']))  {

            echo json_encode(
                array(
                    generate_page::generateSearch(),
                )
            );

    } else {

        ?>
        
        <?= generate_page::get_head(baseUrl,"Gestionnaire projets | recherche") ?>

                    <header id="header">

                        <?= generate_page::generateHeader("search") ?>

                    </header>

                    <main id="page-content" class="searchPage">   

                        <?= generate_page::generateSearch() ?>

                    </main>

                    <div id="add_project">
                        <i class="fa-solid fa-plus"></i>
                        <span>Ajouter un projet</span>
                    </div>

                    <div id="containerPopUp">

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
                                        <input type="text" name="categorie" id="categorie" placeholder="Développement web - Marketing - HTML - CSS">
                                    </label>
                                    
                                    <label for="projectDesc">
                                        <span>Déscription :</span>
                                        <textarea name="projectDesc" id="projectDesc" cols="30" rows="10" placeholder="gestionnaire de projet avec pour objectif..."></textarea>
                                    </label>
                                    
                                    <label for="projectOwner">
                                        <span>Propriétaire du projet</span>
                                        <input type="text" name="projectOwner" id="projectOwner" placeholder="Maxime beaujardin">
                                    </label>
                                    
                                    <input type="submit" value="Ajouter un projet">
                
                                </div>
                
                            </div>
                
                        </div>

                    </div>
                    
                    <script src="assets/production/js/main-min.js"></script>
                    <script src="assets/production/js/actionOpenMenu-min.js"></script>
                    <script src="assets/production/js/ajax.function-min.js"></script>
                </body>
            </html>

        <?php

    }