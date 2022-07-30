<?php


    @require_once "../config.php";
    @require_once "../fonction/class.generate.php";

    if ( isset($_GET['slug']) ) {
        /* IF PAGE LOAD ON AJAX REQUEST RETURN JSON */
        if ( isset($_SERVER['HTTP_AJAXREQUESTSERVER']) ) {

            echo json_encode(
                array(
                    generate_page::generateProject(),
                )
            );

        /* ELSE GENERATE PAGE */
        } else {

            ?>
            
            <?= generate_page::get_head(baseUrl,"Gestionnaire projets | projets") ?>

                        <header id="header">

                            <?= generate_page::generateHeader("now")  ?>

                        </header>

                        <main id="page-content" class="projectPage">   

                            <?php
                            
                                    echo generate_page::generateProject();

                            ?>


                        </main>

                        <?= generate_page::get_footer() ?>

            <?php

        }
    } else {

        // DO SOMETHING IF PROJECT DO NOT EXIST OR SLUG AS NOT DEFINE

    }