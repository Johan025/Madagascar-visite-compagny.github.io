// evenement bouton afficher version
const fenetreAng=document.querySelector('.fenetreFrancais');
const button=document.getElementById('ang');
const form=document.querySelector('form');

button.addEventListener ('click' , () =>{
   fenetreAng.classList.toggle('show');
})

//evenement responsive version telephone
const button_menu=document.querySelector('.logoBurger');
const head=document.querySelector('.header');
const tour=document.querySelector('.t');
const contact=document.querySelector('.c');
const about=document.querySelector('.a');


button_menu.addEventListener('click',() =>{
    head.classList.toggle('hideshow');
})

about.addEventListener('click',() =>{
    head.classList.remove('hideshow');
})

tour.addEventListener('click',() =>{
    head.classList.remove('hideshow');
})

contact.addEventListener('click',() =>{
    head.classList.remove('hideshow');
})



document.querySelector('form').addEventListener("submit", (e)=>{
    e.preventDefault();

    // if ()
})



