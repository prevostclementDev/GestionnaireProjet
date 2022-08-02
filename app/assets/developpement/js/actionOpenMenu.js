/* ################################## */
/*     ACTION : OPEN POP UP etc...    */
/* ################################## */
const body = document.querySelector('body');

task_list_open();

const containerPopUp = document.querySelector('#containerPopUp');
const popUp_Projet = document.querySelector('#containerPopUp .add_project_popUp');
const btn_popUp_Projet = document.querySelector('#add_project')
const btn_Close_PopUp_projet = document.querySelector('#AddcloseProject');
/* ADD PROJECT POP UP */
if ( btn_popUp_Projet != undefined ) {

    btn_popUp_Projet.addEventListener('click', function(){

        body.style.overflow = "hidden"
        containerPopUp.classList.add('active')
        popUp_Projet.classList.add('active')

    })

    btn_Close_PopUp_projet.addEventListener('click', function(){

        body.style.overflow = "auto"
        containerPopUp.classList.remove('active')
        popUp_Projet.classList.remove('active')

    })

}

/* RETURN OF AJAX INFORMATION FOR PROJECT POP UP */
function changeReturnValue_project(newValue,type) {

    const valueReturn = document.querySelector('#containerPopUp .add_project_popUp #response');

    if ( type == "error" ) {

        valueReturn.classList.add('error')
        valueReturn.classList.remove('valide')

    } else if ( type == "valide" ) {

        valueReturn.classList.remove('error')
        valueReturn.classList.add('valide')

    }

    valueReturn.innerHTML = newValue;

}

/* VALIDATION ON FORM POP UP PROJECT */
function checkValidate(listValue) {

    const regexDate = /(\d{4})-(\d{2})-(\d{2})/g;
    let returnError = []

    if ( listValue.name.value.length > 255 || listValue.name.value == "" ) {

        returnError.push([listValue.name,"valeur du nom incorrect"])

    }

    if(!listValue.startDate.value.match(regexDate)) {

        returnError.push([listValue.startDate,'date de début non valide'])

    } else {

        if ( listValue.endDate.value != "" && !listValue.endDate.value.match(regexDate) ) {

            returnError.push([listValue.endDate,"date de fin non valide"])
    
        } else {

            const start = new Date(listValue.startDate.value)
            const end = new Date(listValue.endDate.value)

            if ( start.getTime() > end.getTime() ) {

                returnError.push([listValue.endDate,"date de fin avant date de début"])

            }

        }

    }

    if ( listValue.projectOwner.value == "" ) {

        returnError.push([listValue.projectOwner,"propriétaire requis"])

    }

    if ( returnError.length > 0 ) {

        return returnError

    } else {

        return true

    }

}

function task_list_open() {

    const bouton_addList = document.querySelector("#add_list_btn");
    const menu_addList = document.querySelector('#ajoutList-menu');
    /* ADD LIST TASK POP UP */
    if ( bouton_addList != undefined ) {
    
        bouton_addList.addEventListener('click', function(){
    
            menu_addList.classList.toggle("active");
        
        })
    
    }

}

function loader() {

    const containerPopUp = document.querySelector('#containerPopUp');
    const loader = document.querySelector('#containerPopUp .loader');

    containerPopUp.classList.toggle('active');
    loader.classList.toggle('active');

}