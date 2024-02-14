//Gestion de l'affichage de l'onglet "Pages"

var pagesRepairButton = document.getElementById("pages_choose_repair")
var pagesBodycarButton = document.getElementById("pages_choose_bodycar")
var repairEdition = document.getElementById("repair_page")
var bodycarEdition = document.getElementById("bodycar_page")

pagesRepairButton.addEventListener("click", function() {
    repairEdition.style.display = "block";
    bodycarEdition.style.display = "none"
});

pagesBodycarButton.addEventListener("click", function() {
    repairEdition.style.display = "none";
    bodycarEdition.style.display = "block"
});

//Gestion de l'affichage des différents onglets

function Display(onglet) {
    let pagesList = ["pages", "opinion", "users", "contact", "sells", "hours"];

    for (let i = 0; i < pagesList.length; i++) {
        let displayPages = document.getElementsByClassName(pagesList[i]);
        for (let j = 0; j < displayPages.length; j++) {
            displayPages[j].style.display = "none";
        }
    }

    if (onglet === "hours") {
        let hourElements = document.getElementsByClassName(onglet);
        if (hourElements.length > 0) {
            hourElements[0].style.display = "flex";
        }
    } else {
        let otherElements = document.getElementsByClassName(onglet);
        if (otherElements.length > 0) {
            otherElements[0].style.display = "block";
        }
    }
}
