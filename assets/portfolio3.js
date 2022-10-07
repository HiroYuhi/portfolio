
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
            iconeList[i2].classList.remove("icone-active")
            console.log(tableauList[i]);
        }
        tableauList[i].classList.remove("trans-tableau-hide");
        tableauList[i].classList.add("trans-tableau-visible");
        iconeList[i].classList.add("icone-active");
        console.log(tableauList[i]);
    })
}

