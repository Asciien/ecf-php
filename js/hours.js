$(document).ready(function(){
    $('#openhours_form').submit(function(e){
        e.preventDefault(); // Empêche le comportement par défaut du formulaire
        var formData = $(this).serialize(); // Récupère les données du formulaire
        $.ajax({
            type: 'POST',
            url: '../../php/hours.php', // Chemin vers le fichier PHP
            data: formData,
            success: function(response){
                alert('Les informations ont été mises à jour avec succès.');
            },
            error: function(xhr, status, error){
                alert('Une erreur s\'est produite lors de la mise à jour des informations.');
                console.log(xhr.responseText);
            }
        });
    });
});
