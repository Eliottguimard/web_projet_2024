<?php
session_start(); // Démarrer la session

// Vérifier si les informations du client sont stockées dans la session
if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['type'])){
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $type = $_SESSION['type'];
}
else {
    // Redirection vers la page de connexion si les informations du client ne sont pas disponibles
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Medicare: Accueil</title>
    <link rel="stylesheet" href="styleMedecin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="accueil.js" defer></script>
    <style>
        /* Style pour le menu déroulant */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            color: #2e8b57;
            display: none;
            position: absolute;
            background-color: palegreen;
            min-width: 170px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.7);
            z-index: 1;
            border-radius: 8px; /* Arrondir les bords */
            padding-left: 10px; /* Déplacer le texte vers la droite */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Style pour la section de planning */
        .planning-section {
            background-color: seagreen;
            border: 1px solid #98fb98;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .planning-item {
            margin-bottom: 10px;
        }

        .planning-date {
            font-weight: bold;
        }

        .planning-info {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <nav class="main-nav">
            <ul>
                <li><a href="index_client.php" class="active">Accueil</a></li>
                <li><a href="toutparcourir.php">Tout Parcourir</a></li>
                <li><a href="search.html">Recherche</a></li>
                <li><a href="appointments.html">Rendez-vous</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Votre Compte</a>
                    <div class="dropdown-content">
                        <!-- Contenu du menu déroulant avec les informations du patient -->
                        <p>Nom: <span id="patient-nom"><?php echo $nom; ?></span></p>
                        <p>Prénom: <span id="patient-prenom"><?php echo $prenom; ?></span></p>
                        <p>Type connexion: <span id="type-connexion"><?php echo $type; ?></span></p>
                        <!-- Ajoutez d'autres champs selon les informations du patient que vous souhaitez afficher -->
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <div class="content-container">
        <div class="welcome-faq-container">
            <div class="welcome-section">
                <h1>Bienvenue à Medicare Docteur <?php echo $nom; ?></h1>
                <p>Votre santé, notre priorité.</p>
                <p>Découvrez nos services et spécialistes.</p>
                <button class="cta-button">Explorez maintenant</button>
            </div>
            <div class="faq-section">
                <h2>Votre planning</h2>
                <div class="planning-section">
                    <h4><a href="">Cliquer pour voir votre planning</a></h4>
                    <!-- Exemple de consultations -->
                    <div class="planning-item">
                        <span class="planning-date">01/06/2024 14:00</span>
                        <span class="planning-info">Consultation avec M. Dupont</span>
                    </div>
                    <div class="planning-item">
                        <span class="planning-date">02/06/2024 09:30</span>
                        <span class="planning-info">Consultation avec Mme Durand</span>
                    </div>
                    <!-- Ajouter d'autres consultations ici -->
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <div class="footer-content">
        <p>Contactez-nous: <a href="mailto:info@medicare.com">info@medicare.com</a></p>
        <p>Téléphone : <a href="tel:+33171203622">01 71 20 36 22</a></p>
        <p>Adresse : 123 Rue de la Santé, 75013 Paris, France</p>
        <p><a href="https://www.google.com/maps?q=123+Rue+de+la+Sant%C3%A9,+75013+Paris,+France" target="_blank">Voir sur Google Maps</a></p>
    </div>
</footer>
</body>
</html>
