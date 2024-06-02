<?php
session_start(); // Démarrer la session

// Vérifier si les informations du client sont stockées dans la session
if(!isset($_SESSION['prenom']) || !isset($_SESSION['nom']) || !isset($_SESSION['type'])){
    // Redirection vers la page de connexion si les informations du client ne sont pas disponibles
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}
// Vérifier si les informations du client sont stockées dans la session
if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['login'])){
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $mail = $_SESSION['login'];
}

$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$type = $_SESSION['type'];


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

        .container-medecin {
            display: flex;
            flex-wrap: wrap; /* Permet aux éléments de passer à la ligne suivante si nécessaire */
            align-items: flex-start; /* Aligne les boîtes en haut, laissant chaque boîte prendre sa propre hauteur */
            justify-content: space-around; /* Répartit les éléments de manière uniforme */
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

        .medecin-box {
            flex: 1 1 30%; /* Assure que chaque boîte prenne une largeur de 30% */
            padding: 20px;
            max-width: 370px; /* Limite la largeur de la boîte */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background: #f9f9f9;
            margin: 10px; /* Ajout d'une marge pour espacer les boîtes */
            box-sizing: border-box; /* Inclut la padding et les marges dans la largeur */
        }

        .link {
            color: #0066cc;
            font-size: 100%;
        }

        .title {
            font-size: 130%;
            text-align: center;
        }

        footer {
            background-color: #87bfdc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e7e7e7;
            margin-top: 20px; /* Ajout d'une marge pour espacer le footer des autres contenus */
        }

        .footer-content a {
            color: #0066cc;
            text-decoration: none;
        }

        .footer-content p {
            margin: 5px 0; /* Espacement entre les paragraphes du footer */
        }
        .search-input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-button {
            padding: 5px 10px;
            margin-left: 5px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #002244;
        }
    </style>
</head>
<body>
<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <nav class="main-nav">
            <ul>
                <li><a href="index_client.php" >Accueil</a></li>
                <li><a href="toutparcourir_client.php" class="active">Tout Parcourir</a></li>
                <li>
                    <form action="recherche.php" method="get" class="search-bar">
                        <input type="text" name="query" placeholder="Rechercher..." class="search-input">
                        <button type="submit" class="search-button">Rechercher</button>
                    </form>
                </li>
                <li><a href="RDVClient.php">Rendez-vous</a></li>
                <!-- Remplacer "connexion.php" par "votre_compte.php" -->
                <li class="dropdown">
                    <a href="#" class="dropbtn">Votre Compte</a>
                    <div class="dropdown-content">
                        <!-- Contenu du menu déroulant avec les informations du patient -->
                        <p>Nom: <span id="patient-nom"><?php echo $nom; ?></span></p>
                        <p>Prénom: <span id="patient-prenom"><?php echo $prenom; ?></span></p>
                        <p>Courriel: <span id="type-connexion"><?php echo $mail; ?></span></p>
                        <!-- Ajoutez d'autres champs selon les informations du patient que vous souhaitez afficher -->
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="container-medecin">
        <div class="medecin-box">
            <h1 class="title">Nos médecins généralistes</h1>
            <p>En cas de légers problèmes de santé : consultez nos généralistes</p>
            <ul>
                <li>Rappels de vaccins</li>
                <li>Dépistage covid-19</li>
                <li>Point général santé</li>
            </ul>
            <p class="link"><a href="affichage_generalistes.php">Voir les médecins généralistes</a></p>
        </div>

        <div class="medecin-box">
            <h1 class="title">Nos médecins spécialisés</h1>
            <p>Prenez un rendez-vous avec un spécialiste afin d'obtenir un diagnsotic détaillé.</p>

            <h3>Nos différentes spécialités :</h3>
            <ul>
                <li>Addictologie</li>
                <li>Andrologie</li>
                <li>Cardiologie</li>
                <li>Dermatologie</li>
                <li>Gastro-Hépato-Entérologie</li>
                <li>Gynécologie</li>
                <li>I.S.T</li>
                <li>Ostéopathie</li>
            </ul>
            <p class="link"><a href="affichage_specialistes.php">Voir nos spécialistes</a></p>
        </div>

        <div class="medecin-box">
            <h1 class="title">Laboratoire de biologie médicale</h1>
            <p>Pour les services hors consultation : </p>
            <ul>
                <li>Don de sang</li>
                <li>Prise et examen du sang</li>
                <li>Dépistage covid-19</li>
                <li>Dépistage urinaire</li>
            </ul>
            <p class="link"><a href="affichage_labo.php">Plus d'informations</a></p>
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