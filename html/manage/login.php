<?php
// Connexion à la base de données
include('../../config.php');

// Initialiser la session
session_start();

// Initialiser la variable pour le message d'erreur
$errorMsg = "";

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Requête pour récupérer le mot de passe associé au mail
    $sql = "SELECT UserID, Password FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Utilisateur trouvé
        $row = $result->fetch_assoc();
        $hashedPassword = $row['Password'];
        
        if (password_verify($userPassword, $hashedPassword)) {
            // Mot de passe correct, créer une session et rediriger vers l'espace management
            $_SESSION['user_id'] = $row['UserID']; // Utilisation de UserID
            header("Location: management.php");
            exit();
        } else {
            // Mot de passe incorrect, mettre à jour le message d'erreur
            $errorMsg = "Email ou mot de passe incorrect.";
        }
    } else {
        // Utilisateur non trouvé, mettre à jour le message d'erreur
        $errorMsg = "Email ou mot de passe incorrect.";
    }

    // Fermer la connexion à la base de données
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Head informations -->

    <title>Garage V.Parrot | Connexion</title>
    <meta charset="utf-8">
    <meta name="author" content="Raphaël Quinchon">
    <meta name="description" content="Garage V.Parrot | Mecanique, réparation, carrosserie, ventes d'occasion">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Import CSS -->
    <link href="../../css/login.css" rel="stylesheet">
</head>
    <body>
        <header>
            <a href="../../index.php"><img id="logo" src="../../elements/images/header/logo.svg" alt="logo-garage"></a>
            <h1>Connexion | Espace de gestion</h1>
        </header>
        <div class="connexion_interface">
            <form id="login_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input id="login_email" class="inputs" type="email" name="email" placeholder="Adresse e-mail" required>
                <input id="login_password" class="inputs" type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Connexion</button>
            </form>
            <span class="error_message"><?php echo $errorMsg; ?></span>
        </div>
    </body>
</html>