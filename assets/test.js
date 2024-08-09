let menu = document.querySelector ('#menu-icon');
let navlist = document.querySelector('.navlist'); 

 menu.onclick = () => {
    menu.classList.toggle('bx-x'); 
    navlist.classList.toggle('open');
};
sr.reveal('.hero-img', {delay: 450, origin: 'top'});
sr.reveal('.icons', {delay: 500, origin: 'left'}) ;