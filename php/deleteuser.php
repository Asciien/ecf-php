<?php
// Récupération des infos depuis le JS
if(isset($_GET['id']) && !empty($_GET['id'])){
    $user_id = $_GET['id'];

    //info de connexion
    include '../config.php';

    // Requête SQL pour supprimer l'user
    $sql = "DELETE FROM users WHERE UserID = '$user_id'";

    if ($conn->query($sql) === TRUE) {
        // Success
        echo json_encode(array('message' => 'Utilisateur supprimé avec succès'));
    } else {
        // ou non
        echo json_encode(array('error' => 'Erreur lors de la suppression de l\'utilisateur'));
    }

    $conn->close(); // Fermer la connexion à la base de données
} else {
    // L'ID de l'utilisateur à supprimer n'a pas été spécifié
    echo json_encode(array('error' => 'ID de l\'utilisateur manquant'));
}
?>
