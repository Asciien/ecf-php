<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Raphaël Quinchon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Garage V.Parrot | Détails du véhicule</title>
    <link href="../../css/car_detail.css" rel="stylesheet">
    <link href="../../css/materialize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../../js/sell.js"></script>
</head>
    <body>
        <header>
            <ul>
                <li><a href="../../index.php"><img id="logo" src="../../elements/images/header/logo.svg" alt="logo-garage"></a></li>
                <li><a href="../../html/manage/login.php"><img id="login" src="../../elements/images/header/login.svg" alt="connexion-icon"></a></li>
            </ul>
            <div id="phone">
                <a class="waves-effect waves-light btn-small" href="tel:0234567890"><i class="material-icons left">phone</i>02 34 56 78 90</a>
            </div>
        </header>
        <?php
            include('../../config.php');
            // Connexion à la Base de données
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Vérifier la connexion
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Vérifier si l'ID du véhicule est défini dans l'URL
            if(isset($_GET['vehicle_id'])) {
                // Récupérer l'ID du véhicule depuis l'URL
                $vehicle_id = $_GET['vehicle_id'];

                // Requête SQL pour récupérer les détails du véhicule depuis la table sell
                $sql_sell = "SELECT * FROM sell WHERE id = $vehicle_id";
                $result_sell = $conn->query($sql_sell);

                // Vérifier si il y a des résultats
                if ($result_sell->num_rows > 0) {
                    // Boucler à travers chaque ligne de la table sell
                    while($row_sell = $result_sell->fetch_assoc()) {
                        echo '<main>';
                        echo '<p class="vehicle_model">' . $row_sell['name_model'] . '</p>';
                        echo '<div class="images">';
                        
                        // Requête SQL pour récupérer les images du véhicule
                        $sql_sellimages = "SELECT * FROM sellimages WHERE ForeignKey = $vehicle_id";
                        $result_sellimages = $conn->query($sql_sellimages);

                        // Boucler à travers chaque ligne de résultat pour la table sellimages
                        while($row_sellimages = $result_sellimages->fetch_assoc()) {
                            // Afficher les images du véhicule
                            for($i = 1; $i <= 10; $i++) {
                                $image_path = $row_sellimages['ImagePath' . $i];
                                if($image_path) {
                                    echo '<img src="../' . $image_path . '" alt="vehicle_image">';
                                }
                            }
                        }
                        echo '</div>';
                        echo '<p class="price">' . $row_sell['price'] . ' €</p>';
                        echo '<div class="details">';
                        echo '<div class="details_name">';
                        echo '<p>Kilomètres:</p>';
                        echo '<p>Couleur:</p>';
                        echo '<p>Date de mise en circulation:</p>';
                        echo '<p>Puissance:</p>';
                        echo '<p>Portes:</p>';
                        echo '<p>Places:</p>';
                        echo '<p>Carburant:</p>';
                        echo '<p>Transmission:</p>';
                        echo '</div>';
                        echo '<div class="detail_infos">';
                        echo '<p>' . $row_sell['kilometer'] . '</p>';
                        echo '<p>' . $row_sell['color'] . '</p>';
                        echo '<p>' . $row_sell['date'] . '</p>';
                        echo '<p>' . $row_sell['horsepower'] . '</p>';
                        echo '<p>' . $row_sell['doors'] . '</p>';
                        echo '<p>' . $row_sell['places'] . '</p>';
                        echo '<p>' . $row_sell['fuel'] . '</p>';
                        echo '<p>' . $row_sell['transmission'] . '</p>';
                        echo '</div>';
                        echo '</div>';

                        // Afficher la description du véhicule
                        echo '<p class="description">' . $row_sell['description'] . '</p>';

                        echo '</main>';
                    }
                } else {
                    echo "Aucun véhicule trouvé.";
                }
            } else {
                echo "ID du véhicule non spécifié.";
            }
        ?>
        <footer>
            <div id="hours">     
                <?php
                    // Requête SQL pour récupérer les informations de la table "openhours"
                    $sql = "SELECT Day, IsOpen,
                    DATE_FORMAT(MorningOpeningTime, '%H:%i') AS MorningOpeningTime,
                    DATE_FORMAT(MorningClosingTime, '%H:%i') AS MorningClosingTime,
                    DATE_FORMAT(AfternoonOpeningTime, '%H:%i') AS AfternoonOpeningTime,
                    DATE_FORMAT(AfternoonClosingTime, '%H:%i') AS AfternoonClosingTime
                    FROM openhours;";
                    $result = $conn->query($sql);
                        
                    // Vérifier si des résultats sont retournés
                    if ($result->num_rows > 0) {
                        // Parcourir chaque ligne de résultat
                        while($row = $result->fetch_assoc()) {
                            echo "<p>" . $row["Day"] . ":    ";
                                
                            if ($row["IsOpen"]) {
                                // Jour ouvert
                                echo $row["MorningOpeningTime"] . " - " . $row["MorningClosingTime"] . " & " . $row["AfternoonOpeningTime"] . " - " . $row["AfternoonClosingTime"];
                            } else {
                                // Jour fermé
                                echo "Fermé";
                            }
                                
                            echo "</p>";
                        }
                    } else {
                        echo "Aucun résultat trouvé";
                    }
                        
                    // Fermer la connexion à la base de données
                    $conn->close();

                ?>
            </div>
            <a href="../../elements/images/credits.txt">Sources des images</a>
        </footer>
    </body>
</html>