<?php
session_start();

if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['type'])) {
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $type = $_SESSION['type'];
} else {
    header("Location: connexion.php");
    exit();
}


$database = "medicare";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


$results_medecins = [];

if($db_found){

    if(isset($_GET['query'])){
        $query = htmlspecialchars($_GET['query']);

        if(stripos($query, 'labo') !== false){
            header("Location: affichage_labo.php");
            exit();
        }

        $sql_medecins = "SELECT * FROM medecin WHERE nom LIKE '%$query%' OR specialite LIKE '%$query%'";
        $result_medecins = mysqli_query($db_handle, $sql_medecins);


        if(mysqli_num_rows($result_medecins) > 0){

            while($row = mysqli_fetch_assoc($result_medecins)){
                $results_medecins[] = $row;
            }
        }
    }
} else {
    echo "Database not found";
}

mysqli_close($db_handle);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de recherche</title>
    <link rel="stylesheet" href="styleaccueil.css">
    <style>
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
        .results-section {
            margin-top: 20px;
        }
        .result-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .result-item h3 {
            margin: 0;
            color: #003366;
        }
        .result-item p {
            margin: 5px 0;
        }

        .search-bar {
            display: flex;
            align-items: center;
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
                <li><a href="index_client.php">Accueil</a></li>
                <li><a href="toutparcourir_client.php">Tout Parcourir</a></li>
                <li>
                    <form action="rechercher.php" method="get" class="search-bar">
                        <input type="text" name="query" placeholder="Rechercher..." class="search-input">
                        <button type="submit" class="search-button">Rechercher</button>
                    </form>
                </li>
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
    <div class="content-container">
        <h1>Résultats de recherche pour "<?php echo isset($query) ? $query : ''; ?>"</h1>

        <div class="results-section">
            <h2>Médecins</h2>
            <?php if (count($results_medecins) > 0): ?>
                <?php foreach ($results_medecins as $medecin): ?>
                    <div class="result-item">
                        <h3><?php echo "Dr. ".$medecin['nom']; ?></h3>
                        <p><strong>Spécialité:</strong> <?php echo $medecin['specialite']; ?></p>
                        <p><strong>Adresse:</strong> <?php echo $medecin['adresse']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun médecin trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<footer>
    <div class="footer-content">
        <p>Contactez-nous: <a href="mailto:info@medicare.com">info@medicare.com</a></p>
        <p>Téléphone : <a href="tel:+33171203622">01 71 20 36 22</a></p>
        <p>Adresse : 123 Rue de la Santé, 75013 Paris, France</p>
    </div>
</footer>
</body>
</html>
