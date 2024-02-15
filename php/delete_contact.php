<?php
if(isset($_POST['contact_id'])) {
    // Récupérer l'ID du contact à supprimer depuis la requête POST
    $contact_id = $_POST['contact_id'];

    // Connexion à la base de données (à remplacer par vos informations de connexion)
    $servername = "localhost";
    $username = "root";
    $password = "isopropanol";
    $dbname = "main";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer et exécuter la requête SQL pour supprimer le contact avec l'ID donné
    $sql = "DELETE FROM contact WHERE ContactID = $contact_id";
    if ($conn->query($sql) === TRUE) {
        echo "Contact supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du contact: " . $conn->error;
    }

    $conn->close();
}
?>
