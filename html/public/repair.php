<!DOCTYPE html>
<html lang="fr">
    <head>

        <!--Head informations-->
        <title>Garage V.Parrot | Réparations</title>
        <meta charset="utf-8">
        <meta name="author" content="Raphaël Quinchon">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Import CSS-->
        <link href="../../css/repair.css" rel="stylesheet">
        <link href="../../css/materialize.css" rel="stylesheet">

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body>
        <?php
            // Connexion à la base de données
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
            <article id="content_first">
                <div class="content">
                    <?php
                        $sql = "SELECT FirstText, FirstImage from repair";
                        $result = $conn->query($sql);

                        $row = $result->fetch_assoc();

                        echo "<p class='paragraph'>" . $row['FirstText'] . "</p>";
                        echo "<img src='../../elements/images/pages/repair/" . $row['FirstImage'] . "' />";
                    ?>
                </div>
                <div class="edition_button_admin">
                    <button id="edit_button_text_second"><i class="material-icons">edit</i></button>
                    <button id="edit_button_image_second"><i class="material-icons">cloud_upload</i></button>
                </div>
            </article>
            <article id="content_second">
                <div class="content_mirror">
                    <?php
                        $sql = "SELECT SecondText, SecondImage from repair";
                        $result = $conn->query($sql);

                        $row = $result->fetch_assoc();

                        echo "<p class='paragraph'>" . $row['SecondText'] . "</p>";
                        echo "<img src='../../elements/images/pages/repair/" . $row['SecondImage'] . "' />";
                    ?>
                </div>
                <div class="edition_button_admin">
                    <button id="edit_button_text_second"><i class="material-icons">edit</i></button>
                    <button id="edit_button_image_second"><i class="material-icons">cloud_upload</i></button>
                </div>
            </article>
            <article id="content_third">
                <div class="content">
                    <?php
                        $sql = "SELECT ThirdText, ThirdImage from repair";
                        $result = $conn->query($sql);

                        $row = $result->fetch_assoc();

                        echo "<p class='paragraph'>" . $row['ThirdText'] . "</p>";
                        echo "<img src='../../elements/images/pages/repair/" . $row['ThirdImage'] . "' />";
                    ?>
                </div>
                <div class="edition_button_admin">
                    <button id="edit_button_text_second"><i class="material-icons">edit</i></button>
                    <button id="edit_button_image_second"><i class="material-icons">cloud_upload</i></button>
                </div>
            </article>
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