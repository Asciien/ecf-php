<?php
    $conn = new mysqli("localhost", "root", "isopropanol", "main");
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["opinion_name"];
        $comment = $_POST["opinion_message"];
        $rate = $_POST["rating"];

        
        $sql = "INSERT INTO opinion (Name, Rating, Commentary) VALUES ('$name', $rate, '$comment')";
        echo '<script>alert("Votre avis a été envoyé avec succès.");</script>';
    }

    $conn->close();
?>