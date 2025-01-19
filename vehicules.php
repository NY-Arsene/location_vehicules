<?php
session_start(); // Gestion des sessions

// Connexion à la base de données
$conn = new mysqli('localhost', 'e2405714', 'jrn114sh', 'e2405714');

if ($conn->connect_error) {
    die('Erreur de connexion : ' . $conn->connect_error);
}

// Récupération des véhicules
$requete = "SELECT * FROM vehicules";
$resultat = $conn->query($requete);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroomly Locations</title>
    <link rel="stylesheet" href="acceuil.css">
    <link rel="stylesheet" href="acceuil_footer.css">
    <link rel="stylesheet" href="vehicules.css">
</head>
<body>
<header>
    <h1>Vroomly Locations</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="vehicules.php">Véhicules</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>Nos Véhicules Disponibles</h2>
    <div class="liste-vehicules">
        <?php while ($vehicule = $resultat->fetch_assoc()): ?>
            <div class="carte-vehicule">
                <img src="<?php echo htmlspecialchars($vehicule['url_image']); ?>" alt="Image de <?php echo htmlspecialchars($vehicule['nom']); ?>">
                <h3><?php echo htmlspecialchars($vehicule['nom']); ?></h3>
                <p>Prix : <?php echo htmlspecialchars($vehicule['prix_par_jour']); ?> €/jour</p>
                <p><?php echo htmlspecialchars($vehicule['description']); ?></p>
                <?php if (isset($_SESSION['utilisateur_id'])): ?>
                    <!-- Si l'utilisateur est connecté -->
                    <a href="reservation.php?id_vehicule=<?php echo $vehicule['id']; ?>" class="btn">Réserver</a>
                <?php else: ?>
                    <!-- Si l'utilisateur n'est pas connecté -->
                    <a href="connexion.php" class="btn">Connectez-vous pour réserver</a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<footer>
    <div class="contenu-footer">
        <div class="footer-services bloc">
            <h3>Nos services</h3>
            <p>Locations de voitures</p>
        </div>

        <div class="footer-contact bloc">
            <h3>Nous contacter</h3>
            <p>Téléphone : 55-55-55-55</p>
            <p>Email : vroomly@gmail.com</p>
            <p>Adresse : 6 rue de l'invention, Le Mans, 72100</p>
        </div>

        <div class="footer-horaires bloc">
            <h3>Nos horaires</h3>
            <p>Ouvert 7j/7</p>
            <p>24h/24</p>
        </div>
    </div>

    <div class="pied-de-page">
        <p>&copy; 2025 Vroomly. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>

