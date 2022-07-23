<?php

    class generate_page {

        public static function generateHeader() {
            return '
                <div class="topVisibleHeader">

                    <div class="containsTitle">

                        <h1>Gestionnaire de projet</h1>
                        <h2>22 Juillet 2022</h2>

                    </div>

                </div>

                <nav id="navigationHeader">

                    <ul class="listMenu">
                        <li><a class="Hlink" href="accueil.php" class="active" attr_class="accueil">
                            <i class="fa-solid fa-house"></i>
                            <span>Accueil</span>
                        </a></li>
                        <li><a class="Hlink" href="list.php" attr_class="view-list">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Projet recent</span>
                        </a></li>
                        <li><a class="Hlink" href="list.php" attr_class="view-list">
                            <i class="fa-solid fa-clock"></i>
                            <span>Projet en cours</span>
                        </a></li>
                        <li><a class="Hlink" href="list.php" attr_class="view-list">
                            <i class="fa-solid fa-calendar-check"></i>
                            <span>Projet fini</span>
                        </a></li>
                        <li><a class="Hlink" href="search.php" attr_class="searchPage">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span>Recherche</span>
                        </a></li>
                    </ul>

                </nav>
            ';

        }

        public static function generateAccueil() {
            return '
                <div class="list-recentlyView">

                <h2>Dernier(s) projet(s)</h2>

                <div class="container-list">

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>File Manager</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 60%;"></span></div>
                            <h4>60%</h4>
                        </div>

                        <h4> 6 tâches sur 10 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Portfolio</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 20%;"></span></div>
                            <h4>20%</h4>
                        </div>

                        <h4> 2 tâches sur 20 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Partiel B2 S1</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 30%;"></span></div>
                            <h4>30%</h4>
                        </div>

                        <h4> 6 tâches sur 19 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Révision PHP</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 52%;"></span></div>
                            <h4>52%</h4>
                        </div>

                        <h4> 6 tâches sur 13 réalisées </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                </div>

                </div>

                <div class="statistique">

                <ul class="statList">

                    <li>
                        <div class="round-information">15</div>
                        <div class="information-about-round">Projet(s) en cours</div>
                    </li>

                    <li>
                        <div class="round-information">9</div>
                        <div class="information-about-round">Projet(s) fini(s)</div>
                    </li>

                    <li>
                        <div class="round-information">38</div>
                        <div class="information-about-round">Tâche(s) restante(s)</div>
                    </li>

                    <li>
                        <div class="round-information">128</div>
                        <div class="information-about-round">Tâche(s) fini(s)</div>
                    </li>

                </ul>

                </div>
            ';

        }

        public static function generateListPage() {

            return '
            
            <section id="FilterBar">

                <div class="containerItemsLeft">

                    <label for="searchProject">
                        <input type="text" name="searchProject" id="searchProject" placeholder="search by project name">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </label>

                </div>

            </section>

            <section id="list-projet">

                <section class="containList">

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>
                        <h4> Propriétaire : Clément Prévost </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>
                        <h4> Propriétaire : Clément Prévost </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>
                        <h4> Propriétaire : Clément Prévost </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>
                        <h4> Propriétaire : Clément Prévost </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>
                        <h4> Propriétaire : Clément Prévost </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>
                        <h4> Propriétaire : Clément Prévost </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                    <div class="projet">

                        <h2>Gestionnaire de tâches</h2>
                        <div class="projectPourcentView">
                            <div class="pourcentBar"><span style="width: 16%;"></span></div>
                            <h4>16%</h4>
                        </div>

                        <h4> 6 tâches sur 23 réalisées </h4>
                        <h4> Propriétaire : Clément Prévost </h4>

                        <a href="?page=singleProject&projectName=gestionnaire_projet">Voir</a>

                    </div>

                </section>

            </section>

            ';

        }

        public static function generateSearch() {

            return'
            <div id="searchProjectPage">
                <label for="searchProject">
                    <input type="text" name="searchProject" id="searchProject" placeholder="search by project name">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </label>
            </div>
            ';

        }

        public static function generateProject() {

            return '
            
            <div class="topViewProject">

                <div class="information-about">

                    <h2>File Manager</h2>

                    <div class="dateInfo">
    
                        <h3>Date début : 01/07/2022</h3>
                        <h3>Date fin : 30/07/2022</h3>
    
                        <h3>Délai restant : 10j</h3>
    
                    </div>
    
                    <div class="projectPourcentView">
                        <div class="pourcentBar"><span style="width: 16%;"></span></div>
                        <h4>16%</h4>
                    </div>
    
                    <div class="description">
    
                        <p>
    
                            Quae diligentissime contra Aristonem dicuntur a Chryippo. Qui est in parvis malis. Sed haec in pueris; Qualem igitur hominem natura inchoavit? Si longus, levis dictata sunt. Philosophi autem in suis lectulis plerumque moriuntur. Quorum altera prosunt, nocent altera. Quantum Aristoxeni ingenium consumptum videmus in musicis? 
                            Quae diligentissime contra Aristonem dicuntur a Chryippo. Qui est in parvis malis. Sed haec in pueris; Qualem igitur hominem natura inchoavit? Si longus, levis dictata sunt. Philosophi autem in suis lectulis plerumque moriuntur. Quorum altera prosunt, nocent altera. Quantum Aristoxeni ingenium consumptum videmus in musicis? 
                            Quae diligentissime contra Aristonem dicuntur a Chryippo. Qui est in parvis malis. Sed haec in pueris; Qualem igitur hominem natura inchoavit? Si longus, levis dictata sunt. Philosophi autem in suis lectulis plerumque moriuntur. Quorum altera prosunt, nocent altera. Quantum Aristoxeni ingenium consumptum videmus in musicis? 
                            Quae diligentissime contra Aristonem dicuntur a Chryippo. Qui est in parvis malis. Sed haec in pueris; Qualem igitur hominem natura inchoavit? Si longus, levis dictata sunt. Philosophi autem in suis lectulis plerumque moriuntur. Quorum altera prosunt, nocent altera. Quantum Aristoxeni ingenium consumptum videmus in musicis? 
    
                        </p>
    
                    </div>
    
                    <h5>Géré par : <span>Prévost Clément</span></h5>

                </div>

                <div class="actionAbout">

                    <div class="projectAction">

                        <button>Finir le projet</button>
                        <button>Supprimez le projet</button>
                        <button>Modifier les informations du projets</button>

                    </div>

                    <div class="taskAction">

                        <button id="add_list_btn">Ajouter une liste de tache</button>

                    </div>

                </div>

                <div class="ajoutList" id="ajoutList-menu">
                    <input type="text" id="add_list" placeholder="nom de la nouvelle liste">
                    <button id="">ajouter</button>
                </div>

            </div>

            <div class="taskProject">

                <div class="projectList">

                    <div class="taskList" listName="serverTask">

                        <h2>Titre de la liste</h2>
    
                        <div class="firstContainer">

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                        </div>

    
                        <div class="addTask">
                            <button>ajout une tache</button>
                        </div>
    
                    </div>

                    <div class="taskList" listName="serverTask">

                        <h2>Titre de la liste</h2>
    
                        <div class="firstContainer">

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                        </div>

    
                        <div class="addTask">
                            <button>ajout une tache</button>
                        </div>
    
                    </div>

                    <div class="taskList" listName="serverTask">

                        <h2>Titre de la liste</h2>
    
                        <div class="firstContainer">

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                            <div class="task" listProperty="serverTask">
                                <div class="principeInfo">
                                    <h2>Modification .htaccess</h2>
                                    <p class="desc">modifier .htaccess pour redirect la preprod</p>
                                    <p class="assign">Assigner à : Prévost Clément</p>
                                </div>

                                <div class="actionAbout">
                                    <button>supprimez</button>
                                    <button>valider</button>
                                </div>
                            </div>

                        </div>

    
                        <div class="addTask">
                            <button>ajout une tache</button>
                        </div>
    
                    </div>

                </div>


            </div>

            ';

        }

    }