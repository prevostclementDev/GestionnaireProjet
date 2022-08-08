<?php

    function create_config_content(array $db_info,string $path) {

        $content = '
        
        <?php

            define("uri", "'.$path.'");
            
            define("baseUrl", \'<base href="\'.uri.\'">\');

            define("dbhost","'.$db_info['db_host'].'");
            define("dbname","'.$db_info['db_name'].'");
            define("dbuser","'.$db_info['db_user'].'");
            define("dbpassword","'.$db_info['db_password'].'");

        ';

        return $content;

    }

    function create_config_file(array $db_info,string $path) {

        file_put_contents('config.php', create_config_content($db_info,$path)); 

    }

    function create_form_installeur() {

        return '
        
                <style>

                html {
                    box-sizing: border-box;
                    font-size: 16px;
                    font-family: sans-serif;
                }
                
                *, *:before, *:after {
                    box-sizing: inherit;
                }
                
                body, h1, h2, h3, h4, h5, h6, p, ol, ul {
                    margin: 0;
                    padding: 0;
                    font-weight: normal;
                }
                
                ol, ul {
                    list-style: none;
                }
                
                img {
                    max-width: 100%;
                    height: auto;
                }
        
                .containsAll {

                    width: 100vw;
                    height: 100vh;
                    background-color: #85b79d70;
                    display: flex;
                    justify-content: center;
                    align-items: center;

                }

                .form {

                    width: 50%;
                    height: fit-content;
                    background-color: white;
                    border-radius: 5px;
                    color: #16302B;

                }

                .form form {

                    padding: 20px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    margin-bottom: 0;

                }

                h5 {

                    font-size: 18px;
                    font-weight: 500;
                    margin-bottom: 10px;

                }

                h4 {

                    font-size: 24px;
                    margin-bottom: 5px;
                    border-bottom: 1px solid #16302B;
                    padding-bottom: 5px;

                }

                input {

                    width: 100%;
                    margin-bottom: 10px;
                    padding: 10px;
                    outline: none;
                    border: 1px solid #16302B;

                }

                input::placeholder {

                    color: #16302B;

                }

                .containsPath__info {

                    width: 100%;
                    

                }

                input[type=submit] {

                    border: none;
                    background-color: #16302B;
                    color: white;
                    width: 30%;
                    margin: 0 auto;
                    border-radius: 5px;
                    border: 1px solid white;
                    transition: 0.25s ease-in-out all;

                }

                input[type=submit]:hover {

                    background-color: white;
                    border: 1px solid #16302B;
                    color: #16302B;
                    cursor: pointer;

                }
                


            </style>

            <div class="containsAll">

                <div class="form">

                    <form action="" method="POST">

                        <div class="containsPath__info">
                        
                            <label for="acces">
                                <h5>Path of App :</h5>
                                <input type="text" name="acces" id="acces" placeholder="Ex : /__site/ etc..." required>
                            </label>

                        </div>

                        <div class="containsBDD__info">

                            <h4>Database informations :</h4>

                            <div class="rowTop">
                                
                                <label for="host">
                                    <h5>Database host :</h5>
                                    <input type="text" name="host" id="host" placeholder="Ex : localhost etc..." required>
                                </label>

                                <label for="name">
                                    <h5>Database name :</h5>
                                    <input type="text" name="name" id="name" placeholder="Ex : gestionnaireProjet etc..." required>
                                </label>

                            </div>

                            <div class="rowBottom">
                                
                                <label for="user">
                                    <h5>Database user :</h5>
                                    <input type="text" name="user" id="user" placeholder="Ex : root etc..." required>
                                </label>

                                <label for="password">
                                    <h5>Database password :</h5>
                                    <input type="text" name="password" id="password" placeholder="Ex : 12345678 etc...">
                                </label>

                            </div>

                        </div>

                        <input type="submit" value="Installer" name="installeurRun">

                    </form>

                </div>

            </div>
        
        ';

    }

    function createDB($db_cursor) {

        $request = '
        
            DROP TABLE IF EXISTS `gestionnaire_addons`;
            CREATE TABLE IF NOT EXISTS `gestionnaire_addons` (
            `addons_id` int(11) NOT NULL AUTO_INCREMENT,
            `addons_name` varchar(255) NOT NULL,
            `addons_option` text NOT NULL,
            PRIMARY KEY (`addons_id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

            INSERT INTO `gestionnaire_addons` (`addons_id`, `addons_name`, `addons_option`) VALUES
            (1, "recentlyView", "");

            DROP TABLE IF EXISTS `listtask_top`;
            CREATE TABLE IF NOT EXISTS `listtask_top` (
            `list_id` int(11) NOT NULL AUTO_INCREMENT,
            `id_project` varchar(255) NOT NULL,
            `list_name` varchar(255) NOT NULL,
            `list_desc` text,
            PRIMARY KEY (`list_id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

            DROP TABLE IF EXISTS `projet_list`;
            CREATE TABLE IF NOT EXISTS `projet_list` (
            `project_slug` varchar(255) NOT NULL,
            `project_name` varchar(255) NOT NULL,
            `project_StartDate` varchar(255) NOT NULL,
            `project_EnDate` varchar(255) DEFAULT NULL,
            `project_categorie` text,
            `project_description` text,
            `project_owner` varchar(255) NOT NULL,
            `project_state` int(11) NOT NULL,
            PRIMARY KEY (`project_slug`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

            DROP TABLE IF EXISTS `task_list`;
            CREATE TABLE IF NOT EXISTS `task_list` (
            `task_id` int(11) NOT NULL AUTO_INCREMENT,
            `id_list` int(11) NOT NULL,
            `task_name` varchar(255) NOT NULL,
            `task_desc` text,
            `task_state` int(11) NOT NULL,
            `task_user` text NOT NULL,
            PRIMARY KEY (`task_id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
            COMMIT;

        ';

        $db_cursor->exec($request);

        if ( $db_cursor->errorInfo()[2] == null ) {

            return true;

        } else {

            return false;

        }

    }

    if ( isset($_POST['installeurRun']) ) {

        $databaseCursor = new PDO("mysql:host=".$_POST['host'].";dbname=".$_POST['name'],$_POST['user'],$_POST['password']);

        $zipFile = new ZipArchive;

        if ( $zipFile->open('projectGestionApp.zip') === true ) {

            $zipFile->extractTo('.');
            $zipFile->close();

        }

        create_config_file(
            array(
                "db_host" => $_POST['host'],
                "db_name" => $_POST['name'],
                "db_user" => $_POST['user'],
                "db_password" => $_POST['password'],
            ),
            $_POST['acces']
        );
        
        if ( createDB($databaseCursor) == true ) {

            echo '<h2>Installation terminée avec succès</h2>';

        } else {

            echo '<h2>Problème lors de l\'installation vérifier les informations entrées</h2>';

        }


    } else {

        echo create_form_installeur();

    }

?>

