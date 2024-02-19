document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.sell_delete');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var sellId = this.getAttribute('data-sell-id');
            var sellDiv = this.closest('.cases'); // Trouver la div parente avec la classe 'cases'
            if (confirm('Êtes-vous sûr de vouloir supprimer cette vente?')) {
                // Envoie de la requête AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../../php/deletesell.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Cacher la div parente
                        sellDiv.style.display = 'none';
                    } else {
                        console.log('Erreur de suppression: ' + xhr.responseText);
                    }
                };
                xhr.send('sell_id=' + sellId);
            }
        });
    });
});
