$(document).ready(function(){
    $('.save_password').click(function(){
        var userID = $(this).data('user-id');
        var newPassword = $('#user_password_' + userID).val();

        // Envoyer la demande de mise à jour du mot de passe via AJAX
        $.ajax({
            url: '../../php/updatepassword.php',
            type: 'POST',
            data: {
                userID: userID,
                newPassword: newPassword
            },
            success: function(response){
                // Gérer la réponse du serveur si nécessaire
                alert('Mot de passe mis à jour avec succès !');
            },
            error: function(xhr, status, error){
                // Gérer les erreurs de la requête AJAX si nécessaire
                alert('Une erreur s\'est produite lors de la mise à jour du mot de passe.');
                console.error(xhr.responseText);
            }
        });
    });
});
