<!DOCTYPE html>
<html lang="fr">
    <head>

        <!--Head informations-->
        <title>Garage V.Parrot | Ventes</title>
        <meta charset="utf-8">
        <meta name="author" content="Raphaël Quinchon">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Import CSS-->
        <link href="../../css/sell.css" rel="stylesheet">
        <link href="../../css/materialize.css" rel="stylesheet">

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!--Import JS-->
        <script type="text/javascript" src="../../js/sell.js"></script>
    </head>
    <body>
        <?php
            // Connexion à la BDD
            include('../../config.php');
    
            //Connexion à la Base de données
            $conn = new mysqli($servername, $username, $password, $dbname);
        ?>
        <header>
            <ul>
                <li><a href="../../index.php"><img id="logo" src="../../elements/images/header/logo.svg" alt="logo-garage"></a></li>
                <li><a href="../../html/manage/login.php"><img id="login" src="../../elements/images/header/login.svg" alt="connexion-icon"></a></li>
            </ul>
            <div id="phone">
                <a class="waves-effect waves-light btn-small" href="tel:0234567890"><i class="material-icons left">phone</i>02 34 56 78 90</a>
            </div>
        </header>

        <main>
            <div class="filters">
                <label for="prix">Prix</label>
                <input type="range" value="1" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                <output>1</output>
                <label for="prix">Kilométrage</label>
                <input type="range" value="1" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                <output>1</output>
                <label for="prix">Année de mise en circulation</label>
                <input type="range" value="1" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                <output>1</output>
            </div>
            <div class="showcase">
                <?php
                    // Informations de connexion à la BDD
                    include('../../config.php');
    
                    //Connexion à la Base de données
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Requête SQL pour récupérer les données
                    $sql = "SELECT * FROM sell";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="case">';
                            echo '<p class="vehicule_name">' . $row['name_model'] . '</p>';

                            // Requête SQL pour récupérer le chemin de la première image depuis la table "sellimages" correspondant à l'ID du véhicule dans "sell"
                            $sell_id = $row['id'];
                            $sellimages_sql = "SELECT ImagePath1 FROM sellimages WHERE ForeignKey = $sell_id LIMIT 1";
                            $sellimages_result = $conn->query($sellimages_sql);
                                
                            // Vérifier si une image a été trouvée dans la table sellimages pour ce véhicule
                            if ($sellimages_result->num_rows > 0) {
                                $sellimages_row = $sellimages_result->fetch_assoc();
                                $image_path = $sellimages_row['ImagePath1'];
                                echo '<img src="../' . $image_path . '">'; // Afficher l'image
                            } else {
                                echo '<img src="../../elements/images/default.png">'; // Afficher une image par défaut si aucune image n'est trouvée
                            }

                            echo '<div class="info">';
                            echo '<p class="prix">' . $row['price'] . ' €</p>';
                            echo '<div class="details">';
                            echo '<p class="circulation">' . $row['date'] . '</p>';
                            echo '<p class="kilometrage">' . $row['kilometer'] . ' Km</p>';
                            echo '</div>';
                            echo '</div>';

                            // Lien vers la page de détails du véhicule avec l'ID du véhicule comme paramètre GET
                            echo '<a href="car_detail.php?vehicle_id=' . $row['id'] . '" class="more_button">En savoir plus</a>';

                            echo '</div>';
                        }
                    } else {
                        echo "Aucun véhicule trouvé.";
                    }
                ?>
            </div>
        </main>

        <footer>
            <div id="hours"> 
                <?php

                    // Récupération de la table openhours
                    $sql = "SELECT Day, IsOpen,
                    DATE_FORMAT(MorningOpeningTime, '%H:%i') AS MorningOpeningTime,
                    DATE_FORMAT(MorningClosingTime, '%H:%i') AS MorningClosingTime,
                    DATE_FORMAT(AfternoonOpeningTime, '%H:%i') AS AfternoonOpeningTime,
                    DATE_FORMAT(AfternoonClosingTime, '%H:%i') AS AfternoonClosingTime
                    FROM openhours;";
                    $result = $conn->query($sql);
                    
                    // Vérifier si des résultats sont retournés
                    if ($result->num_rows > 0) {
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
                    
                    // Fermer la connexion à la BDD
                    $conn->close();

                ?>


            </div>
            <a href="../../elements/images/credits.txt">Sources des images</a>
        </footer>
    </body>
</html>