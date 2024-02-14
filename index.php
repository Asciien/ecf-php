<!DOCTYPE html>
<html lang="fr">
    <head>

        <!--Head informations-->
        <title>Garage V.Parrot</title>
        <meta charset="utf-8">
        <meta name="author" content="Raphaël Quinchon">
        <meta name="description" content="Garage V.Parrot | Mecanique, réparation, carrosserie, ventes d'occasion">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Import CSS-->
        <link href="css/index.css" rel="stylesheet">
        <link href="css/materialize.css" rel="stylesheet">

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
                <li><a href="#!"><img id="logo" src="elements/images/Header/logo.svg" alt="logo-garage"></a></li>
                <li><a href="html/manage/login.php"><img id="login" src="elements/images/Header/login.svg" alt="connexion-icon"></a></li>
            </ul>
            <div id="phone">
                <a class="waves-effect waves-light btn-small" href="tel:0234567890"><i class="material-icons left">phone</i>02 34 56 78 90</a>
            </div>
        </header>


        <!-- Tiles navigation module in main page-->
        <main>
            <div id="tiles_navigation">
                <div class="tilenav" id="tile_first">
                    <a href="html/public/repair.php">
                        <h2 class="tilenav_title">Réparation mécaniques</h2>
                        <h3 class="tilenav_see_more">En savoir plus ></h3>
                    </a>
                </div>
                <div class="tilenav" id="tile_second">
                    <a href="html/public/bodycar.php">
                        <h2 class="tilenav_title">Réparation carrosserie</h>
                        <h3 class="tilenav_see_more">En savoir plus ></h3>
                    </a>
                </div>
                <div class="tilenav" id="tile_third">
                    <a href="html/public/sell.php">
                        <h2 class="tilenav_title">Ventes d'occasion</h2>
                        <h3 class="tilenav_see_more">En savoir plus></h3>
                    </a>
                </div>
            </div>


            <!-- Contact module in main page-->
            <div id="contact_tile">
                <h2>Contactez nous dès maintenant</h2>
                <div id="form_fields">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstname'])) {
                        // Le formulaire a été soumis, afficher un message de confirmation
                        echo "<p>Votre message a été envoyé avec succès !</p>";
                    } else {
                        // Le formulaire n'a pas encore été soumis, afficher le formulaire
                    ?>
                    <form method="post">
                        <input id="name_contact_form" name="firstname" type="text" placeholder="Votre nom" maxlength="30" required>
                        <input id="lastname_contact_form" name="name" type="text" placeholder="Votre prénom" maxlength="30" required>
                        <input id="email_contact_form" name="email" type="email" placeholder="Votre Email" maxlength="255" required>
                        <input id="num_contact_form" name="phone" type="tel" placeholder="Votre numéro de téléphone" maxlength="20" required>
                        <textarea id="message_contact_form" name="message" placeholder="Votre message" maxlength="1024" required></textarea>
                        <input type="submit" value="Envoyer">
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $firstName = $_POST['firstname']; //  <- Début du trairement du formulaire ici 
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $message = $_POST['message'];

                    //Connexion à la db déjà établi plus haut

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "INSERT INTO contact (FirstName, Name, Email, Phone, Message) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssss", $firstName, $name, $email, $phone, $message);

                    if ($stmt->execute()) {
                        echo "<script>alert('Message envoyé !');</script>";  //On envoie une alert box quand le formulaire est envoyé
                    } else {
                        echo "<script>alert('Erreur lors de l\'envoi du message: " . $conn->error . "');</script>"; //ou non avec erreur
                    }

                    $stmt->close(); //on ferme la requète 
                }
            ?>
  

            <!-- Opinion module in main page -->
            <div id="opinion">
                <h2>Nos avis client</h2>
                <button id="opinion_add_button">Laisser un avis</button>
                <div id="opinion_carousel">
                    <?php
                        $sql = "select * from opinion";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row["IsAllowed"] == true) {
                                    echo "<div class='opinion_tile'>";
                                        echo "<div class='opinion_header'>";
                                            echo "<p class='opinion_name'>" . $row["Name"] . "</p>";
                                            echo "<div class='opinion_grade'>";
                                                echo "<p class='opinion_value'>" . $row["Rating"] . "</p>";
                                                echo "<i class='material-icons'>grade</i>";
                                            echo "</div>";
                                        echo "</div>";
                                        echo "<p class='opinion_message'>" . $row["Commentary"] . "</p>"; // Correction de cette ligne
                                    echo "</div>";
                                }
                            }
                        }
                    ?>
                </div>

                <div id="opinion_popup">
                <h2>Laissez votre avis</h2>
                <i id="opinion_close_button" class='material-icons'>close</i>
                <form method="post" id="opinion_form">
                    <input id="opinion_name" name="opinion_name" placeholder="Prénom" type="text" maxlength="32" required>
                    <textarea name="opinion_message" placeholder="Votre message" maxlength="240" required></textarea>
                    <label for="opinion_rating">Note</label>
                    <output>1</output>
                    <input type="range" name="opinion_rating" id="opinion_rating" min="1" max="5" value="1" step="1" oninput="this.previousElementSibling.value = this.value">
                    <button type="submit" id="opinion_send">Envoyer</button>
                </form>
            </div>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['opinion_name'])) {
                    // Récupérer les données soumises par le formulaire
                    $name = $_POST['opinion_name'];
                    $rating = $_POST['opinion_rating'];
                    $commentary = $_POST['opinion_message'];
                
                    // Connexion à la base de données
                
                    // Préparer la requête SQL pour insérer les données dans la table "Opinion"
                    $sql = "INSERT INTO opinion (Name, Rating, Commentary, IsAllowed) VALUES (?, ?, ?, 0)";
                    $stmt = $conn->prepare($sql);
                
                    // Associer les valeurs aux paramètres de la requête
                    $stmt->bind_param("sis", $name, $rating, $commentary);
                
                    if ($stmt->execute()) { // Envoie de la requête
                        echo "Les informations ont été envoyées avec succès dans la table 'Opinion'.";
                    } else {
                        echo "Erreur lors de l'envoi des informations dans la table 'Opinion': " . $conn->error;
                    }
                
                    // Fermer la requête
                    $stmt->close();
                }
            ?>
            </div>
        </main>



        <footer>
            <div id="hours">

            
                <?php
            
                    // Requête SQL pour récupérer les informations de la table openhours
                    $sql = "SELECT Day, IsOpen, MorningOpeningTime, MorningClosingTime, AfternoonOpeningTime, AfternoonClosingTime FROM openhours";
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
            <a href="elements/images/credits.txt">Sources des images</a>
        </footer>
        <script src="../ecf/js/index.js"></script>
    </body>
</html>