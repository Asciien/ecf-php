<!DOCTYPE html>
<html lang="fr">
<head>
    <!--Head informations-->
    <title>Création d'un administrateur</title>
    <link rel="icon" href="elements/images/icon.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: blueviolet;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
            margin: 0 auto; /* Centrer horizontalement */
        }
        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
    <body>
        <main>
            <?php
            include('config.php');
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Vérification de la connexion
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Requête SQL pour vérifier si un utilisateur existe
            $sql = "SELECT * FROM users WHERE Role = 1";
            $result = $conn->query($sql);

            // Si un utilisateur administrateur existe
            if ($result->num_rows > 0) {
                echo "<p>Erreur : Vous n'êtes pas autorisé à accéder à cette page.</p>";
            } else {
                // Si le formulaire a été soumis
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Connexion à la Base de données
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Vérification de la connexion
                    if ($conn->connect_error) {
                        die("La connexion a échoué : " . $conn->connect_error);
                    }

                    // Récupérer les données du formulaire
                    $userName = $_POST['user_name'];
                    $userLastName = $_POST['user_lastname'];
                    $userEmail = $_POST['user_email'];
                    $userPassword = $_POST['user_password'];
                    $userRole = $_POST['role'];

                    // Convertir le rôle en chiffre en fonction du rang
                    $roleValue = ($userRole === 'administrateur') ? 1 : 0;

                    // Hasher le mot de passe
                    $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

                    // Préparation de la requête d'insertion
                    $sql_insert = "INSERT INTO users (Nom, Prenom, Email, Password, Role) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql_insert);

                    // Liaison des paramètres
                    $stmt->bind_param("ssssi", $userLastName, $userName, $userEmail, $hashedPassword, $roleValue);

                    // Exécution de la requête préparée
                    if ($stmt->execute()) {
                        echo "Utilisateur créé avec succès.";
                        header("Location: html/manage/login.php"); // Rediriger vers la page de connexion
                        exit();
                    } else {
                        echo "Erreur : " . $sql_insert . "<br>" . $conn->error;
                    }

                    // Fermeture de la requête et de la connexion
                    $stmt->close();
                    $conn->close();
                }
                // Affichage du formulaire
                ?>
                <form id="user_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input id="user_name" name="user_name" placeholder="Prénom">
                    <input id="user_lastname" name="user_lastname" placeholder="Nom">
                    <input id="user_email" name="user_email" placeholder="Email">
                    <input id="user_password" name="user_password" type="password" placeholder="Mot de passe">
                    <select id="role" name="role">
                        <option value="administrateur">Administrateur</option>
                    </select>
                    <button type="submit">Enregistrer</button>
                </form>
                <?php
            }

            $conn->close();
            ?>
        </main>
    </body>
</html>
