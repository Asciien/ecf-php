<?php
// Infor de connexion à la BDD
include('../config.php');
        
$conn = new mysqli($servername, $username, $password, $dbname);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifie si opinion_id est set et si un formulaire a été soumis
if (isset($_POST['action']) && isset($_POST['opinion_id'])) {
    $action = $_POST['action'];
    $opinionId = $_POST['opinion_id'];

    // Met à jour la base de données
    if ($action === 'approve') {
        $sql = "UPDATE opinion SET IsAllowed = 1 WHERE id = ?";
    } elseif ($action === 'disapprove') {
        $sql = "DELETE FROM opinion WHERE id = ?";
    }

    // Requète
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $opinionId);

    // Exécute la requête
    if ($stmt->execute()) {
        echo "Action exécutée avec succès.";
    } else {
        echo "Erreur lors de l'exécution de l'action.";
    }

    $stmt->close(); //Tue la requète
    $conn->close(); // Ferme la connexion
} else {
    echo "Action non spécifiée ou données manquantes.";
}
?>
