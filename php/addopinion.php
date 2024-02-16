<?php
    $servername = "localhost";
    $username = "root";
    $password = "isopropanol";
    $dbname = "main";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupération des données du formulaire
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $message = $_POST['message'];

    // Préparation de la requête SQL
    $sql = "INSERT INTO opinion (Name, Rating, Commentary, IsAllowed) VALUES ('$name', $rating, '$message', 1)";

    // Exécution de la requête SQL
    if ($conn->query($sql) === TRUE) {
        echo "Opinion enregistrée avec succès !";
    } else {
        echo "Erreur lors de l'enregistrement de l'opinion : " . $conn->error;
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
?>