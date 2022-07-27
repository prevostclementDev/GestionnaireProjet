window.addEventListener('DOMContentLoaded' , () => {

    /* DECLARATION BTN */
    const submitProject = document.querySelector('#submitProject');

    /* SCRIPT */
    if ( submitProject != undefined ) {

        submitProject.onclick = () => {

            /* GET ALL VALUE FORM */
            const projectValue = {
                name : document.querySelector('#form-addProject #projectName'),
                startDate : document.querySelector('#form-addProject #startDate'),
                endDate : document.querySelector('#form-addProject #endDate'),
                categorie : document.querySelector('#form-addProject #categorie'),
                projectDesc : document.querySelector('#form-addProject #projectDesc'),
                projectOwner : document.querySelector('#form-addProject #projectOwner'),
            }
            
            
            if ( checkValidate(projectValue) == true ) {
                    
                ajax_action("../app/fonction/ajax.action.reception.php",projectValue,"addproject", (sendBack) => {

                    if ( sendBack[0] ) {

                        changeReturnValue_project('Projet ajouté',"valide")

                    } else {

                        if ( sendBack[2][1] == 1062 ) {

                            changeReturnValue_project('nom de projet déjà existant',"error")

                        } else {

                            changeReturnValue_project('erreur, veuillez contacter un administrateur',"error")

                        }

                    }

                })

            } else {

                error = checkValidate(projectValue) // TODO AJOUTER MESSAGE D'ERREUR

            }

        }

    }

})

/* DURCIR LES REGLES */
function checkValidate(listValue) {

    const regexDate = /(\d{4})-(\d{2})-(\d{2})/g;
    let returnError = []

    if ( listValue.name.value.length > 255 || listValue.name.value == "" ) {

        returnError.push(listValue.name)

    }

    if(!listValue.startDate.value.match(regexDate)) {

        returnError.push(listValue.startDate)

    }

    if ( listValue.endDate.value != "" && !listValue.endDate.value.match(regexDate) ) {

        returnError.push(listValue.endDate)

    }

    if ( listValue.projectOwner.value == "" ) {

        returnError.push(listValue.projectOwner)

    }

    if ( returnError.length > 0 ) {

        return returnError

    } else {

        return true

    }

}

function ajax_action(url,postValue,typeAction,callback) {

    let xhr = new XMLHttpRequest();
    xhr.open("POST",url,true);

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

    xhr.setRequestHeader("ajaxAction",typeAction)

    const BODY = new FormData()

    for ( index in postValue ) {

        BODY.append(index,postValue[index].value)

    }
    
    xhr.send(BODY);

}