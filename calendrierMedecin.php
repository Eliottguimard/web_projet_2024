<?php
session_start(); // Démarrer la session
//$IDMedecin = $_GET["medecin"];
//echo $IDMedecin;


// Vérifier si les informations du client sont stockées dans la session
if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['type']) && isset($_SESSION['email']) && isset($_SESSION['telephone']) && isset($_SESSION['specialite']) && isset($_SESSION['id'])){

}
else {
    // Redirection vers la page de connexion si les informations du client ne sont pas disponibles
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}

// Identifier le nom de la base de données
$database = "medicare";

// Connectez-vous à votre base de données
// Rappel: votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($db_found){

    //1ere requete pour récupérer les infos du medecin
    $sql = "SELECT nom, prenom, telephone, specialite FROM medecin WHERE medecin.id = $_SESSION[id]";
    //Execution 1ere requete
    if ($result = mysqli_query($db_handle, $sql)) {
        $row = mysqli_fetch_assoc($result);
        //ajouter test au moins 1 resultat recupéré
        $nomMedecin = $row['nom'];
        $prenomMedecin = $row['prenom'];
        $telephoneMedecin = $row['telephone'];
        $specialiteMedecin = $row['specialite'];
    }

    $calendrierMedecin=[];
    //2eme requete pour récupérer le calendrier du medecin
    $cal = "SELECT * FROM calendrier WHERE calendrier.id = $_SESSION[id]";
    //Execution 2eme requete
    //ajouter test au moins 1 resultat recupéré
    $result = mysqli_query($db_handle, $cal);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result))
        {
            $calendrierMedecin[]=$row;
        }
    }
    function afficheDansCase($client)
    {
        if ($client == -1) {
            echo " <td class='CaseIndispo'> Indisponible</td>";
        } else if ($client == 0) {
            echo " <td class='RemplirCaseLibre'>Pas de Rdv</td>";
        } else if ($client >= 1) {
            $database = "medicare";
            $db_handle = mysqli_connect('localhost', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);
            if($db_found) {
                $recupClient = "SELECT nom, prenom FROM clients WHERE clients.id = $client";
                $resultRecupClient = mysqli_query($db_handle, $recupClient);
                if ($resultRecupClient) {
                    while ($row = mysqli_fetch_assoc($resultRecupClient)) {
                        echo "<td class='RemplirCase'> RDV avec $row[nom] $row[prenom]</td>";
                    }
                }
            }
        }
    }
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
        {
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
        .RemplirCaseLibre{
            background-color: white;
            color: black;
        }
        .maResa{
            background-color: red;
            color: black;
        }
        .RemplirCase {
            background-color: #0066cc;
            bgcolor: #0066cc;
            /*color: #fff;
            border: none;
             padding: 10px 20px;
            margi-bottom: 30px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;*/
        }
        .NoircirCase {
            background-color: black;
            bgcolor: black;
        }
        .CaseIndispo {
            background-color: grey;
            bgcolor: black;
        }
    </style>
    <title>Planning</title>
</head>
<body>
<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <h1 class="medicare-title">MEDICARE MEDECIN</h1>
        <nav class="main-nav">
            <ul>
                <li><a href="index_medecin.php" class="active">Accueil</a></li>
                <!-- Remplacer "connexion.php" par "votre_compte.php" -->
                <li class="dropdown">
                    <a href="#" class="dropbtn">Votre Compte</a>
                    <div class="dropdown-content">
                        <!-- Contenu du menu déroulant avec les informations du patient -->
                        <p>Nom: <span id="patient-nom"><?php echo $_SESSION['nom']; ?></span></p>
                        <p>Prénom: <span id="patient-prenom"><?php echo $_SESSION['prenom']; ?></span></p>
                        <p>Courriel: <span id="type-connexion"><?php echo $_SESSION['email']; ?></span></p>
                        <!-- Ajoutez d'autres champs selon les informations du patient que vous souhaitez afficher -->
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>
    <p>
        <h1> Docteur <?php echo $_SESSION['prenom'], " ", $_SESSION['nom']?></h1>
        <h4> Specialité <?php echo $_SESSION['specialite'] ?></h4>

    </p>
    <?php if (!empty($calendrierMedecin)) : ?>
        <?php foreach ($calendrierMedecin as $calMed) : ?>
            <h2> Votre calendrier </h2>
            <table border="3" >
            <tr>
                <td>   </td>
                <td>Lundi</td>
                <td>Mardi</td>
                <td>Mercredi</td>
                <td>Jeudi</td>
                <td>Vendredi</td>
            </tr>
            <tr>
                <td>9h</td>
                <?php
                afficheDansCase($calMed['Lundi1']);
                afficheDansCase($calMed['Mardi1']);
                afficheDansCase($calMed['Mercredi1']);
                afficheDansCase($calMed['Jeudi1']);
                afficheDansCase($calMed['Vendredi1']);
                ?>
            </tr>

            <tr>
                <td>9h 20</td>
                <?php
                afficheDansCase($calMed['Lundi2']);
                afficheDansCase($calMed['Mardi2']);
                afficheDansCase($calMed['Mercredi2']);
                afficheDansCase($calMed['Jeudi2']);
                afficheDansCase($calMed['Vendredi2']);
                ?>
            </tr>

            <tr>
                <td>9h 40</td>
                <?php
                afficheDansCase($calMed['Lundi3']);
                afficheDansCase($calMed['Mardi3']);
                afficheDansCase($calMed['Mercredi3']);
                afficheDansCase($calMed['Jeudi3']);
                afficheDansCase($calMed['Vendredi3']);
                ?>
            </tr>

            <tr>
                <td>10h </td>
                <?php
                afficheDansCase($calMed['Lundi4']);
                afficheDansCase($calMed['Mardi4']);
                afficheDansCase($calMed['Mercredi4']);
                afficheDansCase($calMed['Jeudi4']);
                afficheDansCase($calMed['Vendredi4']);
                ?>
            </tr>

            <tr>
                <td>10h 20</td>
                <?php
                afficheDansCase($calMed['Lundi5']);
                afficheDansCase($calMed['Mardi5']);
                afficheDansCase($calMed['Mercredi5']);
                afficheDansCase($calMed['Jeudi5']);
                afficheDansCase($calMed['Vendredi5']);
                ?>
            </tr>

            <tr>
                <td>10h 40</td>
                <?php
                afficheDansCase($calMed['Lundi6']);
                afficheDansCase($calMed['Mardi6']);
                afficheDansCase($calMed['Mercredi6']);
                afficheDansCase($calMed['Jeudi6']);
                afficheDansCase($calMed['Vendredi6']);
                ?>
            </tr>

            <tr>
                <td>11h</td>
                <?php
                afficheDansCase($calMed['Lundi7']);
                afficheDansCase($calMed['Mardi7']);
                afficheDansCase($calMed['Mercredi7']);
                afficheDansCase($calMed['Jeudi7']);
                afficheDansCase($calMed['Vendredi7']);
                ?>
            </tr>

            <tr>
                <td>11h 20</td>
                <?php
                afficheDansCase($calMed['Lundi8']);
                afficheDansCase($calMed['Mardi8']);
                afficheDansCase($calMed['Mercredi8']);
                afficheDansCase($calMed['Jeudi8']);
                afficheDansCase($calMed['Vendredi8']);
                ?>
            </tr>

            <tr>
                <td>11h 40</td>
                <?php
                afficheDansCase($calMed['Lundi9']);
                afficheDansCase($calMed['Mardi9']);
                afficheDansCase($calMed['Mercredi9']);
                afficheDansCase($calMed['Jeudi9']);
                afficheDansCase($calMed['Vendredi9']);
                ?>
            </tr>
            <tr>
                <td>12h - 14h</td>
                <td class='NoircirCase'> <?php echo "."?> </td>
                <td class='NoircirCase'> <?php echo " ."?> </td>
                <td class='NoircirCase'> <?php echo " ."?> </td>
                <td class='NoircirCase'> <?php echo " ."?> </td>
                <td class='NoircirCase'> <?php echo " ."?> </td>
            </tr>
            <tr>
                <td> </td>
                <td class='NoircirCase'> <?php echo "."?> </td>
                <td class='NoircirCase'> <?php echo " ."?> </td>
                <td class='NoircirCase'> <?php echo " ."?> </td>
                <td class='NoircirCase'> <?php echo " ."?> </td>
                <td class='NoircirCase'> <?php echo " ."?> </td>
            </tr>

            <tr>
                <td>14h</td>
                <?php
                afficheDansCase($calMed['Lundi10']);
                afficheDansCase($calMed['Mardi10']);
                afficheDansCase($calMed['Mercredi10']);
                afficheDansCase($calMed['Jeudi10']);
                afficheDansCase($calMed['Vendredi10']);
                ?>
            </tr>

            <tr>
                <td>14h 20</td>
                <?php
                afficheDansCase($calMed['Lundi11']);
                afficheDansCase($calMed['Mardi11']);
                afficheDansCase($calMed['Mercredi11']);
                afficheDansCase($calMed['Jeudi11']);
                afficheDansCase($calMed['Vendredi11']);
                ?>
            </tr>

            <tr>
                <td>14h 40</td>
                <?php
                afficheDansCase($calMed['Lundi12']);
                afficheDansCase($calMed['Mardi12']);
                afficheDansCase($calMed['Mercredi12']);
                afficheDansCase($calMed['Jeudi12']);
                afficheDansCase($calMed['Vendredi12']);
                ?>
            </tr>
        </table>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Votre calendrier n'est pas encore disponible.</p>
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