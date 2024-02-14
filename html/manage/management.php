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
                        <?php
                            $sql = "SELECT FirstText, SecondText, ThirdText from repair";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <div class="content">
                            <textarea><?php echo $row['FirstText']; ?></textarea>
                            <img src="../../elements/images/testTexture.png">
                            <button class="image_change" id="image_change_first">Changer l'image</button>
                        </div>
                        <div class="content">
                            <textarea><?php echo $row['SecondText']; ?></textarea>
                            <img src="../../elements/images/testTexture.png">
                            <button class="image_change" id="image_change_first">Changer l'image</button>
                        </div>
                        <div class="content">
                            <textarea><?php echo $row['ThirdText']; ?></textarea>
                            <img src="../../elements/images/testTexture.png">
                            <button class="image_change" id="image_change_first">Changer l'image</button>
                        </div>
                    </div>
                </div>
                <div id="bodycar_page">
                    <div class="edition">
                        <?php
                            $sql = "SELECT FirstText, SecondText, ThirdText from bodycar";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <div class="content">
                            <textarea><?php echo $row['FirstText']; ?></textarea>
                            <img src="../../elements/images/testTexture.png">
                            <button class="image_change" id="image_change_first">Changer l'image</button>
                        </div>
                        <div class="content">
                            <textarea><?php echo $row['SecondText']; ?></textarea>
                            <img src="../../elements/images/testTexture.png">
                            <button class="image_change" id="image_change_first">Changer l'image</button>
                        </div>
                        <div class="content">
                            <textarea><?php echo $row['ThirdText']; ?></textarea>
                            <img src="../../elements/images/testTexture.png">
                            <button class="image_change" id="image_change_first">Changer l'image</button>
                        </div>
                    </div>
                </div>
                <button class="save" id="pages_save">Sauvegarder les changements</button>
            </div>
            <div class="opinion">
                <h2>Avis en attente d'autorisation</h2>
                <div class="opinion_filter">
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                        <div class="opinion_button">
                            <button class="opinion_button_choice"><i class="large material-icons">check</i></button>
                            <button class="opinion_button_choice"><i class="large material-icons">clear</i></button>
                        </div>
                    </div>
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                        <div class="opinion_button">
                            <button class="opinion_button_choice"><i class="large material-icons">check</i></button>
                            <button class="opinion_button_choice"><i class="large material-icons">clear</i></button>
                        </div>
                    </div>
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                        <div class="opinion_button">
                            <button class="opinion_button_choice"><i class="large material-icons">check</i></button>
                            <button class="opinion_button_choice"><i class="large material-icons">clear</i></button>
                        </div>
                    </div>
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                        <div class="opinion_button">
                            <button class="opinion_button_choice"><i class="large material-icons">check</i></button>
                            <button class="opinion_button_choice"><i class="large material-icons">clear</i></button>
                        </div>
                    </div>
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                        <div class="opinion_button">
                            <button class="opinion_button_choice"><i class="large material-icons">check</i></button>
                            <button class="opinion_button_choice"><i class="large material-icons">clear</i></button>
                        </div>
                    </div>
                </div>
                <h2>Avis en ligne</h2>
                <div class="opinion_online">
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                    </div>
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                    </div>
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                    </div>
                    <div class="opinion_tile">
                        <div class="opinion_header">
                            <p class="name">n/a</p>
                            <div class="rating">
                                <p class="rate">n/a</p>
                                <i id="star" class='material-icons'>grade</i>
                            </div>
                        </div>
                        <div class="opinion_main">
                            <p class="message">n/a</p>
                        </div>
                    </div>
                </div>
                <h2>Ajouter un avis</h2>
                <div class="opinion_add">
                    <input class="input_name" id="input_name" placeholder="Nom" type="text" maxlength="32" required>
                    <label for="prix">Note</label>
                    <output>1</output>
                    <input type="range" name="opinion_rating" id="opinion_rating" min="1" max="5" value="1" step="1" oninput="this.previousElementSibling.value = this.value">
                    <textarea
                        name="input_message" 
                        placeholder="Message"
                        maxlength="240"
                        required></textarea>
                    <input class="validate" type="submit" value="Enregistrer"></input>
                </div>
            </div>
            <div class="users">
                <div class="users_list">
                    <div class="user_info">
                        <div class="user_gestion">
                            <button class="delete_user"><i class="large material-icons">delete_forever</i></button>
                        </div>
                        <div class="user_names">
                            <i id="person" class='material-icons'>person</i>
                            <p>John(Prénom)</p>
                            <p>Doe(Nom)</p>
                        </div>
                        <div class="login_info">
                            <p>email.example@parrot.fr</p>
                            <div class="password">
                                <input class="user_password" id="user_password" placeholder="Modifier le mot de passe" type="password" maxlength="32" required>
                                <button class="save_password"><i class="large material-icons">done</i></button> 
                            </div>
                        </div>
                    </div>
                    <div class="user_info">
                        <div class="user_gestion">
                            <button class="delete_user"><i class="large material-icons">delete_forever</i></button>
                        </div>
                        <div class="user_names">
                            <i id="person" class='material-icons'>person</i>
                            <p>John(Prénom)</p>
                            <p>Doe(Nom)</p>
                        </div>
                        <div class="login_info">
                            <p>email.example@parrot.fr</p>
                            <div class="password">
                                <input class="user_password" id="user_password" placeholder="Modifier le mot de passe" type="password" maxlength="32" required>
                                <button class="save_password"><i class="large material-icons">done</i></button> 
                            </div>
                        </div>
                    </div>
                    <div class="user_info">
                        <div class="user_gestion">
                            <button class="delete_user"><i class="large material-icons">delete_forever</i></button>
                        </div>
                        <div class="user_names">
                            <i id="person" class='material-icons'>person</i>
                            <p>John(Prénom)</p>
                            <p>Doe(Nom)</p>
                        </div>
                        <div class="login_info">
                            <p>email.example@parrot.fr</p>
                            <div class="password">
                                <input class="user_password" id="user_password" placeholder="Modifier le mot de passe" type="password" maxlength="32" required>
                                <button class="save_password"><i class="large material-icons">done</i></button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact">
                <div class="contact_list">
                    <div class="contact_case">
                        <div class="contact_informations">
                            <div class="contact_names">
                                <p class="prénom">John</p>
                                <p class="nom">Doe</p>
                            </div>
                            <div class="contact_ways">
                                <p class="mail">mail.example@parrot.fr</p>
                                <p class="tel">0645878424</p>
                            </div>
                        </div>
                        <p class="message">n/a</p>
                        <button class="contact_delete" id="contact_delete"><i class="large material-icons">delete_forever</i></button>
                    </div>
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
                            <input class="vehicle_km" id="vehicle_km" placeholder="Modele du véhicle" type="text">
                            <input class="vehicle_color" id="vehicle_color" placeholder="Kilomètres" type="text">
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
                <div class="hours_fields" id="monday">
                    <p class="day">Lundi</p>
                    <input type="checkbox" id="monday_open">
                    <input type="time" id="monday_open_morning" name="monday_open_morning" class="checkbox">
                    <p> / </p>
                    <input type="time" id="monday_close_morning" name="monday_close_morning" class="checkbox">
                    <p>&</p>
                    <input type="time" id="monday_open_afternoon" name="monday_open_afternoon" class="checkbox">
                    <p> / </p>
                    <input type="time" id="monday_close_afternoon" name="monday_close_afternoon" class="checkbox">
                </div>
                <div class="hours_fields" id="tuesday">
                    <p class="day">Mardi</p>
                    <input type="checkbox" id="tuesday_open">
                    <input type="time" id="tuesday_open_morning" name="tuesday_open_morning" class="checkbox">
                    <p> / </p>
                    <input type="time" id="tuesday_close_morning" name="tuesday_close_morning" class="checkbox">
                    <p>&</p>
                    <input type="time" id="tuesday_open_afternoon" name="tuesday_open_afternoon" class="checkbox">
                    <p> / </p>
                    <input type="time" id="tuesday_close_afternoon" name="tuesday_close_afternoon" class="checkbox">
                </div>
                <div class="hours_fields" id="wednesday">
                    <p class="day">Mercredi</p>
                    <input type="checkbox" id="wednesday_open">
                    <input type="time" id="wednesday_open_morning" name="wednesday_open_morning" class="checkbox">
                    <p> / </p>
                    <input type="time" id="wednesday_close_morning" name="wednesday_close_morning" class="checkbox">
                    <p>&</p>
                    <input type="time" id="wednesday_open_afternoon" name="wednesday_open_afternoon" class="checkbox">
                    <p> / </p>
                    <input type="time" id="wednesday_close_afternoon" name="wednesday_close_afternoon" class="checkbox">
                </div>
                <div class="hours_fields" id="thursday">
                    <p class="day">Jeudi</p>
                    <input type="checkbox" id="thursday_open">
                    <input type="time" id="thursday_open_morning" name="thursday_open_morning" class="checkbox">
                    <p> / </p>
                    <input type="time" id="thursday_close_morning" name="thursday_close_morning" class="checkbox">
                    <p>&</p>
                    <input type="time" id="thursday_open_afternoon" name="thursday_open_afternoon" class="checkbox">
                    <p> / </p>
                    <input type="time" id="thursday_close_afternoon" name="thursday_close_afternoon" class="checkbox">
                </div>
                <div class="hours_fields" id="friday">
                    <p class="day">Vendredi</p>
                    <input type="checkbox" id="friday_open">
                    <input type="time" id="friday_open_morning" name="friday_open_morning" class="checkbox">
                    <p> / </p>
                    <input type="time" id="friday_close_morning" name="friday_close_morning" class="checkbox">
                    <p>&</p>
                    <input type="time" id="friday_open_afternoon" name="friday_open_afternoon" class="checkbox">
                    <p> / </p>
                    <input type="time" id="friday_close_afternoon" name="friday_close_afternoon" class="checkbox">
                </div>
                <div class="hours_fields" id="saturday">
                    <p class="day">Samedi</p>
                    <input type="checkbox" id="saturday_open">
                    <input type="time" id="saturday_open_morning" name="saturday_open_morning" class="checkbox">
                    <p> / </p>
                    <input type="time" id="saturday_close_morning" name="saturday_close_morning" class="checkbox">
                    <p>&</p>
                    <input type="time" id="saturday_open_afternoon" name="saturday_open_afternoon" class="checkbox">
                    <p> / </p>
                    <input type="time" id="saturday_close_afternoon" name="saturday_close_afternoon" class="checkbox">
                </div>
                <div class="hours_fields" id="sunday">
                    <p class="day">Dimanche</p>
                    <input type="checkbox" id="sunday_open">
                    <input type="time" id="sunday_open_morning" name="sunday_open_morning" class="checkbox">
                    <p> / </p>
                    <input type="time" id="sunday_close_morning" name="ssunday_close_morning" class="checkbox">
                    <p>&</p>
                    <input type="time" id="sunday_open_afternoon" name="sunday_open_afternoon" class="checkbox">
                    <p> / </p>
                    <input type="time" id="sunday_close_afternoon" name="sunday_close_afternoon" class="checkbox">
                </div>
                <button type="submit" id="hours_submit">Enregistrer</button>
            </div>
        </main>
        <script src="../../js/management.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>