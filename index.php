<!DOCTYPE html>
<html lang="fr">
    <head>

        <!--Head informations-->
        <title>Garage V.Parrot</title>
        <link rel="icon" href="elements/images/icon.png" type="image/x-icon">
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
            include('config.php');
            
            $conn = new mysqli($servername, $username, $password, $dbname);
        ?>

        <header>
            <ul>
                <li><a href="#!"><img id="logo" src="elements/images/header/logo.svg" alt="logo-garage"></a></li>
                <li><a href="html/manage/login.php"><img id="login" src="elements/images/header/login.svg" alt="connexion-icon"></a></li>
            </ul>
            <div id="phone">
                <a class="waves-effect waves-light btn-small" href="tel:0234567890"><i class="material-icons left">phone</i>02 34 56 78 90</a>
            </div>
        </header>


        <!-- Tiles navigation-->
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


            <!-- Contact tile -->
            <div id="contact_tile">
                <h2>Contactez-nous dès maintenant</h2>
                <div id="form_fields">
                    <?php
                    // On vérifie le formulaire
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstname'])) {

                        $sql = "INSERT INTO contact (FirstName, Name, Email, Phone, Message) VALUES (?, ?, ?, ?, ?)"; // Execution de la requète SQL
                        $stmt = $conn->prepare($sql);

                        if ($stmt === false) { //La requète est passée ou non
                            die("Erreur de préparation de la requête: " . $conn->error);
                        }

                        // Données du formulaire 
                        $firstName = $_POST['firstname'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $message = $_POST['message'];

                        $stmt->bind_param("sssss", $firstName, $name, $email, $phone, $message);
                        if ($stmt->execute()) {
                            echo "<script>alert('Message envoyé !');</script>";  // Afficher une alert box quand la requète est un succès
                            echo "<p>Votre message a été envoyé avec succès !</p>"; 
                        } else {
                            echo "<script>alert('Erreur lors de l'envoi du message: " . $conn->error . "');</script>"; // ou pas
                        }

                        // On tue la requète 
                        $stmt->close();
                        
                    } else {
                        ?>
                        <form method="post">
                            <input id="name_contact_form" name="firstname" type="text" placeholder="Votre nom" maxlength="30" required>
                            <input id="lastname_contact_form" name="name" type="text" placeholder="Votre prénom" maxlength="30" required>
                            <input id="email_contact_form" name="email" type="email" placeholder="Votre Email" maxlength="255" required>
                            <input id="num_contact_form" name="phone" type="tel" placeholder="Votre numéro de téléphone" maxlength="20" required>
                            <textarea id="message_contact_form" name="message" placeholder="Votre message" maxlength="1024" required></textarea>
                            <input type="submit" value="Envoyer">
                        </form>
                    <?php } ?>
                </div>
            </div>

            <!-- Opinion module in main page -->
            <div id="opinion">
                <h2>Nos avis client</h2>
                <button id="opinion_add_button">Laisser un avis</button> <!-- Ouvre une pop up -->
                <div id="opinion_carousel">
                    <?php
                        $sql = "select * from opinion";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row["IsAllowed"] == true) { //Vérifie si l'avis est autorisé à l'affichage par les admins
                                    echo "<div class='opinion_tile'>";
                                        echo "<div class='opinion_header'>";
                                            echo "<p class='opinion_name'>" . $row["Name"] . "</p>";
                                            echo "<div class='opinion_grade'>";
                                                echo "<p class='opinion_value'>" . $row["Rating"] . "</p>";
                                                echo "<i class='material-icons'>grade</i>";
                                            echo "</div>";
                                        echo "</div>";
                                        echo "<p class='opinion_message'>" . $row["Commentary"] . "</p>";
                                    echo "</div>";
                                }
                            }
                        }
                    ?>
                </div>

                <div id="opinion_popup"> <!-- pop up pour laisser un avis -->
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
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['opinion_message'])) { //Traitement du formulaire d'avis
                    // On récup les informations de ce dernier
                    $name = $_POST['opinion_name'];
                    $rating = $_POST['opinion_rating'];
                    $commentary = $_POST['opinion_message'];


                    $sql = "INSERT INTO opinion (Name, Rating, Commentary, IsAllowed) VALUES (?, ?, ?, 0)";
                    $stmt = $conn->prepare($sql); //On crée la requète 

                    // On associe les valeurs aux paramètres de la requête
                    $stmt->bind_param("sis", $name, $rating, $commentary);

                    if ($stmt->execute()) {
                        echo "<script>alert('Message envoyé !');</script>";  // Afficher une alert box si requète ok
                    } else {
                        echo "<script>alert('Erreur lors de l\'envoi du message: " . $conn->error . "');</script>"; // ou non
                    }

                    // On tue la requçte pour eviter les doublons
                    $stmt->close();

                    //La connexion à la db reste ouverte pour les heures ci-dessous et pour éviter les répétitions
                }
                ?>
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
                    
                    if ($result->num_rows > 0) { //On vérifie si on a bien recu les informations de la BDD
                        while($row = $result->fetch_assoc()) { //On répète l'affichage pour chaque jour
                            echo "<p>" . $row["Day"] . ":    ";
                            
                            if ($row["IsOpen"]) { // Si le jour est indiqué comme "Ouvert"
                                echo $row["MorningOpeningTime"] . " - " . $row["MorningClosingTime"] . " & " . $row["AfternoonOpeningTime"] . " - " . $row["AfternoonClosingTime"];
                            } else {
                                echo "Fermé"; // Si le jour est indiqué comme "Fermé"
                            }
                            
                            echo "</p>";
                        }
                    } else { // Erreur si aucune info n'est retournée
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