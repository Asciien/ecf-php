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

        <header>
            <ul>
                <li><a href="#!"><img id="logo" src="elements/images/logo.svg" alt="logo-garage"></a></li>
                <li><a href="html/manage/login.php"><img id="login" src="elements/images/login.svg" alt="connexion-icon"></a></li>
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
                    <input id="name_contact_form" type="text" placeholder="Votre nom" maxlength="32" required>
                    <input id="lastname_contact_form" type="text" placeholder="Votre prénom" maxlength="32" required>
                    <input id="email_contact_form" type="email" placeholder="Votre Email" maxlength="128" required>
                    <input id="num_contact_form" type="tel" placeholder="Votre numéro de téléphone" maxlength="10" required>
                        
                    <textarea 
                    id="message_contact_form" 
                    name="msg_contact" 
                    placeholder="Votre message"
                    maxlength="1024"
                    required></textarea>

                    <input type="submit" value="Envoyer">
                </div>
            </div>
            

            <!-- Opinion module in main page -->
            <div id="opinion">
                <h2>Nos avis client</h2>
                <button id="opinion_add_button">Laisser un avis</button>
                <div id="opinion_carousel">
                    <!-- FIRST tile in opinion carousel -->
                    <div class="opinion_tile">
                        <div class="opinion_tile_header">
                            <p class="opinion_tile_name" id="opinion_tile_name_first">Helina</p>
                            <div class="opinion_tile_grade">
                                <p id="opinion_tile_grade_value_first">5</p>
                                <i class="material-icons">grade</i>
                            </div>
                        </div>
                        <p class="opinion_message" id="opinion_message_first">The HTML document above contains a element with id="p1"
                            We use the HTML DOM to get the element with id="p1"
                            A JavaScript changes the content (innerHTML) of that element to "New text!"
                            This example changes the content of an element</p> <!-- Max 240 Chars-->
                    </div>
                    <!-- SECOND tile in opinion carousel -->
                    <div class="opinion_tile">
                        <div class="opinion_tile_header">
                            <p class="opinion_tile_name" id="opinion_tile_name_second">Alexandre</p>
                            <div class="opinion_tile_grade">
                                <p id="opinion_tile_grade_value_second">3</p>
                                <i class="material-icons">grade</i>
                            </div>
                        </div>
                        <p id="opinion_message_second">n/a</p>
                    </div>
                    <!-- THIRD tile in opinion carousel -->
                    <div class="opinion_tile">
                        <div class="opinion_tile_header">
                            <p class="opinion_tile_name" id="opinion_tile_name_third">Noa</p>
                            <div class="opinion_tile_grade">
                                <p id="opinion_tile_grade_value_third">4</p>
                                <i class="material-icons">grade</i>
                            </div>
                        </div>
                        <p id="opinion_message_third">n/a</p>
                    </div>
                    <!-- FOURTH tile in opinion carousel -->
                    <div class="opinion_tile">
                        <div class="opinion_tile_header">
                            <p class="opinion_tile_name" id="opinion_tile_name_third">Noa</p>
                            <div class="opinion_tile_grade">
                                <p id="opinion_tile_grade_value_third">4</p>
                                <i class="material-icons">grade</i>
                            </div>
                        </div>
                        <p id="opinion_message_third">n/a</p>
                    </div>
                    <!-- FIFTH tile in opinion carousel -->
                    <div class="opinion_tile">
                        <div class="opinion_tile_header">
                            <p class="opinion_tile_name" id="opinion_tile_name_third">Noa</p>
                            <div class="opinion_tile_grade">
                                <p id="opinion_tile_grade_value_third">4</p>
                                <i class="material-icons">grade</i>
                            </div>
                        </div>
                        <p id="opinion_message_third">n/a</p>
                    </div>
                </div>
                <div id="opinion_popup">
                    <h2>Laissez votre avis</h2>
                    <input id="opinion_name" placeholder="Prénom" type="text" maxlength="32" required>
                    <textarea
                        name="opinion_message" 
                        placeholder="Votre message"
                        maxlength="240"
                        required></textarea>
                    <div id="opinion_button_list">
                        <button>1</button>
                        <button>2</button>
                        <button>3</button>
                        <button>4</button>
                        <button>5</button>
                    </div>
                    <button id="opinion_add_button">Envoyer</button>
                </div>
            </div>
        </main>



        <footer>
            <div id="hours">
                <p>Lundi: <span id="monday_hour_open">n/a</span>-<span id="monday_mid_break">n/a</span>, <span id="monday_break_end">n/a</span>-<span id="monday_hour_close">n/a</span></p>
                <p>Mardi: <span id="tuesday_hour_open">n/a</span>-<span id="tuesday_mid_break">n/a</span>, <span id="tuesday_break_end">n/a</span>-<span id="tuesday_hour_close">n/a</span></p>
                <p>Mercredi: <span id="wednesday_hour_open">n/a</span>-<span id="wednesday_mid_break">n/a</span>, <span id="wednesday_break_end">n/a</span>-<span id="wednesday_hour_close">n/a</span></p>
                <p>Jeudi: <span id="thursday_hour_open">n/a</span>-<span id="thursday_mid_break">n/a</span>, <span id="thursday_break_end">n/a</span>-<span id="thursday_hour_close">n/a</span></p>
                <p>Vendredi: <span id="friday_hour_open">n/a</span>-<span id="friday_mid_break">n/a</span>, <span id="friday_break_end">n/a</span>-<span id="friday_hour_close">n/a</span></p>
                <p>Samedi: <span id="saturday_hour_open">n/a</span>-<span id="saturday_mid_break">n/a</span>, <span id="saturday_break_end">n/a</span>-<span id="saturday_hour_close">n/a</span></p>
                <p>Dimanche: <span id="sunday_hour_open">n/a</span>-<span id="sunday_mid_break">n/a</span>, <span id="sunday_break_end">n/a</span>-<span id="sunday_hour_close">n/a</span></p>
            </div>
            <div>
                <a href="elements/images/credits.txt">Sources des images</a>
            </div>
            <?php
                include_once 'config.php';
                
                $dbh = new PDO('mysql:host=localhost;dbname=main', $user, $pwd);

                try {
                    // Affichage du message de connexion réussie en H1
                    echo "<h1>Connexion à la base de données réussie !</h1>";
            
                } catch (PDOException $e) {
                    // En cas d'erreur de connexion, affichez l'erreur en H1
                    echo "<h1>Erreur de connexion à la base de données : " . $e->getMessage() . "</h1>";
                }
            ?>
        </footer>
    </body>
</html>