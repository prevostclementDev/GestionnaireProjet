<?php


    @require_once "../fonction/BDDpageTraitement/traitement.projet.php";
    @require_once "../fonction/class.generate.php";

        /* IF PAGE LOAD ON AJAX REQUEST RETURN JSON */
        if ( isset($_SERVER['HTTP_AJAXREQUESTSERVER']) ) {

            echo json_encode(
                array(
                    generate_page::generateProject($projet),
                )
            );

        /* ELSE GENERATE PAGE */
        } else {

            ?>
                
            <?= generate_page::get_head(baseUrl,"Gestionnaire projets | projets") ?>

                        <header id="header">

                            <?= generate_page::generateHeader("projets-now")  ?>

                        </header>

                        <main id="page-content" class="projectPage">   

                            <?php
                                
                                    echo generate_page::generateProject($projet);

                            ?>


                        </main>

                        <?= generate_page::get_footer() ?>

            <?php

        }
    