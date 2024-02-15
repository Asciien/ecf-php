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
            // Connexion à la base de données
            $servername = "localhost";
            $username = "root";
            $password = "isopropanol";
            $dbname = "main";
            
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
                <div class="case">
                    <p class="vehicule_name">Nom du véhicule</p>
                    <img src="../../elements/images/testTexture.png">
                    <div class="info">
                        <p class="prix">n/a</p>
                        <p class="circulation">n/a</p>
                        <p class="kilometrage">n/a</p>
                    </div>
                    <button class="more_button">En savoir plus</button>
                </div>
                <div class="case">
                    <p class="vehicule_name">Nom du véhicule</p>
                    <img src="../../elements/images/testTexture.png">
                    <div class="info">
                        <p class="prix">n/a</p>
                        <p class="circulation">n/a</p>
                        <p class="kilometrage">n/a</p>
                    </div>
                    <button class="more_button">En savoir plus</button>
                </div>
                <div class="case">
                    <p class="vehicule_name">Nom du véhicule</p>
                    <img src="../../elements/images/testTexture.png">
                    <div class="info">
                        <p class="prix">n/a</p>
                        <p class="circulation">n/a</p>
                        <p class="kilometrage">n/a</p>
                    </div>
                    <button class="more_button">En savoir plus</button>
                </div>
                <div class="case">
                    <p class="vehicule_name">Nom du véhicule</p>
                    <img src="../../elements/images/testTexture.png">
                    <div class="info">
                        <p class="prix">n/a</p>
                        <p class="circulation">n/a</p>
                        <p class="kilometrage">n/a</p>
                    </div>
                    <button class="more_button">En savoir plus</button>
                </div>
                <div class="case">
                    <p class="vehicule_name">Nom du véhicule</p>
                    <img src="../../elements/images/testTexture.png">
                    <div class="info">
                        <p class="prix">n/a</p>
                        <p class="circulation">n/a</p>
                        <p class="kilometrage">n/a</p>
                    </div>
                    <button class="more_button">En savoir plus</button>
                </div>
            </div>
        </main>

        <footer>
            <div id="hours">

                    
                <?php

                    // Requête SQL pour récupérer les informations de la table openhours
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
                            // Afficher les informations selon le format demandé
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