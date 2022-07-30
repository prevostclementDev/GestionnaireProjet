<?php

    @require_once "../fonction/class.generate.php";
    @require_once "../fonction/BDDpageTraitement/traitement.list.php";

    /* IF PAGE LOAD ON AJAX REQUEST RETURN JSON */
    if ( isset($_SERVER['HTTP_AJAXREQUESTSERVER']) ) {

        echo json_encode(
            array(
                generate_page::generateListPage($arr_response),
            )
        );

    /* ELSE GENERATE PAGE */
    } else {

        ?>
        
        <?= generate_page::get_head(baseUrl,"Gestionnaire projets | list projets") ?>

                    <header id="header">

                        <?= generate_page::generateHeader("projets-".$pageType)  ?>

                    </header>

                    <main id="page-content" class="view-list">   

                        <?= generate_page::generateListPage($arr_response) ?>

                    </main>

                    <?= generate_page::get_footer() ?>

        <?php

    }