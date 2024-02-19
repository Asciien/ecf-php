$(document).ready(function(){
    $('#opinion_form').submit(function(event){
        // Empêcher le formulaire d'être soumis avant la fin du script
        event.preventDefault();

        // Récupérer les valeurs des champs du formulaire
        var name = $('#input_name').val();
        var rating = $('#opinion_rating').val();
        var message = $('#input_message').val();

        // Envoyer les données du formulaire via AJAX
        $.ajax({
            url: '../../php/addopinion.php',
            type: 'POST',
            data: {
                name: name,
                rating: rating,
                message: message
            },
            success: function(response){
                // Gérer la réponse du serveur si nécessaire
                alert('Opinion enregistrée avec succès !');
                // Réinitialiser le formulaire
                $('#opinion_form')[0].reset();
            },
            error: function(xhr, status, error){
                // Gérer les erreurs de la requête AJAX si nécessaire
                alert('Une erreur s\'est produite lors de l\'enregistrement de l\'opinion.');
                console.error(xhr.responseText);
            }
        });
    });
});
