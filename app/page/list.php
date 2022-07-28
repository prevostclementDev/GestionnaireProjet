<?php

    @require_once "../config.php";
    @require_once "../fonction/class.generate.php";

    $cursor = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpassword);

    $pageType = $_GET['type'];

    $request = "SELECT project_slug,project_name,project_owner FROM projet_list WHERE project_state=";

    $arr_response = [];

    if ( $pageType == "now" ) {

        $request .= "0";

    } else if ( $pageType == "finish" ) {

        $request .= "1";

    } else {

        // DO SOMETHING

    }

    $selection = $cursor->query($request);

    if ($cursor->errorInfo()[2] == null) {

        while($value = $selection->fetch(PDO::FETCH_ASSOC)) {
            array_push($arr_response,$value);
        }

        $selection = true;
        
    } else {

        $selection = false;

    }

    if ( isset($_SERVER['HTTP_AJAXREQUESTSERVER']) ) {

        echo json_encode(
            array(
                generate_page::generateListPage($arr_response),
            )
        );

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