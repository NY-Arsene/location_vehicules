<?php
session_start(); // Démarrage de la session
session_unset(); // Supprime toutes les variables de session
session_destroy(); // Détruit la session
//header('Location: index.php'); // Redirige vers la page d'accueil
exit;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="deconnexion.css">

</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Vous êtes déconnecté(e)</h1>
            <p>Merci d'avoir utilisé notre service. À bientôt !</p>
            <div class="buttons">
                <a href="index.php" class="btn">Retour à l'accueil</a>
                <a href="login.php" class="btn">Se reconnecter</a>
            </div>
        </div>
    </div>
</body>
</html>
