<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--Head informations-->
    
        <title>Garage V.Parrot | Gestion</title>
        <meta charset="utf-8">
        <meta name="author" content="Raphaël Quinchon">
        <meta name="description" content="Garage V.Parrot | Mecanique, réparation, carrosserie, ventes d'occasion">
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <!--Import CSS-->
        <link href="../../css/management.css" rel="stylesheet">

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
            <a href="../../index.php"><img id="logo" src="../../elements/images/header/logo.svg" alt="logo-garage"></a>
            <h1>Espace de gestion</h1>
        </header>

        <main>
            <nav>
                <button onclick="Display('pages')">Pages</button> <!--Admin seulement-->
                <button onclick="Display('opinion')">Avis</button> <!--Modération et ajout des avis client-->
                <button onclick="Display('contact')">Contact</button>
                <button onclick="Display('sells')">Ventes</button>
                <button onclick="Display('users')">Utilisateurs</button> <!--Admin seulement-->
                <button onclick="Display('hours')">Horraires</button> <!--Admin seulement-->
            </nav>

            <div class="pages">
                <div class="pages_choose">
                    <button class="page_choose_button" id="pages_choose_repair"><h2>Onglet "Réparation"</h2></button>
                    <button class="page_choose_button" id="pages_choose_bodycar"> <h2>Onglet "Carrosserie"</h2></button>
                </div>
                <div id="repair_page">
                    <div class="edition">
                        <form action="../../php/repair.php" method="post" enctype="multipart/form-data">
                            <?php
                                // Connexion à la base de données
                                $servername = "localhost";
                                $username = "root";
                                $password = "isopropanol";
                                $dbname = "main";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT FirstText, SecondText, ThirdText, FirstImage, SecondImage, ThirdImage FROM repair";
                                $result = $conn->query($sql);
                                $row_repair = $result->fetch_assoc();

                                $uploadDir = "../../elements/images/pages/repair/";
                            ?>
                            <div class="content">
                                <textarea name="firstText"><?php echo $row_repair['FirstText']; ?></textarea>
                                <img src="<?php echo $uploadDir . $row_repair['FirstImage']; ?>" />
                                <input type="file" accept="image/*" name="firstImage" onchange="previewImage(event)" class="image_change" id="repair_image_change_first">
                            </div>
                            <div class="content">
                                <textarea name="secondText"><?php echo $row_repair['SecondText']; ?></textarea>
                                <img src="<?php echo $uploadDir . $row_repair['SecondImage']; ?>" />
                                <input type="file" accept="image/*" name="secondImage" onchange="previewImage(event)" class="image_change" id="repair_image_change_second">
                            </div>
                            <div class="content">
                                <textarea name="thirdText"><?php echo $row_repair['ThirdText']; ?></textarea>
                                <img src="<?php echo $uploadDir . $row_repair['ThirdImage']; ?>" />
                                <input type="file" accept="image/*" name="thirdImage" onchange="previewImage(event)" class="image_change" id="repair_image_change_third">
                            </div>
                            <button type="submit" class="save" id="repair_save">Sauvegarder les changements</button>
                        </form>
                    </div>
                </div>
                <div id="bodycar_page">
                    <div class="edition">
                        <form action="../../php/bodycar.php" method="post" enctype="multipart/form-data">
                            <?php
                                // Connexion à la base de données
                                $servername = "localhost";
                                $username = "root";
                                $password = "isopropanol";
                                $dbname = "main";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT FirstText, SecondText, ThirdText, FirstImage, SecondImage, ThirdImage FROM bodycar";
                                $result = $conn->query($sql);
                                $row_bodycar = $result->fetch_assoc();

                                $uploadDir = "../../elements/images/pages/bodycar/";
                            ?>
                            <div class="content">
                                <textarea name="firstText"><?php echo $row_bodycar['FirstText']; ?></textarea>
                                <img src="<?php echo $uploadDir . $row_bodycar['FirstImage']; ?>" />
                                <input type="file" accept="image/*" name="firstImage" onchange="previewImage(event)" class="image_change" id="bodycar_image_change_first">
                            </div>
                            <div class="content">
                                <textarea name="secondText"><?php echo $row_bodycar['SecondText']; ?></textarea>
                                <img src="<?php echo $uploadDir . $row_bodycar['SecondImage']; ?>" />
                                <input type="file" accept="image/*" name="secondImage" onchange="previewImage(event)" class="image_change" id="bodycar_image_change_second">
                            </div>
                            <div class="content">
                                <textarea name="thirdText"><?php echo $row_bodycar['ThirdText']; ?></textarea>
                                <img src="<?php echo $uploadDir . $row_bodycar['ThirdImage']; ?>" />
                                <input type="file" accept="image/*" name="thirdImage" onchange="previewImage(event)" class="image_change" id="bodycar_image_change_third">
                            </div>
                            <button type="submit" class="save" id="bodycar_save">Sauvegarder les changements</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="opinion">
                <h2>Avis en attente d'autorisation</h2>
                <div class="opinion_filter">
                    <?php
                    // Sélectionne tous les avis avec IsAllowed égal à 0
                    $sql = "SELECT * FROM opinion WHERE IsAllowed = 0";
                    $result = $conn->query($sql);

                    // Parcours les avis et les affiche dans le HTML
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="opinion_tile" id="opinionTile_<?php echo $row['id']; ?>">
                                <div class="opinion_header">
                                    <p class="name"><?php echo $row['Name']; ?></p>
                                    <div class="rating">
                                        <p class="rate"><?php echo $row['Rating']; ?></p>
                                        <i id="star" class='material-icons'>grade</i>
                                    </div>
                                </div>
                                <div class="opinion_main">
                                    <p class="message"><?php echo $row['Commentary']; ?></p>
                                </div>
                                <div class="opinion_button">
                                    <!-- Bouton d'approbation -->
                                    <button id="approveButton_<?php echo $row['id']; ?>" class="opinion_button_choice" data-action="approve" data-opinion-id="<?php echo $row['id']; ?>">
                                        <i class="large material-icons">check</i>
                                    </button>
                                    <!-- Bouton de désapprobation -->
                                    <button id="disapproveButton_<?php echo $row['id']; ?>" class="opinion_button_choice" data-action="disapprove" data-opinion-id="<?php echo $row['id']; ?>">
                                        <i class="large material-icons">clear</i>
                                    </button>
                                </div>
                            </div>
                    <?php
                        }
                    } 
                    ?>
                </div>
                <h2>Avis en ligne</h2>
                <div class="opinion_online">
                    <?php
                    // Sélectionne tous les avis avec IsAllowed égal à 1
                    $sql = "SELECT * FROM opinion WHERE IsAllowed = 1";
                    $result = $conn->query($sql);

                    // Parcours les avis et les affiche dans le HTML
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="opinion_tile">
                                <div class="opinion_header">
                                    <p class="name"><?php echo $row['Name']; ?></p>
                                    <div class="rating">
                                        <p class="rate"><?php echo $row['Rating']; ?></p>
                                        <i id="star" class='material-icons'>grade</i>
                                    </div>
                                </div>
                                <div class="opinion_main">
                                    <p class="message"><?php echo $row['Commentary']; ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        // Affiche un message si aucun avis n'est trouvé
                        echo "<p>Aucun avis disponible pour le moment.</p>";
                    }
                    ?>
                </div>
                <h2>Ajouter un avis</h2>
                <div class="opinion_add">
                    <form id="opinion_form" class="opinion_add">
                        <input class="input_name" id="input_name" placeholder="Nom" type="text" maxlength="32" required>
                        <label for="prix">Note</label>
                        <output>1</output>
                        <input type="range" name="opinion_rating" id="opinion_rating" min="1" max="5" value="1" step="1" oninput="this.previousElementSibling.value = this.value">
                        <textarea name="input_message" id="input_message" placeholder="Message" maxlength="240" required></textarea>
                        <input class="validate" type="submit" value="Enregistrer">
                    </form>
                </div>
            </div>
            <div class="users">
                <div class="users_list">
                    <?php

                        $sql = "SELECT UserID, Password, Role, Email, Nom, Prenom FROM users";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Boucler à travers chaque ligne de résultat
                            while($row = $result->fetch_assoc()) {
                                // Afficher les informations de chaque utilisateur dans une div répétée
                                echo "<div class='user_info'>";
                                echo "<div class='user_gestion'>";
                                echo "<button class='delete_user'><i class='large material-icons'>delete_forever</i></button>";
                                echo "</div>";
                                echo "<div class='user_names'>";
                                echo "<i id='person' class='material-icons'>person</i>";
                                echo "<p>" . $row["Prenom"] . "</p>";
                                echo "<p>" . $row["Nom"] . "</p>";
                                echo "<p>Rôle: " . ($row["Role"] == 1 ? "Administrateur" : "Employé") . "</p>";
                                echo "</div>";
                                echo "<div class='login_info'>";
                                echo "<p>" . $row["Email"] . "</p>";
                                echo "<div class='password'>";
                                echo "<input class='user_password' id='user_password_" . $row['UserID'] . "' name='user_password_" . $row["UserID"] . "' placeholder='Modifier le mot de passe' type='password' maxlength='32' required>";
                                echo "<button class='save_password' data-user-id='" . $row["UserID"] . "'><i class='large material-icons'>done</i></button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "Aucun utilisateur trouvé.";
                        }

                        // Fermeture de la connexion à la base de données
                        $conn->close();
                    ?>
                </div>
                <div class="user_add">
                    <h2>Création utilisateur</h2>
                    <form id="user_form" method="post">
                        <div class="create_user_names">
                            <input class="user_create_input" id="user_name" name="user_name" placeholder="Prénom" type="text" maxlength="32" required>
                            <input class="user_create_input" id="user_lastname" name="user_lastname" placeholder="Nom" type="text" maxlength="32" required>
                        </div>
                        <div class="create_user_login">
                            <input class="user_create_input" id="user_email" name="user_email" placeholder="Email" type="email" maxlength="60" required>
                            <input class="user_create_input" id="user_password" name="user_password" placeholder="Mot de passe" type="password" maxlength="32" required>
                        </div>
                        <select id="role" name="role">
                            <option value="employe">Employé</option>
                            <option value="administrateur">Administrateur</option>
                        </select>
                        <button type="submit" class="save_user">Ajouter l'utilisateur</button> 
                    </form>
                </div>
            </div>
            <div class="contact">
                <div class="contact_list">
                    <?php
                    // Connexion à la base de données et récupération des contacts
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT ContactID, FirstName, Name, Email, Phone, Message FROM contact";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Afficher chaque contact dans un bloc HTML
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="contact_case">';
                            echo '<div class="contact_informations">';
                            echo '<div class="contact_names">';
                            echo '<p class="prénom">' . $row["FirstName"] . '</p>';
                            echo '<p class="nom">' . $row["Name"] . '</p>';
                            echo '</div>';
                            echo '<div class="contact_ways">';
                            echo '<p class="mail">' . $row["Email"] . '</p>';
                            echo '<p class="tel">' . $row["Phone"] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<p class="message">' . $row["Message"] . '</p>';
                            echo '<button class="contact_delete" data-contact-id="' . $row["ContactID"] . '"><i class="large material-icons">delete_forever</i></button>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p class='no_contact'>Aucun contact trouvé.</p>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
            <div class="sells">
                <h2>Annonces en ligne</h2>
                <div class="sells_online">
                    <div class="cases">
                        <div class="case_header">
                            <p class="online_vehicle_name">Auto nom modèle XX0</p>
                            <p class="online_vehicle_price"></p><p class="€">€</p>
                        </div>
                        <img src="../../elements/images/testTexture.png" alt="preview">
                        <button class="sell_delete" id="sell_delete"><i class="large material-icons">delete_forever</i></button>
                    </div>
                    <div class="cases">
                        <div class="case_header">
                            <p class="online_vehicle_name">Auto nom modèle XX0</p>
                            <p class="online_vehicle_price"></p><p class="€">€</p>
                        </div>
                        <img src="../../elements/images/testTexture.png" alt="preview">
                        <button class="sell_delete" id="sell_delete"><i class="large material-icons">delete_forever</i></button>
                    </div>
                    <div class="cases">
                        <div class="case_header">
                            <p class="online_vehicle_name">Auto nom modèle XX0</p>
                            <p class="online_vehicle_price"></p><p class="€">€</p>
                        </div>
                        <img src="../../elements/images/testTexture.png" alt="preview">
                        <button class="sell_delete" id="sell_delete"><i class="large material-icons">delete_forever</i></button>
                    </div>
                </div>
                <div class="sells_add">
                    <h2>Publier une annonce </h2>
                    <div class="inputs">
                        <div class="add_main">
                            <input class="vehicle_name" id="vehicle_name" placeholder="Modele du véhicle" type="text" required>
                            <textarea name="input_message" placeholder="Description"></textarea>
                            <input class="vehicle_price" id="vehicle_price" placeholder="prix" type="number" required>
                        </div>
                        <div class="add_details">
                            <input class="vehicle_km" id="vehicle_km" placeholder="Kilomètres" type="text">
                            <input class="vehicle_color" id="vehicle_color" placeholder="Couleur" type="text">
                            <input class="vehicle_date" id="vehicle_date" placeholder="Mise en circulation" type="text">
                            <input class="vehicle_cv" id="vehicle_cv" placeholder="Chevaux" type="text">
                            <input class="vehicle_doors" id="vehicle_doors" placeholder="Nombre de portes" type="text">
                            <input class="vehicle_places" id="vehicle_places" placeholder="Places" type="text">
                            <input class="vehicle_fuel" id="vehicle_fuel" placeholder="Carburant" type="text">
                            <input class="vehicle_type" id="vehicle_type" placeholder="Transmission" type="text">
                        </div>
                        <div class="add_pictures">
                            <input class="pictures" type="file" id="images" name="images[]" multiple accept="image/*">
                            <p class="added_pictures">Aucune image</p>
                        </div>
                    </div>
                    <input class="validate" type="submit" value="Publier l'annonce"></input>
                </div>
            </div>
            <div class="hours">
                <form method="post" id="openhours_form">
                    <?php
                        // Connexion à la base de données (à remplacer avec vos propres informations de connexion)
                        $servername = "localhost";
                        $username = "root";
                        $password = "isopropanol";
                        $dbname = "main";

                        // Création de la connexion
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Requête pour récupérer les heures d'ouverture de la base de données
                        $sql = "SELECT Day, IsOpen, MorningOpeningTime, MorningClosingTime, AfternoonOpeningTime, AfternoonClosingTime FROM openhours";
                        $result = $conn->query($sql);

                        // Vérification s'il y a des résultats
                        if ($result->num_rows > 0) {
                            // Parcourir les résultats de la requête
                            while($row = $result->fetch_assoc()) {
                                // Construire l'ID de l'élément HTML pour chaque jour
                                $day_id = strtolower($row["Day"]);
                                ?>
                                <div class="hours_fields" id="<?php echo $day_id; ?>">
                                    <p class="day"><?php echo $row["Day"]; ?></p>
                                    <input type="checkbox" id="<?php echo $day_id; ?>_open" name="<?php echo $day_id; ?>_open" <?php if ($row["IsOpen"] == 1) echo "checked"; ?>>
                                    <input type="time" id="<?php echo $day_id; ?>_open_morning" name="<?php echo $day_id; ?>_open_morning" class="checkbox" value="<?php echo $row["MorningOpeningTime"]; ?>">
                                    <p> / </p>
                                    <input type="time" id="<?php echo $day_id; ?>_close_morning" name="<?php echo $day_id; ?>_close_morning" class="checkbox" value="<?php echo $row["MorningClosingTime"]; ?>">
                                    <p>&</p>
                                    <input type="time" id="<?php echo $day_id; ?>_open_afternoon" name="<?php echo $day_id; ?>_open_afternoon" class="checkbox" value="<?php echo $row["AfternoonOpeningTime"]; ?>">
                                    <p> / </p>
                                    <input type="time" id="<?php echo $day_id; ?>_close_afternoon" name="<?php echo $day_id; ?>_close_afternoon" class="checkbox" value="<?php echo $row["AfternoonClosingTime"]; ?>">
                                </div>
                                <?php
                            }
                        } else {
                            echo "Erreur de résultat";
                        }
                        $conn->close();
                    ?>
                    <!-- Bouton de soumission du formulaire -->
                    <button type="submit" name="submit" id="hours_submit">Enregistrer</button>
                </form>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../../js/opinion.js"></script>
        <script src="../../js/addopinion.js"></script>
        <script src="../../js/hours.js"></script>
        <script src="../../js/management.js"></script>
        <script src="../../js/manage_contact.js"></script>
        <script src="../../js/updatepassword.js"></script>
        <script src="../../js/adduser.js"></script>
    </body>
</html>