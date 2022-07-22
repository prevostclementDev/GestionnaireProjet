window.addEventListener('load',function(){

    let ajax = new XMLHttpRequest();
    const header = document.querySelector('#header');
    const pageContent = document.querySelector('#page-content');

    ajax.open(
        "GET",
        '../app/fonction/traitement/traitementPage.php',
        true
    );

    ajax.onreadystatechange = function() {
        if(ajax.readyState === 4){
            response = JSON.parse(ajax.response);

            header.innerHTML = response[0]
            pageContent.innerHTML = response[1]

        }
    }
    ajax.send();

})