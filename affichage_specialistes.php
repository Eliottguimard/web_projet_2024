<?php
session_start(); // Démarrer la session

// Identifier le nom de la base de données
$database = "medicare";

// Connexion à la base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

// Tableau pour stocker les médecins généralistes
$generalistes = [];

if ($db_found) {
    // Requête SQL pour récupérer les médecins généralistes
    $sql = "SELECT * FROM medecin WHERE specialite !='Généraliste'";
    $result = mysqli_query($db_handle, $sql);

    if ($result) {
        // Parcourir les résultats et les stocker dans le tableau $generalistes
        while ($row = mysqli_fetch_assoc($result)) {
            $generalistes[] = $row;
        }
    }

    // Fermer la connexion à la base de données
    mysqli_close($db_handle);
}

// Vérifier si les informations du client sont stockées dans la session
if(!isset($_SESSION['prenom']) || !isset($_SESSION['nom']) || !isset($_SESSION['type'])){
    // Redirection vers la page de connexion si les informations du client ne sont pas disponibles
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}

$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$type = $_SESSION['type'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des médecins généralistes</title>
    <link rel="stylesheet" href="styleaccueil.css">
    <style>
        /* Styles pour la mise en page */
        .medecin {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        .dropdown {
            position: relative;
            display: inline-block;
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
    </style>
</head>
<body>

<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <nav class="main-nav">
            <ul>
                <li><a href="index_client.php" >Accueil</a></li>
                <li><a href="toutparcourir.php" class="active">Tout Parcourir</a></li>
                <li><a href="search.html">Recherche</a></li>
                <li><a href="appointments.html">Rendez-vous</a></li>
                <!-- Remplacer "connexion.php" par "votre_compte.php" -->
                <li class="dropdown">
                    <a href="#" class="dropbtn">Votre Compte</a>
                    <div class="dropdown-content">
                        <!-- Contenu du menu déroulant avec les informations du patient -->
                        <p>Nom: <span id="patient-nom"><?php echo $nom; ?></span></p>
                        <p>Prénom: <span id="patient-prenom"><?php echo $prenom; ?></span></p>
                        <p>type connexion: <span id="type-connexion"><?php echo $type; ?></span></p>
                        <!-- Ajoutez d'autres champs selon les informations du patient que vous souhaitez afficher -->
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>

<h1>Liste des médecins généralistes</h1>
<?php if (!empty($generalistes)) : ?>
    <?php foreach ($generalistes as $medecin) : ?>
        <div class="medecin">
            <h2><?php echo htmlspecialchars($medecin['nom']); ?></h2>
            <p>Spécialité: <?php echo htmlspecialchars($medecin['specialite']); ?></p>
            <p>Adresse: <?php echo htmlspecialchars($medecin['adresse']); ?></p>
            <p>Téléphone: <?php echo htmlspecialchars($medecin['telephone']); ?></p>
            <!-- Ajoutez d'autres informations à afficher selon vos besoins -->
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>Aucun sépcialiste trouvé.</p>
<?php endif; ?>
</body>
<footer>
    <div class="footer-content">
        <p>Contactez-nous: <a href="mailto:info@medicare.com">info@medicare.com</a></p>
        <p>Téléphone : <a href="tel:+33171203622">01 71 20 36 22</a></p>
        <p>Adresse : 123 Rue de la Santé, 75013 Paris, France</p>
        <p><a href="https://www.google.com/maps?q=123+Rue+de+la+Sant%C3%A9,+75013+Paris,+France" target="_blank">Voir sur Google Maps</a></p>
    </div>
</footer>
</html>

