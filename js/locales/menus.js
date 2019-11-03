function select_menu(elm, menu) {
    // trouve l'element active avec un systeme vas et viens 
    
    let curr_elm = document.querySelector(".menu-item.active");
    // active la div selectioné
    
    if (curr_elm) curr_elm.classList.remove("active");
  // désactive la div  qui n'est plus selectioné 
    
    elm.classList.add("active"); // --> passe le bouton selectioné en active au du niveau css 
  
    // montre la div content1 quand midi est selectioné 
    // desactive la div qui n'est plus selectionée
    let curr_cont = document.querySelector(".content.active");
    if (curr_cont) curr_cont.classList.remove("active");
   
    // Montre les div #content1 et 2
    let cont = document.getElementById(menu);
    cont.classList.add("active");
  
  }
  