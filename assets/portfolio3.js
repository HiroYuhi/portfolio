
/* toggle nav-icones */
let btnBurger = document.getElementById("btn-burger");
let navIcones = document.getElementById("nav-icones");

btnBurger.addEventListener("click", function () {
    console.log('ok');
    navIcones.classList.toggle("nav-icones-hide");
    btnBurger.classList.toggle("animation");


});


/* affichage tableaux */
let iconeList = document.getElementsByClassName("icone");
let tableauList = document.getElementsByClassName("tableau");

let indice = 0;
tableauList[indice].classList.remove("trans-tableau-hide");
tableauList[indice].classList.add("trans-tableau-visible");

for (let i = 0; i < iconeList.length; i++) {
    iconeList[i].addEventListener("click", function () {
        for (let i2 = 0; i2 < tableauList.length; i2++) {
            tableauList[i2].classList.remove("trans-tableau-visible");
            tableauList[i2].classList.add("trans-tableau-hide");
            console.log(tableauList[i]);
        }
        tableauList[i].classList.remove("trans-tableau-hide");
        tableauList[i].classList.add("trans-tableau-visible");
        console.log(tableauList[i]);
    })
}

/*slider carte*/
let indice2 = 0;
let carte = document.getElementsByClassName("carte");
let dot = document.getElementsByClassName("dot");
carte[indice2].classList.add("visible");

let suivant = document.getElementById("suivant").addEventListener("click", function () {
    for (i = 0; i < carte.length; i++) {
        carte[i].classList.remove("visible");
        dot[i].classList.remove("active");
    }
    indice2 = indice2 + 1;
    afficherCarte(carte[indice2]);
    console.log(indice2)
});

let precedent = document.getElementById("precedent").addEventListener("click", function () {
    for (i = 0; i < carte.length; i++) {
        carte[i].classList.remove("visible");
        dot[i].classList.remove("active");
    }
    indice2 = indice2 - 1;
    afficherCarte(carte[indice2]);
    console.log(indice2)
});

function afficherCarte() {
    if (indice2 < 0) {
        indice2 = carte.length - 1;
    }
    if (indice2 > carte.length - 1) {
        indice2 = 0;
    }
    dot[indice2].classList.add("active");
    carte[indice2].classList.add("visible");
};