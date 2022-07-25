<?php

@require_once "../config.php";
@require_once "../fonction/class.projet.php";

if ( isset($_SERVER['HTTP_AJAXREQUESTSERVER']) ) {

    echo json_encode(
        array(
            generate_page::generateListPage(),
        )
    );

} else {

    $pageType = $_GET['type']

    ?>
    
    <?= generate_page::get_head(baseUrl,"Gestionnaire projets | list projets") ?>

                <header id="header">

                      <?= generate_page::generateHeader("projets-".$pageType)  ?>

                </header>

                <main id="page-content" class="view-list">   

                    <?= generate_page::generateListPage() ?>

                </main>

                <?= generate_page::get_footer() ?>

    <?php

}