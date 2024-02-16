<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "isopropanol";
$dbname = "main";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifie si l'action est définie et récupère les données POST
if (isset($_POST['action']) && isset($_POST['opinion_id'])) {
    $action = $_POST['action'];
    $opinionId = $_POST['opinion_id'];

    // Met à jour la base de données en fonction de l'action
    if ($action === 'approve') {
        $sql = "UPDATE opinion SET IsAllowed = 1 WHERE id = ?";
    } elseif ($action === 'disapprove') {
        $sql = "DELETE FROM opinion WHERE id = ?";
    }

    // Prépare la requête
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $opinionId);

    // Exécute la requête et vérifie le succès
    if ($stmt->execute()) {
        echo "Action exécutée avec succès.";
    } else {
        echo "Erreur lors de l'exécution de l'action.";
    }

    // Ferme la connexion à la base de données
    $stmt->close();
    $conn->close();
} else {
    echo "Action non spécifiée ou données manquantes.";
}
?>
