<?php
session_start(); // Démarre la session

// Vérifier si l'utilisateur est déjà connecté
if(isset($_SESSION['user_id'])) {
    header("Location: management.php");
    exit();
}

// Vérification des données de connexion si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données (à remplacer par vos propres informations de connexion)
    $servername = "localhost";
    $username = "root";
    $password_db = "isopropanol";
    $dbname = "main";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Vérification de l'existence de l'utilisateur dans la base de données
        $stmt = $conn->prepare("SELECT UserID, Email, Password FROM Users WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // Vérification du mot de passe
            if (password_verify($password, $user['Password'])) {
                // Authentification réussie, enregistrement des informations de l'utilisateur dans la session
                $_SESSION['user_id'] = $user['UserID'];
                header("Location: management.php");
                exit();
            } else {
                $error_message = "Mot de passe incorrect.";
            }
        } else {
            $error_message = "Adresse e-mail incorrecte.";
        }
    } catch(PDOException $e) {
        $error_message = "Erreur de connexion à la base de données: " . $e->getMessage();
    }
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!--Head informations-->

    <title>Garage V.Parrot | Connexion</title>
    <meta charset="utf-8">
    <meta name="author" content="Raphaël Quinchon">
    <meta name="description" content="Garage V.Parrot | Mecanique, réparation, carrosserie, ventes d'occasion">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Import CSS-->
    <link href="../../css/login.css" rel="stylesheet">
</head>
<body>
<header>
    <a href="../../index.php"><img id="logo" src="../../elements/images/header/logo.svg" alt="logo-garage"></a>
    <h1>Connexion | Espace de gestion</h1>
</header>
<div class="connexion_interface">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input id="login_email" class="inputs" type="email" name="email" placeholder="Adresse e-mail" required>
        <input id="login_password" class="inputs" type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Connexion</button>
    </form>
    <?php if(isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
</div>
</body>
</html>
