window.addEventListener('DOMContentLoaded' , () => {

    /* DECLARATION BTN ADD PROJECT */
    const submitProject = document.querySelector('#submitProject');

    /* project add form */
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
            
            error = checkValidate(projectValue)
            if ( error == true ) {
                    
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

                messageError = ""

                error.forEach( element => {

                    element[0].style.borderColor = "red"
                    messageError += element[1] + " | "

                })

                changeReturnValue_project(messageError,"error")

            }

        }
    } 

    eventFor_finishProject()
    eventFor_deleteProject()
    eventFor_addList()
    eventFor_deleteList()
    eventFor_addTask();
    eventFor_valideTask();
    eventFor_unvalideTask();
    eventFor_deleteTask();

})

/* AJAX CALL FOR ACTION (Add project, dell etc...) */
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

        if ( typeof postValue[index] === "string" || postValue[index] instanceof String ) {

            BODY.append(index,postValue[index])

        } else {

            BODY.append(index,postValue[index].value)

        }

    }

    
    xhr.send(BODY);

}

function confirmePopUp(Msg, TypeEvent,PostValue,action) {

    const containerPopUp = document.querySelector('#containerPopUp');
    const confirmationBox = document.querySelector('#confirmationBox');
    const confirmationBoxValide = document.querySelector('#confirmationBox #validation');
    const confirmationBoxExit = document.querySelector('#confirmationBox #annulation');
    const confirmationBoxMsg = document.querySelector('#confirmationBox h2 span');

    confirmationBoxMsg.innerHTML = Msg

    containerPopUp.classList.add('active');
    confirmationBox.classList.add('active');

    confirmationBoxValide.onclick = () => {

        containerPopUp.classList.remove('active');
        confirmationBox.classList.remove('active');
        loader()

        ajax_action("../app/fonction/ajax.action.reception.php",PostValue,TypeEvent,action)

    }

    confirmationBoxExit.onclick = () => {

        containerPopUp.classList.remove('active');
        confirmationBox.classList.remove('active');

    }


}


function eventFor_finishProject(){

    const submitFinish = document.querySelector('#finishProject');

    if ( submitFinish != undefined ) {

        submitFinish.onclick = () => {

            PostValue = {

                delete : submitFinish.getAttribute('attr_slug')
    
            }

            confirmePopUp(
                'finir le projet',
                "finishProject",
                PostValue, 
                (sendback) => {
    
                    if ( sendback == "true" ) {
    
                        
                        changePage("projets-finish",document.querySelector('#page-content'),document.querySelector("#navigationHeader .Hlink.projets-finish"));
                        setTimeout(() => {
                            AddreturnIndication("Projet validé avec succès !","valide");
                        },350)

                    } else {

                        AddreturnIndication("erreur lors de la finalisation du projet","error");

                    }
    
                    setTimeout(() => {
                        loader()
                        AffreturnIndication()
                    },350)
                    
    
                }
            )
    
        }

    }

}
function eventFor_deleteProject() {

    deleteProject = document.querySelector('#deleteProject');

    if ( deleteProject != undefined ) {

        deleteProject.onclick = () => {

            PostValue = {

                delete : deleteProject.getAttribute('attr_slug')
    
            }

            confirmePopUp(
                'supprimer le projet',
                "deleteProject",
                PostValue, 
                (sendback) => {
    
                    if ( sendback == "true" ) {
    
                        
                        changePage("projets-now",document.querySelector('#page-content'),document.querySelector("#navigationHeader .Hlink.projets-now"));
                        setTimeout(() => {
                            AddreturnIndication("Projet supprimé avec succès !","valide");
                        },350)

                    } else {

                        AddreturnIndication("erreur lors de la suppression du projet","error");

                    }
    
                    setTimeout(() => {
                        loader()
                        AffreturnIndication()
                    },350)
                    
    
                }
            )

        }

    }

}
function eventFor_addList() {

    addList = document.querySelector('#addListToProject');

    if ( addList != undefined ) {

        addList.onclick = () => {

            document.querySelector('#add_list').style.borderColor = "#16302b"

            if ( document.querySelector('#add_list').value != "" ) {

                loader()

                PostValue = {

                    slug : addList.getAttribute('attr_slug'),
                    listName : document.querySelector('#add_list').value
        
                }

                ajax_action("../app/fonction/ajax.action.reception.php",PostValue,"addList", (sendback) => {

                    if ( sendback == "true" ) {

                        initProjetPage(PostValue.slug,document.querySelector('#page-content'));
                         setTimeout(() => {
                            AddreturnIndication("Liste ajoutée !","valide");
                        },350)

                    } else {

                        AddreturnIndication("erreur lors de l'ajout de la liste","error");

                    }
    
                    setTimeout(() => {
                        loader()
                        AffreturnIndication()
                    },350)



                })

            } else {

                document.querySelector('#add_list').style.borderColor = "red"

            }

        }

    }

}
function eventFor_deleteList(){

    const removeList = document.querySelectorAll('#RemoveList');

    if ( removeList.length != 0 ) {

        removeList.forEach(btnRemove => {

            btnRemove.onclick = () => {
    
                PostValue = {
    
                    id_list : btnRemove.getAttribute('id_list'),
                    slug : btnRemove.getAttribute('project_slug')
        
                }
    
                confirmePopUp(
                    'supprimer la list',
                    "deleteList",
                    PostValue, 
                    (sendback) => {
        
                        if ( sendback == "true" ) {
        
                            initProjetPage(PostValue.slug,document.querySelector('#page-content'));
                             setTimeout(() => {
                                AddreturnIndication("Liste supprimée !","valide");
                            },350)
    
                        } else {
    
                            AddreturnIndication("erreur lors de la suppression de la liste","error");
    
                        }
        
                        setTimeout(() => {
                            loader()
                            AffreturnIndication()
                        },350)
                        
        
                    }
                )
        
            }

        })

    }

}
function eventFor_addTask() {

    addTask = document.querySelector('#submittask');

    if ( addTask != undefined ) {

        addTask.onclick = () => {

            if ( document.querySelector('#taskName').value != "" ) {

                document.querySelector('#containerPopUp').classList.remove('active')
                document.querySelector('.add_taskPopUp').classList.remove('active')
                document.querySelector('body').style.overflow = "auto";

                loader()

                PostValue = {

                    slug : addTask.getAttribute('project_slug'),
                    id_list : addTask.getAttribute('id_list'),
                    taskname : document.querySelector('#taskName').value,
                    taskowner : document.querySelector('#taskOwner').value,
                    taskdesc : document.querySelector('#taskdesc').value,
        
                }

                ajax_action("../app/fonction/ajax.action.reception.php",PostValue,"addTask", (sendback) => {

                    if ( sendback == "true" ) {

                        initProjetPage(PostValue.slug,document.querySelector('#page-content'));
                         setTimeout(() => {
                            AddreturnIndication("Tâche ajoutée !","valide");
                        },350)

                    } else {

                        AddreturnIndication("erreur lors de l'ajout de la tâche","error");
                        changeReturnValue_task("erreur lors de l'ajout de la tâche","error");

                    }
    
                    setTimeout(() => {
                        loader()
                        AffreturnIndication()
                    },350)


                })

            } else {

                changeReturnValue_task("Nom de la tâche obligatoire","error");

            }

        }

    }

}
function eventFor_valideTask(){

    const removeList = document.querySelectorAll('.valideTask');

    if ( removeList.length != 0 ) {

        removeList.forEach(btnRemove => {

            btnRemove.onclick = () => {
    
                PostValue = {
    
                    id_task : btnRemove.getAttribute('id_task'),
                    slug : btnRemove.getAttribute('project_slug')
        
                }
    
                confirmePopUp(
                    'valider la tâche',
                    "finishTask",
                    PostValue, 
                    (sendback) => {
        
                        if ( sendback == "true" ) {
        
                            initProjetPage(PostValue.slug,document.querySelector('#page-content'));
                             setTimeout(() => {
                                AddreturnIndication("Tâche validée !","valide");
                            },350)
    
                        } else {
    
                            AddreturnIndication("erreur lors de la validation de la tâche","error");
    
                        }
        
                        setTimeout(() => {
                            loader()
                            AffreturnIndication()
                        },350)
                        
        
                    }
                )
        
            }

        })

    }

}
function eventFor_unvalideTask(){

    const removeList = document.querySelectorAll('.unvalideTask');

    if ( removeList.length != 0 ) {

        removeList.forEach(btnRemove => {

            btnRemove.onclick = () => {
    
                PostValue = {
    
                    id_task : btnRemove.getAttribute('id_task'),
                    slug : btnRemove.getAttribute('project_slug')
        
                }
    
                confirmePopUp(
                    'invalider la tâche',
                    "unfinishTask",
                    PostValue, 
                    (sendback) => {
        
                        if ( sendback == "true" ) {
        
                            initProjetPage(PostValue.slug,document.querySelector('#page-content'));
                             setTimeout(() => {
                                AddreturnIndication("Tâche invalidée !","valide");
                            },350)
    
                        } else {
    
                            AddreturnIndication("erreur lors de la invalidation de la tâche","error");
    
                        }
        
                        setTimeout(() => {
                            loader()
                            AffreturnIndication()
                        },350)
                        
        
                    }
                )
        
            }

        })

    }

}
function eventFor_deleteTask(){

    const removeList = document.querySelectorAll('.deleteTask');

    if ( removeList.length != 0 ) {

        removeList.forEach(btnRemove => {

            btnRemove.onclick = () => {
    
                PostValue = {
    
                    id_task : btnRemove.getAttribute('id_task'),
                    slug : btnRemove.getAttribute('project_slug')
        
                }
    
                confirmePopUp(
                    'supprimer la tâche',
                    "deleteTask",
                    PostValue, 
                    (sendback) => {
        
                        if ( sendback == "true" ) {
        
                            initProjetPage(PostValue.slug,document.querySelector('#page-content'));
                             setTimeout(() => {
                                AddreturnIndication("Tâche supprimée !","valide");
                            },350)
    
                        } else {
    
                            AddreturnIndication("erreur lors de la supression de la tâche","error");
    
                        }
        
                        setTimeout(() => {
                            loader()
                            AffreturnIndication()
                        },350)
                        
        
                    }
                )
        
            }

        })

    }

}


function AddreturnIndication(Msg,type) {

    let info = document.querySelector('#returnInfo');
    let close = document.querySelector('#returnInfo .close');

    info.classList.forEach(elementClass => {

        info.classList.remove(elementClass);

    })

    info.classList.add(type)
    document.querySelector('#returnInfo p').innerHTML = Msg

    close.onclick = () => {

        info.classList.toggle('active');

    }

}
function AffreturnIndication() {

    const info = document.querySelector('#returnInfo');
    setTimeout(() => {
        info.classList.toggle('active');
    },350)
    

}

