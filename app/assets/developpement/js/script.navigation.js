const baseUrl = "/__site/__fromscratch/GestionnaireProjet/app/"

window.addEventListener('load',function(){

    /* ############################# */
    /*       CONST DECLARATION       */
    /* ############################# */
    const header = document.querySelector('#header');
    const pageContent = document.querySelector('#page-content');

    /* ##################### */
    /* FIRST LOAD INTEGORATE */
    /* ##################### */
    if ( window.location == window.location.origin + baseUrl + "accueil" ||
        window.location == window.location.origin + baseUrl ||
        window.location == window.location.origin + baseUrl + "index.php"
    ) {

        /* ########## */
        /* CHANGE URL */
        /* ########## */
        window.history.pushState({direction : "accueil"}, "accueil", window.location.origin + baseUrl + "accueil");

        /* ######### */
        /* AJAX CALL */
        /* ######### */
        requestPage("../app/page/accueil.php?getHeader=true", (response) => {

            header.innerHTML = response[0]
    
            pageContent.classList.forEach(elementClass => {
    
                pageContent.classList.remove(elementClass);
    
            })
    
            document.querySelector('[attr_class=accueil]').classList.add("active")

            pageContent.classList.add('accueil')
    
            pageContent.innerHTML = response[1]

            RebootEventLink(pageContent)

            /* IF LINK ADD EVENT ON */
            projetCall(pageContent);

        })

    } else {

        /* ######################### */
        /* ADD EVENT ON LINK IN MENU */
        /* ######################### */
        RebootEventLink(pageContent)

    }

    projetCall(pageContent)

    /* #################### */
    /* RETURN BACK OR FRONT */
    /* #################### */
    window.onpopstate = (event) => {

        if (event.state == null) {

            requestPage("../app/page/accueil.php?getHeader=true", (response) => {

                header.innerHTML = response[0]
        
                pageContent.classList.forEach(elementClass => {
        
                    pageContent.classList.remove(elementClass);
        
                })

                /* document.querySelector("#navigationHeader .Hlink.active").classList.remove("active") */

                document.querySelector('[attr_class=accueil]').classList.add("active")
        
                pageContent.classList.add('accueil')
        
                pageContent.innerHTML = response[1]
    
                projetCall(pageContent);

            })

        } else {

            const regex = /projets-([a-zA-Z]+)/g;
            const regexProjet = /projet\/([a-zA-Z-]+)/g;

            if ( event.state.direction == "accueil" ) {

                classPage = "accueil"
                type = "noneA"

                ajaxCall = classPage

                document.title = "Gestionnaire projets | accueil"

            } else if ( event.state.direction.search(regex) != -1 ) {

                classPage = "view-list"
                type = event.state.direction.split('-')[1]

                ajaxCall = event.state.direction

                document.title = "Gestionnaire projets | projets " + type

            } else if ( event.state.direction == "search") {

                classPage = "searchPage"
                type = "noneS"

                ajaxCall = "search"

                document.title = "Gestionnaire projets | search"

            } else if ( event.state.direction.search(regexProjet) != -1 ) {

                classPage = "projectPage"
                type = "now"

                ajaxCall = event.state.direction
                document.title = "Gestionnaire projets | projet"

            }

            requestPage("../app/"+ajaxCall, (response) => {

                pageContent.classList.forEach(elementClass => {
            
                    pageContent.classList.remove(elementClass);
            
                })

                document.querySelector("#navigationHeader .Hlink.active").classList.remove("active")

                document.querySelector('[attr_type='+type+']').classList.add("active")
            
                pageContent.classList.add(classPage);
                
                pageContent.innerHTML = response

                projetCall(pageContent);
            
            })

        } 
        
    }

})

/* ################## */
/* AJAX CALL FUNCTION */
/* ################## */
function requestPage(uri,callback) {

    let xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        uri,
        true
    );

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4){

            if (xhr.status === 200) {

                callback(JSON.parse(xhr.response))

                return true;

            } else {

                return false;

            }

        }
    }

    xhr.setRequestHeader("ajaxRequestServer","true")

    xhr.send();

}

/* ######################### */
/* ADD EVENT ON LINK IN MENU */
/* ######################### */
function RebootEventLink(containerContent) {

    const AllLinkHeader = document.querySelectorAll("#navigationHeader .Hlink");

    AllLinkHeader.forEach(el => {

        el.addEventListener('click', function(e){

            e.preventDefault()

            newpage = el.getAttribute("href")

            if( newpage.includes("-") ) {

                linkExplode = newpage.split('-');

                document.title = "Gestionnaire projets | "+ linkExplode[0] + " " + linkExplode[1]

            } else {

                document.title = "Gestionnaire projets | "+newpage

            }

            requestPage("../app/"+newpage, (response) => {

                containerContent.classList.forEach(elementClass => {

                    containerContent.classList.remove(elementClass);

                })

                active = document.querySelector("#navigationHeader .Hlink.active")
                if ( active != null ) {

                    active.classList.remove("active")

                }

                el.classList.add('active')

                containerContent.classList.add(el.getAttribute('attr_class'));
                
                containerContent.innerHTML = response

                projetCall(containerContent);

                window.history.pushState({direction : newpage}, el.getAttribute('attr_class'), window.location.origin + baseUrl + newpage);

            })

        })

    })

}

/* ######################### */
/* NAVIGATION TO PROJET PAGE */
/* ######################### */
function projetCall(pageContent) {

    const btn_projet = document.querySelectorAll('.projet a');

    if ( btn_projet.length > 0 ) {

        btn_projet.forEach(link => {

            link.onclick = (e) => {

                e.preventDefault()
                slug = link.getAttribute('href')

                requestPage('../app/projet/'+slug, (response) => {

                    pageContent.classList.forEach(elementClass => {

                        pageContent.classList.remove(elementClass);
    
                    })

                    pageContent.classList.add('projectPage')

                    pageContent.innerHTML = response

                    task_list_open();

                    document.title = "Gestionnaire projets | projet"

                    window.history.pushState({direction : "projet/"+slug}, "projet/"+slug, window.location.origin + baseUrl + "projet/"+slug);

                })

            }

        })

    }

}