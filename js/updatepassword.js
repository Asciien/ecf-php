$(document).ready(function(){
    $('.save_password').click(function(){
        var userID = $(this).data('user-id');
        var newPassword = $('#user_password_' + userID).val();

        // Envoyer la demande de mise à jour du mot de passe
        $.ajax({
            url: '../../php/updatepassword.php',
            type: 'POST',
            data: {
                userID: userID,
                newPassword: newPassword
            },
            success: function(response){
                alert('Mot de passe mis à jour avec succès !'); //Confirmation
            },
            error: function(xhr, status, error){
                alert('Une erreur s\'est produite lors de la mise à jour du mot de passe.');
                console.error(xhr.responseText); //Erreur
            }
        });
    });
});
