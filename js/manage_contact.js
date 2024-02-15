document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.contact_delete');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var contactID = button.getAttribute('data-contact-id');
            if (confirm('Voulez-vous vraiment supprimer ce contact ?')) {
                // Cacher la div parente du bouton de suppression
                var parentDiv = button.closest('.contact_case');
                parentDiv.style.display = 'none';

                // Envoyer une requête AJAX pour supprimer le contact
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../../php/delete_contact.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Réponse de la requête AJAX
                        console.log(xhr.responseText);
                        // Vous pouvez ajouter ici un feedback visuel si nécessaire
                    }
                };
                xhr.send('contact_id=' + contactID); // Envoi de l'ID du contact à supprimer
            }
        });
    });
});
