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
    $userID = $_POST['userID'];
    $newPassword = $_POST['newPassword'];

    // Préparation de la requête SQL pour mettre à jour le mot de passe
    $sql = "UPDATE users SET Password = '$newPassword' WHERE UserID = $userID";

    // Exécution de la requête SQL
    if ($conn->query($sql) === TRUE) {
        echo "Mot de passe mis à jour avec succès !";
    } else {
        echo "Erreur lors de la mise à jour du mot de passe : " . $conn->error;
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
?>