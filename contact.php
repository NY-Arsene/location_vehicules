<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Vérification des champs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<p>Veuillez remplir tous les champs.</p>";
        exit;
    }

    // Envoyer un email (remplacez l'adresse par la vôtre)
    $to = 'kontieboange@gmail.com';
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $emailBody = "Nom: $name\nEmail: $email\nSujet: $subject\n\n$message";

    if (mail($to, $subject, $emailBody, $headers)) {
        echo "<p>Merci pour votre message. Nous vous répondrons sous peu.</p>";
    } else {
        echo "<p>Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer plus tard.</p>";
    }
} 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="acceuil_footer.css">
</head>
<body>
    <header>
        <h1>Contactez-nous</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="vehicules.php">Véhicules</a></li>
                <li><a href="contact.html" class="active">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="contact-form">
            <h2>Nous sommes là pour vous aider</h2>
            <p>Vous avez une question ou besoin d'assistance ? Remplissez le formulaire ci-dessous et nous vous répondrons rapidement.</p>

            <form action="submit_contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Nom complet :</label>
                    <input type="text" id="name" name="name" placeholder="Votre nom complet" required>
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Votre adresse email" required>
                </div>

                <div class="form-group">
                    <label for="subject">Sujet :</label>
                    <input type="text" id="subject" name="subject" placeholder="Le sujet de votre message" required>
                </div>

                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" placeholder="Votre message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn">Envoyer</button>
            </form>
        </section>

        <section class="contact-info">
            <h2>Informations de contact</h2>
            <p>Téléphone : 01 23 45 67 89</p>
            <p>Email : support@luxride.com</p>
            <p>Adresse : 6 rue de l'invention, Le Mans, 72100</p>

            <h3>Suivez-nous</h3>
            <div class="social-icons">
                <a href="#"><img src="icons/facebook.svg" alt="Facebook"></a>
                <a href="#"><img src="icons/twitter.svg" alt="Twitter"></a>
                <a href="#"><img src="icons/instagram.svg" alt="Instagram"></a>
            </div>
        </section>
    </main>

    <footer>
        <div class="contenu-footer">
            <div class="footer-services bloc">
                <h3>Nos services</h3>
                <p>Location de voitures</p>
            </div>

            <div class="footer-contact bloc">
                <h3>Nous contacter</h3>
                <p>Téléphone : 55-55-55-55</p>
                <p>Email : supportclient@gmail.com</p>
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