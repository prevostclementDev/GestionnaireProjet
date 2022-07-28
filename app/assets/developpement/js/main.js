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
            
            for (let i in projectValue) {
                
                projectValue[i].style.borderColor = "#16302b"

            }
            
            if ( checkValidate(projectValue) == true ) {
                    
                ajax_action("../app/fonction/ajax.action.reception.php",projectValue,"addproject", (sendBack) => {

                    if ( sendBack[0] ) {

                        changeReturnValue_project('Projet ajouté',"valide")

                    } else {

                        if ( sendBack[2][1] == 1062 ) {

                            changeReturnValue_project('nom de projet déjà existant',"error")
                            projectValue['name'].style.borderColor = "red"

                        } else {

                            changeReturnValue_project('erreur, veuillez contacter un administrateur',"error")

                        }

                    }

                })

            } else {

                error = checkValidate(projectValue)
                messageError = ""

                error.forEach( element => {

                    element[0].style.borderColor = "red"
                    messageError += element[1] + " | "

                })

                changeReturnValue_project(messageError,"error")

            }

        }
    }

})

/* DURCIR LES REGLES */
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