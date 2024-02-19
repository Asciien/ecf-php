document.getElementById("user_form").addEventListener("submit", function(event) {
    // Empêcher l'envoi du formulaire
    event.preventDefault();

    // Envoyer le formulaire via AJAX
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../php/adduser.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                if (xhr.responseText === "success") {
                    alert("Utilisateur ajouté avec succès !");
                    document.getElementById("user_form").reset();
                } else {
                    alert("Erreur lors de l'ajout de l'utilisateur");
                }
            } else {
                alert("Erreur lors de la communication avec le serveur");
            }
        }
    };
    xhr.send(formData);
});
