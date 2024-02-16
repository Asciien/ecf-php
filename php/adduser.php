<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "isopropanol";
$dbname = "main";

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

// Préparation de la requête SQL
$sql = "INSERT INTO users (Nom, Prenom, Email, Password, Role) VALUES ('$userLastName', '$userName', '$userEmail', '$userPassword', '$userRole')";

// Exécution de la requête SQL
if ($conn->query($sql) === TRUE) {
    echo "Utilisateur ajouté avec succès !";
} else {
    echo "Erreur lors de l'ajout de l'utilisateur : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
