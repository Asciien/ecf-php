document.addEventListener('DOMContentLoaded', function() {
    var approveButtons = document.querySelectorAll('.opinion_button_choice[data-action="approve"]');
    var disapproveButtons = document.querySelectorAll('.opinion_button_choice[data-action="disapprove"]');

    // Gestion de l'événement pour les boutons d'approbation
    approveButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var opinionId = button.getAttribute('data-opinion-id');
            // Envoi d'une requête AJAX pour mettre à jour la base de données
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../php/opinion.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Cacher la tuile de l'avis après approbation
                    var opinionTile = document.getElementById('opinionTile_' + opinionId);
                    if (opinionTile) {
                        opinionTile.style.display = 'none';
                    }
                }
            };
            xhr.send('action=approve&opinion_id=' + opinionId);
        });
    });

    // Gestion de l'événement pour les boutons de désapprobation
    disapproveButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var opinionId = button.getAttribute('data-opinion-id');
            // Envoi d'une requête AJAX pour supprimer l'avis de la base de données
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../php/opinion.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Cacher la tuile de l'avis après désapprobation
                    var opinionTile = document.getElementById('opinionTile_' + opinionId);
                    if (opinionTile) {
                        opinionTile.style.display = 'none';
                    }
                }
            };
            xhr.send('action=disapprove&opinion_id=' + opinionId);
        });
    });
});
