<?php
session_start(); // Démarrer la session

// Vérifier si les informations du client sont stockées dans la session
if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['type'])){
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $type = $_SESSION['type'];
} else {
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
    <link rel="stylesheet" href="styleaccueil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="accueil.js" defer></script>
    <style>
        /* Style pour le menu déroulant */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            color: #003366;
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 170px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px; /* Arrondir les bords */
            padding-left: 10px; /* Déplacer le texte vers la droite */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Styles spécifiques aux sections de contenu */
        .welcome-section {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto 20px;
            max-width: 500px; /* Ajuster la largeur */
            text-align: center;
        }

        .welcome-section h1 {
            font-size: 28px;
            color: #0056b3;
            margin-bottom: 10px;
        }

        .welcome-section p {
            font-size: 18px;
            color: #666;
        }

        .content-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px; /* Ajoute un padding de 40px sur les côtés */
        }

        .news-section, .reviews-section, .doctor-updates-section, .client-info-section {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 22px;
            color: #0056b3;
            margin-bottom: 15px;
        }

        .reviews-section ul, .doctor-updates-section ul, .client-info-section ul {
            list-style: none;
            padding: 0;
        }

        .reviews-section ul li, .doctor-updates-section ul li, .client-info-section ul li {
            margin: 10px 0;
            padding: 10px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .reviews-section ul li {
            font-size: 16px;
            color: #333;
        }

        .client-info-section ul li a {
            color: #0056b3;
            text-decoration: none;
            transition: color 0.3s;
        }

        .client-info-section ul li a:hover {
            color: #003366;
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
                        <p>Nom: <span id="patient-nom"><?php echo $nom; ?></span></p>
                        <p>Prénom: <span id="patient-prenom"><?php echo $prenom; ?></span></p>
                        <p>Type connexion: <span id="type-connexion"><?php echo $type; ?></span></p>
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <section class="welcome-section">
        <h1>Bienvenue, <?php echo $prenom; ?>!</h1>
        <p>Nous sommes heureux de vous revoir.</p>
    </section>
    <div class="content-container">
        <section class="news-section">
            <h2 class="section-title">Actualités de vos médecins</h2>
            <ul>
                <li>Dr. John Doe a rejoint notre équipe de cardiologie.</li>
                <li>Dr. Jane Smith publie un nouvel article sur la dermatologie.</li>
            </ul>
        </section>
        <section class="reviews-section">
            <h2 class="section-title">Avis des Patients</h2>
            <ul>
                <li>"Excellente prise en charge, très satisfait du service." - John D.</li>
                <li>"Les médecins sont très professionnels et à l'écoute." - Marie P.</li>
            </ul>
        </section>
        <section class="doctor-updates-section">
            <h2 class="section-title">Mises à jour des médecins</h2>
            <ul>
                <li>Dr. Emily White est disponible pour des consultations en ligne le lundi.</li>
                <li>Dr. Marc Dupont a un nouveau créneau de rendez-vous le vendredi après-midi.</li>
            </ul>
        </section>
        <section class="client-info-section">
            <h2 class="section-title">Liens rapides</h2>
            <ul>
                <li><a href="appointments.html">Prendre un rendez-vous</a></li>
                <li><a href="index.html">Se déconnecter</a></li>

            </ul>
        </section>
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
