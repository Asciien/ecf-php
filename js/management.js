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