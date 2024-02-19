<?php
    // Connexion à la base de données (à remplacer par vos informations de connexion)
    include('../config.php');
    
    //Connexion à la Base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer et lier les paramètres de la requête pour l'insertion dans la table "sell"
    $sql = "INSERT INTO sell (name_model, price, description, kilometer, color, date, horsepower, doors, places, fuel, transmission) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisisiiisss", $name_model, $price, $description, $kilometer, $color, $date, $horsepower, $doors, $places, $fuel, $transmission);

    // Récupérer les données du formulaire
    $name_model = $_POST['vehicle_name'];
    $price = $_POST['vehicle_price'];
    $description = $_POST['input_message'];
    $kilometer = $_POST['vehicle_km'];
    $color = $_POST['vehicle_color'];
    $date = $_POST['vehicle_date'];
    $horsepower = $_POST['vehicle_cv'];
    $doors = $_POST['vehicle_doors'];
    $places = $_POST['vehicle_places'];
    $fuel = $_POST['vehicle_fuel'];
    $transmission = $_POST['vehicle_type'];

    // Exécuter la requête préparée
    if ($stmt->execute() === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Récupérer l'ID de l'élément inséré
    $sell_id = $conn->insert_id;

    // Gérer le téléchargement des images
    $target_dir = "../../elements/images/sell/";
    $target_files = array();

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $target_file = $target_dir . basename($_FILES['images']['name'][$key]);
        if (move_uploaded_file($tmp_name, $target_file)) {
            $target_files[] = $target_file;
        } else {
            echo "Error uploading file: " . $_FILES['images']['name'][$key];
        }
    }

    // Insérer les chemins des images dans la table sellimages
    $sql_images = "INSERT INTO sellimages (ForeignKey, ImagePath) VALUES (?, ?)";
    $stmt_images = $conn->prepare($sql_images);

    // Insertion des chemins d'accès
    $stmt_images->bind_param("is", $foreign_key, $image_path);

    // L'ID de l'élément inséré dans la table "sell" comme clé étrangère
    $foreign_key = $sell_id;

    // Remplir les variables avec les chemins
    foreach ($target_files as $file) {
        $image_path = $file;
        if ($stmt_images->execute() === FALSE) {
            echo "Error: " . $sql_images . "<br>" . $conn->error;
        }
    }

    // Fermer la connexion
    $conn->close();
?>