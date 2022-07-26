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
            
            if ( error = checkValidate(projectValue) ) {

                let data = []
                    
                ajax_action("../app/fonction/ajax.action.reception.php",projectValue, (sendBack) => {

                    console.log(sendBack)

                })

            } else {

                

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

function ajax_action(url,postValue,callback) {

    let xhr = new XMLHttpRequest();
    xhr.open("GET",url,true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4){

            if (xhr.status === 200) {

                callback(xhr.response)

                return true;

            } else {

                return false;

            }

        }
    }

    xhr.setRequestHeader('ajaxAddProject', 'true')

    xhr.send();

}