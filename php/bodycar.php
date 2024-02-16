<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "isopropanol";
    $dbname = "main";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupération des valeurs du formulaire
    $firstText = $_POST['firstText'];
    $secondText = $_POST['secondText'];
    $thirdText = $_POST['thirdText'];

    // Traitement de l'upload des images
    function uploadImage($imageField, $imageName, $uploadDir) {
        if ($_FILES[$imageField]['size'] > 0) {
            $uploadFile = $uploadDir . basename($_FILES[$imageField]['name']);
            
            // Suppression de l'ancienne image si elle existe
            $oldImageName = $imageName;
            $oldImagePath = $uploadDir . $oldImageName;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            
            // Téléchargement de la nouvelle image
            move_uploaded_file($_FILES[$imageField]['tmp_name'], $uploadFile);
            return basename($_FILES[$imageField]['name']);
        } else {
            // Si aucune nouvelle image n'est téléchargée, conserver l'ancien nom de l'image
            return $imageName;
        }
    }

    $uploadDir = "../../elements/images/pages/bodycar/";

    // Mise à jour des informations dans la base de données
    $firstImage = uploadImage('firstImage', $_FILES['firstImage']['name'], $uploadDir);
    $secondImage = uploadImage('secondImage', $_FILES['secondImage']['name'], $uploadDir);
    $thirdImage = uploadImage('thirdImage', $_FILES['thirdImage']['name'], $uploadDir);

    $sql = "UPDATE repair SET FirstText = ?, SecondText = ?, ThirdText = ?, FirstImage = ?, SecondImage = ?, ThirdImage = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $firstText, $secondText, $thirdText, $firstImage, $secondImage, $thirdImage);

    // Exécution de la requête préparée
    if ($stmt->execute()) {
        echo "Mise à jour réussie";
    } else {
        echo "Erreur lors de la mise à jour: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
