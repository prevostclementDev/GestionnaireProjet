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

        })

    } else {

        /* ######################### */
        /* ADD EVENT ON LINK IN MENU */
        /* ######################### */
        RebootEventLink(pageContent)

    }

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
    
            })

        } else {

            const regex = /projets-([a-zA-Z]+)/g;

            if ( event.state.direction == "accueil" ) {

                classPage = "accueil"
                type = "noneA"

                ajaxCall = classPage + ".php"

                document.title = "Gestionnaire projets | accueil"

            } else if ( event.state.direction.search(regex) != -1 ) {

                classPage = "view-list"
                type = event.state.direction.split('-')[1]

                ajaxCall = "list?type="+type

                document.title = "Gestionnaire projets | projets"

            } else if ( event.state.direction == "search") {

                classPage = "searchPage"
                type = "noneS"

                ajaxCall = "search.php"

                document.title = "Gestionnaire projets | search"
            }

            requestPage("../app/page/"+ajaxCall, (response) => {

                pageContent.classList.forEach(elementClass => {
            
                    pageContent.classList.remove(elementClass);
            
                })

                document.querySelector("#navigationHeader .Hlink.active").classList.remove("active")

                document.querySelector('[attr_type='+type+']').classList.add("active")
            
                pageContent.classList.add(classPage);
                
                pageContent.innerHTML = response
            
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

                newLink = "list.php?type=" + linkExplode[1]

                document.title = "Gestionnaire projets | "+ linkExplode[0]

            } else {

                newLink = newpage + ".php"

                document.title = "Gestionnaire projets | "+newpage

            }

            requestPage("../app/page/"+newLink, (response) => {

                containerContent.classList.forEach(elementClass => {

                    containerContent.classList.remove(elementClass);

                })

                document.querySelector("#navigationHeader .Hlink.active").classList.remove("active")

                el.classList.add('active')

                containerContent.classList.add(el.getAttribute('attr_class'));
                
                containerContent.innerHTML = response

                window.history.pushState({direction : newpage}, el.getAttribute('attr_class'), window.location.origin + baseUrl + newpage);

            })

        })

    })

}
