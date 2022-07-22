<?php
    @include "../class.projet.php";

    if ( !isset($_GET['page']) && empty($_GET['page']) ) {

        echo json_encode(
            array(
                generate_page::generateHeader(),
                generate_page::generateAccueil()
            )
            
        );

    }