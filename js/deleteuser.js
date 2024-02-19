document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete_user');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const userId = this.closest('.user_info').getAttribute('data-user-id');
            if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                // Envoyer une requête pour supprimer l'utilisateur avec "userId"
                fetch('../php/deleteuser.php?id=' + userId, {
                    method: 'DELETE',
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur lors de la suppression de l\'utilisateur');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    // Actualiser la liste des users
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression :', error);
                });
            }
        });
    });
});