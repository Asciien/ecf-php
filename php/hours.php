<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Informations de connexion à la BDD
    include('../config.php');
    
    //Connexion à la Base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Parcourir les jours de la semaine
    $days_of_week = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    foreach ($days_of_week as $day) {
        $isOpen = isset($_POST[$day.'_open']) ? 1 : 0;
        // Récupération des heures d'ouverture et de fermeture
        $morningOpeningTime = $_POST[$day.'_open_morning'];
        $morningClosingTime = $_POST[$day.'_close_morning'];
        $afternoonOpeningTime = $_POST[$day.'_open_afternoon'];
        $afternoonClosingTime = $_POST[$day.'_close_afternoon'];

        // Requête SQL
        $sql = "UPDATE openhours SET IsOpen=?, MorningOpeningTime=?, MorningClosingTime=?, AfternoonOpeningTime=?, AfternoonClosingTime=? WHERE Day=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssss", $isOpen, $morningOpeningTime, $morningClosingTime, $afternoonOpeningTime, $afternoonClosingTime, $day);
        $stmt->execute(); // Execution de la requète
    }

    // Fermeture de la connexion
    $conn->close();

    // Réponse
    echo json_encode(array("success" => true));
} else {
    // Réponse si erreur
    echo json_encode(array("error" => "Le formulaire n'a pas été soumis correctement."));
}
?>
