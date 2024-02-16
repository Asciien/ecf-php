<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Connexion à la base de données (à remplacer avec vos propres informations de connexion)
    $servername = "localhost";
    $username = "root";
    $password = "isopropanol";
    $dbname = "main";

    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Parcourir les jours de la semaine
    $days_of_week = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    foreach ($days_of_week as $day) {
        // Vérification si le jour est ouvert
        $isOpen = isset($_POST[$day.'_open']) ? 1 : 0;
        // Récupération des heures d'ouverture et de fermeture
        $morningOpeningTime = $_POST[$day.'_open_morning'];
        $morningClosingTime = $_POST[$day.'_close_morning'];
        $afternoonOpeningTime = $_POST[$day.'_open_afternoon'];
        $afternoonClosingTime = $_POST[$day.'_close_afternoon'];

        // Préparation de la requête SQL
        $sql = "UPDATE openhours SET IsOpen=?, MorningOpeningTime=?, MorningClosingTime=?, AfternoonOpeningTime=?, AfternoonClosingTime=? WHERE Day=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssss", $isOpen, $morningOpeningTime, $morningClosingTime, $afternoonOpeningTime, $afternoonClosingTime, $day);
        $stmt->execute();
    }

    // Fermeture de la connexion
    $conn->close();

    // Réponse JSON pour JavaScript
    echo json_encode(array("success" => true));
} else {
    // Réponse JSON en cas d'erreur
    echo json_encode(array("error" => "Le formulaire n'a pas été soumis correctement."));
}
?>
