<?php
// Connexion à la base de données
include('../config.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la Base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupérer les données du formulaire
    $userName = $_POST['user_name'];
    $userLastName = $_POST['user_lastname'];
    $userEmail = $_POST['user_email'];
    $userPassword = $_POST['user_password'];
    $userRole = $_POST['role'];

    // Convertir le rôle en chiffre en fonction du rang
    $roleValue = ($userRole === 'administrateur') ? 1 : 0;

    // Hasher le mot de passe
    $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

    // Préparation de la requête d'insertion
    $sql = "INSERT INTO users (Nom, Prenom, Email, Password, Role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Liaison des paramètres
    $stmt->bind_param("ssssi", $userLastName, $userName, $userEmail, $hashedPassword, $roleValue);

    // Exécution de la requête préparée
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    // Fermeture de la requête et de la connexion
    $stmt->close();
    $conn->close();
}
?>
