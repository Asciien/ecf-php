//Apparition de la fenêtre d'avis 

var displayElement = document.getElementById("opinion_popup");
var opinionAddButton = document.getElementById("opinion_add_button");
var opinionCloseButton = document.getElementById("opinion_close_button")

opinionAddButton.addEventListener("click", function() {
    displayElement.style.display = "flex"
});

opinionCloseButton.addEventListener("click", function() {
    displayElement.style.display = "none"
});