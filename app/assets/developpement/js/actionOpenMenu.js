const body = document.querySelector('body');

const bouton_addList = document.querySelector("#add_list_btn");
const menu_addList = document.querySelector('#ajoutList-menu');

if ( bouton_addList != undefined ) {

    bouton_addList.addEventListener('click', function(){

        menu_addList.classList.toggle("active");
    
    })

}

const containerPopUp = document.querySelector('#containerPopUp');
const popUp_Projet = document.querySelector('#containerPopUp .add_project_popUp');
const btn_popUp_Projet = document.querySelector('#add_project')
const btn_Close_PopUp_projet = document.querySelector('#AddcloseProject');

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

