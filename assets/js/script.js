'use strict';



        /**
        * add event on element
        */

        const addEventOnElem = function (elem, type, callback) {
          if (elem.length > 1) {
            for (let i = 0; i < elem.length; i++) {
              elem[i].addEventListener(type, callback);
            }
          } else {
            elem.addEventListener(type, callback);
          }
        }
        let menu = document.querySelector ('#menu-icon');
        let navlist = document.querySelector('.navlist'); 
        
         menu.onclick = () => {
            menu.classList.toggle('bx-x'); 
            navlist.classList.toggle('open');
        };
        sr.reveal('.hero-img', {delay: 450, origin: 'top'});
        sr.reveal('.icons', {delay: 500, origin: 'left'}) ;


        /**
        * navbar toggle
        */

        const navbar = document.querySelector("[data-navbar]");
        const navTogglers = document.querySelectorAll("[data-nav-toggler]");
        const navLinks = document.querySelectorAll("[data-nav-link]");
        const overlay = document.querySelector("[data-overlay]");

        const toggleNavbar = function () {
          navbar.classList.toggle("active");
          overlay.classList.toggle("active");
        }

        addEventOnElem(navTogglers, "click", toggleNavbar);

        const closeNavbar = function () {
          navbar.classList.remove("active");
          overlay.classList.remove("active");
        }

        addEventOnElem(navLinks, "click", closeNavbar);



        /**
        * header active when scroll down to 100px
        */

        const header = document.querySelector("[data-header]");
        const backTopBtn = document.querySelector("[data-back-top-btn]");

        const activeElem = function () {
          if (window.scrollY > 100) {
            header.classList.add("active");
            backTopBtn.classList.add("active");
          } else {
            header.classList.remove("active");
            backTopBtn.classList.remove("active");
          }
        }

        addEventOnElem(window, "scroll", activeElem);

        function scrollRight2hang1() {
          const testimonialsContainer = document.getElementById('hang1');
          testimonialsContainer.scrollLeft -= 300;
        }
        
        function scrollRighthang1() {
          const testimonialsContainer = document.getElementById('hang1');
          testimonialsContainer.scrollLeft += 300;
        }
        function scrollRight2hang2() {
          const testimonialsContainer = document.getElementById('hang2');
          testimonialsContainer.scrollLeft -= 300;
        }
        
        function scrollRighthang2() {
          const testimonialsContainer = document.getElementById('hang2');
          testimonialsContainer.scrollLeft += 300;
        }
        function scrollRight2hang3() {
          const testimonialsContainer = document.getElementById('hang3');
          testimonialsContainer.scrollLeft -= 300;
        }
        
        function scrollRighthang3() {
          const testimonialsContainer = document.getElementById('hang3');
          testimonialsContainer.scrollLeft += 300;
        }
        

const aboutItems = document.querySelectorAll('.about-item');

aboutItems.forEach(item => {
  item.addEventListener('click', () => {
    const detail = item.querySelector('.detail');
    detail.style.display = detail.style.display === 'none' ? 'block' : 'none';
  });
});
        
      