<?php

    @require_once "../config.php";
    @require_once "../fonction/class.generate.php";

    /* IF PAGE LOAD ON AJAX REQUEST RETURN JSON */
    if ( isset($_SERVER['HTTP_AJAXREQUESTSERVER']) ) {

        /* FIRST LOAD : GIVE HEADER */
        if ( isset($_GET['getHeader']) && $_GET["getHeader"] ) {

            echo json_encode(
                array(
                    generate_page::generateHeader(),
                    generate_page::generateAccueil()
                )
            );
        /* HEADER EXIST */
        } else {

            echo json_encode(
                array(
                    generate_page::generateAccueil()
                )
            );

        }
    /* ELSE GENERATE PAGE */
    } else {

        ?>
        
                    <?= generate_page::get_head(baseUrl,"Gestionnaire projets | accueil") ?>

                    <header id="header">

                        <?= generate_page::generateHeader("accueil.php") ?>

                    </header>

                    <main id="page-content" class="accueil">   
                        
                        <?= generate_page::generateAccueil() ?>

                    </main>

                    <?= generate_page::get_footer() ?>

        <?php

    }