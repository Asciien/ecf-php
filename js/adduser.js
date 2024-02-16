$(document).ready(function(){
    $('#user_form').submit(function(event){
        event.preventDefault(); // Empêcher la soumission normale du formulaire

        var formData = $(this).serialize(); // Récupérer les données du formulaire

        // Envoyer les données du formulaire via AJAX
        $.ajax({
            url: '../../php/adduser.php',
            type: 'POST',
            data: formData,
            success: function(response){
                alert('Utilisateur ajouté avec succès !');
                $('#user_form')[0].reset(); // Réinitialiser le formulaire
            },
            error: function(xhr, status, error){
                alert('Une erreur s\'est produite lors de l\'ajout de l\'utilisateur.');
                console.error(xhr.responseText);
            }
        });
    });
});
