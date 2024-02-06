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
            $servername = "localhost";
            $username = "root";
            $password = "isopropanol";
            $dbname = "main";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
        ?>


        <header>
            <ul>
                <li><a href="../../index.php"><img id="logo" src="../../elements/images/logo.svg" alt="logo-garage"></a></li>
                <li><a href="../manage/login.php"><img id="login" src="../../elements/images/login.svg" alt="connexion-icon"></a></li>
            </ul>
            <div id="phone">
                <a class="waves-effect waves-light btn-small" href="tel:0234567890"><i class="material-icons left">phone</i>02 34 56 78 90</a>
            </div>
        </header>
        <main>
            <article id="content_first">
                <div class="content">
                    <?php
                        $sql = "SELECT FirstText, SecondText, ThirdText from repair";
                        $result = $conn->query($sql);

                        $row = $result->fetch_assoc();

                        echo "<p class='paragraph'>" . $row['FirstText'] . "</p>";
                    ?>
                    <img src="../../elements/images/testTexture.png">
                </div>
                <div class="edition_button_admin">
                    <button id="edit_button_text_second"><i class="material-icons">edit</i></button>
                    <button id="edit_button_image_second"><i class="material-icons">cloud_upload</i></button>
                </div>
            </article>
            <article id="content_second">
                <div class="content_mirror">
                    <?php
                        $sql = "SELECT FirstText, SecondText, ThirdText from repair";
                        $result = $conn->query($sql);

                        $row = $result->fetch_assoc();

                        echo "<p class='paragraph'>" . $row['SecondText'] . "</p>";
                    ?>
                    <img src="../../elements/images/testTexture.png">
                </div>
                <div class="edition_button_admin">
                    <button id="edit_button_text_second"><i class="material-icons">edit</i></button>
                    <button id="edit_button_image_second"><i class="material-icons">cloud_upload</i></button>
                </div>
            </article>
            <article id="content_third">
                <div class="content">
                    <?php
                        $sql = "SELECT FirstText, SecondText, ThirdText from repair";
                        $result = $conn->query($sql);

                        $row = $result->fetch_assoc();

                        echo "<p class='paragraph'>" . $row['ThirdText'] . "</p>";
                    ?>
                    <img src="../../elements/images/testTexture.png">
                </div>
                <div class="edition_button_admin">
                    <button id="edit_button_text_second"><i class="material-icons">edit</i></button>
                    <button id="edit_button_image_second"><i class="material-icons">cloud_upload</i></button>
                </div>
            </article>
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
                <a href="../../elements/images/credits.txt">Sources des images</a>
            </div>
        </footer>
    </body>
</html>