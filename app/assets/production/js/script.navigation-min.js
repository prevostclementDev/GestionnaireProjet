const baseUrl=document.querySelector("base").getAttribute("href");function requestPage(e,t){let a=new XMLHttpRequest;a.open("GET",e,!0),a.onreadystatechange=function(){if(4===a.readyState)return 200===a.status&&(t(JSON.parse(a.response)),!0)},a.setRequestHeader("ajaxRequestServer","true"),a.send()}function RebootEventLink(a){const e=document.querySelectorAll("#navigationHeader .Hlink");e.forEach(t=>{t.addEventListener("click",function(e){e.preventDefault(),changePage(newpage=t.getAttribute("href"),a,t)})})}function projetCall(a){const e=document.querySelectorAll(".projet a");0<e.length&&e.forEach(t=>{t.onclick=e=>{e.preventDefault(),initProjetPage(slug=t.getAttribute("href"),a)}})}function initProjetPage(t,a){loader(),window.scrollTo(0,0),requestPage("../app/projet/"+t,e=>{a.classList.forEach(e=>{a.classList.remove(e)}),a.classList.add("projectPage"),a.innerHTML=e,loader(),task_list_open(),task_add_open(),eventFor_finishProject(),eventFor_deleteProject(),eventFor_addList(),eventFor_deleteList(),eventFor_addTask(),eventFor_valideTask(),eventFor_unvalideTask(),eventFor_deleteTask(),document.title="Gestionnaire projets | projet",window.history.pushState({direction:"projet/"+t},"projet/"+t,window.location.origin+baseUrl+"projet/"+t)})}function changePage(t,a,o){return window.scrollTo(0,0),t.includes("-")?(linkExplode=t.split("-"),document.title="Gestionnaire projets | "+linkExplode[0]+" "+linkExplode[1]):document.title="Gestionnaire projets | "+t,loader(),requestPage("../app/"+t,e=>{a.classList.forEach(e=>{a.classList.remove(e)}),null!=(active=document.querySelector("#navigationHeader .Hlink.active"))&&active.classList.remove("active"),o.classList.add("active"),a.classList.add(o.getAttribute("attr_class")),a.innerHTML=e,loader(),projetCall(a),window.history.pushState({direction:t},o.getAttribute("attr_class"),window.location.origin+baseUrl+t)}),!0}window.addEventListener("load",function(){const o=document.querySelector("#header"),i=document.querySelector("#page-content");window.location==window.location.origin+baseUrl+"accueil"||window.location==window.location.origin+baseUrl||window.location==window.location.origin+baseUrl+"index.php"?(window.history.pushState({direction:"accueil"},"accueil",window.location.origin+baseUrl+"accueil"),requestPage("../app/page/accueil.php?getHeader=true",e=>{o.innerHTML=e[0],i.classList.forEach(e=>{i.classList.remove(e)}),document.querySelector("[attr_class=accueil]").classList.add("active"),i.classList.add("accueil"),i.innerHTML=e[1],RebootEventLink(i),projetCall(i)})):RebootEventLink(i),projetCall(i),window.onpopstate=e=>{var t,a;null==e.state?(loader(),requestPage("../app/page/accueil.php?getHeader=true",e=>{o.innerHTML=e[0],i.classList.forEach(e=>{i.classList.remove(e)}),document.querySelector("[attr_class=accueil]").classList.add("active"),i.classList.add("accueil"),loader(),i.innerHTML=e[1],projetCall(i)})):(loader(),t=/projets-([a-zA-Z]+)/g,a=/projet\/([a-zA-Z-]+)/g,"accueil"==e.state.direction?(classPage="accueil",type="noneA",ajaxCall=classPage,document.title="Gestionnaire projets | accueil"):-1!=e.state.direction.search(t)?(classPage="view-list",type=e.state.direction.split("-")[1],ajaxCall=e.state.direction,document.title="Gestionnaire projets | projets "+type):"search"==e.state.direction?(classPage="searchPage",type="noneS",ajaxCall="search",document.title="Gestionnaire projets | search"):-1!=e.state.direction.search(a)&&(classPage="projectPage",type="now",ajaxCall=e.state.direction,document.title="Gestionnaire projets | projet"),requestPage("../app/"+ajaxCall,e=>{i.classList.forEach(e=>{i.classList.remove(e)}),document.querySelector("#navigationHeader .Hlink.active").classList.remove("active"),document.querySelector("[attr_type="+type+"]").classList.add("active"),i.classList.add(classPage),i.innerHTML=e,loader(),projetCall(i)}))}});