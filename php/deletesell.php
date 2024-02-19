<?php
    include('../config.php');

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sell_id'])) {
        $sellId = $_POST['sell_id'];

        // Supprimer la vente de la table "sell"
        $sql_sell = "DELETE FROM sell WHERE id = ?";
        $stmt_sell = $conn->prepare($sql_sell);
        $stmt_sell->bind_param("i", $sellId);
        $stmt_sell->execute();
        $stmt_sell->close();

        // Supprimer les images correspondantes de la table "sellimages"
        $sql_sellimages = "DELETE FROM sellimages WHERE sell_id = ?";
        $stmt_sellimages = $conn->prepare($sql_sellimages);
        $stmt_sellimages->bind_param("i", $sellId);
        $stmt_sellimages->execute();
        $stmt_sellimages->close();

        echo "Vente supprimée avec succès.";
    } else {
        echo "Erreur de requête.";
    }

    $conn->close();
?>