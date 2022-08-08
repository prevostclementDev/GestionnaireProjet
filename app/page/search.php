<?php

    @require_once "../config.php";
    @require_once "../fonction/class.generate.php";

    /* IF PAGE LOAD ON AJAX REQUEST RETURN JSON */
    if ( isset($_SERVER['HTTP_AJAXREQUESTSERVER']))  {

            echo json_encode(
                array(
                    generate_page::generateSearch(),
                )
            );
    /* ELSE GENERATE PAGE */
    } else {

        ?>
        
        <?= generate_page::get_head(baseUrl,"Gestionnaire projets | recherche") ?>

                    <header id="header">

                        <?= generate_page::generateHeader("search") ?>

                    </header>

                    <main id="page-content" class="searchPage">   

                        <?= generate_page::generateSearch() ?>

                    </main>

                    <?= generate_page::get_footer() ?>

        <?php

    }