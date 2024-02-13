<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Connexion à la base de données (à remplacer avec vos informations de connexion)
    $servername = "localhost";
    $username = "votre_nom_utilisateur";
    $password = "votre_mot_de_passe";
    $dbname = "votre_base_de_donnees";

    // Créer une connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $firstname = $conn->real_escape_string($firstname);
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $phone = $conn->real_escape_string($phone);
    $message = $conn->real_escape_string($message);

    // Créer et exécuter la requête SQL d'insertion
    $sql = "INSERT INTO contact (FirstName, Name, Email, Phone, Message) VALUES ('$firstname', '$name', '$email', '$phone', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été insérées avec succès dans la table contact.";
    } else {
        echo "Erreur lors de l'insertion des données : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>