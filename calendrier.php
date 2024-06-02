<?php
session_start(); // Démarrer la session
$IDMedecin = $_GET["medecin"];
//echo $IDMedecin;

// Identifier le nom de la base de données
$database = "medicare";

// Connectez-vous à votre base de données
// Rappel: votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($db_found){
    //1ere requete pour récupérer les infos du medecin
    $sql = "SELECT nom, prenom, telephone, specialite FROM medecin WHERE id = $IDMedecin";
    //Execution 1ere requete
    $result = mysqli_query($db_handle, $sql);
    $row = mysqli_fetch_assoc($result);
    //ajouter test au moins 1 resultat recupéré
    $nomMedecin = $row['nom'];
    $prenomMedecin = $row['prenom'];
    $telephoneMedecin = $row['telephone'];
    $specialiteMedecin = $row['specialite'];


    $calendrierMedecin=[];
    //2eme requete pour récupérer le calendrier du medecin
    $cal = "SELECT * FROM calendrier WHERE id = $IDMedecin";
    $result = mysqli_query($db_handle, $cal);
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $calendrierMedecin[]=$row;
        }
    }
    function afficherDispoCreneau($valeurCalendrier, $valeurMedecin, $creneau) {
        if ($valeurCalendrier == -1) {
            echo "  <td class='CaseIndispo'> Indisponible</td>";
        } else if ($valeurCalendrier == $_SESSION['id']) {
            echo " <td class='maResa'><a href='annulationRdv.php?medecin=$valeurMedecin&creneau=$creneau'>Votre Rdv</a></td>";
        } else if ($valeurCalendrier >= 1) {
            echo "<td class='RemplirCase'>   Pris   </td>";
        } else {
            echo "<td class='RemplirCaseLibre'><a href='validationRdv.php?medecin=$valeurMedecin&creneau=$creneau'>Prendre RDV</a></td>";
        }
    }
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
            color: white;
        }
        .maResa{
            background-color: red;
            color: red;
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
        <h1 class="medicare-title">MEDICARE </h1>
        <nav class="main-nav">
            <ul>
                <li><a href="index_client.php" class="active">Accueil</a></li>
                <li><a href="search.html">Recherche</a></li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>
    <p>
        <h1> Disponibilités du médecin <?php echo $prenomMedecin, " ", $nomMedecin, " " ?></h1>
        <h4> Contact : <?php echo $telephoneMedecin?> </h4>
        <h2> Spécialité <?php echo $specialiteMedecin ?></h2>
    </p>
    <?php if (!empty($calendrierMedecin)) : ?>
        <?php foreach ($calendrierMedecin as $calMed) : ?>
        <table border="3">
            <tr >
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
                afficherDispoCreneau($calMed['Lundi1'], $IDMedecin, "Lundi1");
                afficherDispoCreneau($calMed['Mardi1'], $IDMedecin, "Mardi1");
                afficherDispoCreneau($calMed['Mercredi1'], $IDMedecin, "Mercredi1");
                afficherDispoCreneau($calMed['Jeudi1'], $IDMedecin, "Jeudi1");
                afficherDispoCreneau($calMed['Vendredi1'], $IDMedecin, "Vendredi1");
                ?>
            </tr>

            <tr>
                <td>9h 20</td>
                <?php
                afficherDispoCreneau($calMed['Lundi2'], $IDMedecin, "Lundi2");
                afficherDispoCreneau($calMed['Mardi2'], $IDMedecin, "Mardi2");
                afficherDispoCreneau($calMed['Mercredi2'], $IDMedecin, "Mercredi2");
                afficherDispoCreneau($calMed['Jeudi2'], $IDMedecin, "Jeudi2");
                afficherDispoCreneau($calMed['Vendredi2'], $IDMedecin, "Vendredi2");
                ?>
            </tr>

            <tr>
                <td>9h 40</td>
                <?php
                afficherDispoCreneau($calMed['Lundi3'], $IDMedecin, "Lundi3");
                afficherDispoCreneau($calMed['Mardi3'], $IDMedecin, "Mardi3");
                afficherDispoCreneau($calMed['Mercredi3'], $IDMedecin, "Mercredi3");
                afficherDispoCreneau($calMed['Jeudi3'], $IDMedecin, "Jeudi3");
                afficherDispoCreneau($calMed['Vendredi3'], $IDMedecin, "Vendredi3");
                ?>
            </tr>

            <tr>
                <td>10h </td>
                <?php
                afficherDispoCreneau($calMed['Lundi4'], $IDMedecin, "Lundi4");
                afficherDispoCreneau($calMed['Mardi4'], $IDMedecin, "Mardi4");
                afficherDispoCreneau($calMed['Mercredi4'], $IDMedecin, "Mercredi4");
                afficherDispoCreneau($calMed['Jeudi4'], $IDMedecin, "Jeudi4");
                afficherDispoCreneau($calMed['Vendredi4'], $IDMedecin, "Vendredi4");
                ?>
            </tr>

            <tr>
                <td>10h 20</td>
                <?php
                afficherDispoCreneau($calMed['Lundi5'], $IDMedecin, "Lundi5");
                afficherDispoCreneau($calMed['Mardi5'], $IDMedecin, "Mardi5");
                afficherDispoCreneau($calMed['Mercredi5'], $IDMedecin, "Mercredi5");
                afficherDispoCreneau($calMed['Jeudi5'], $IDMedecin, "Jeudi5");
                afficherDispoCreneau($calMed['Vendredi5'], $IDMedecin, "Vendredi5");
                ?>
            </tr>

            <tr>
                <td>10h 40</td>
                <?php
                afficherDispoCreneau($calMed['Lundi6'], $IDMedecin, "Lundi6");
                afficherDispoCreneau($calMed['Mardi6'], $IDMedecin, "Mardi6");
                afficherDispoCreneau($calMed['Mercredi6'], $IDMedecin, "Mercredi6");
                afficherDispoCreneau($calMed['Jeudi6'], $IDMedecin, "Jeudi6");
                afficherDispoCreneau($calMed['Vendredi6'], $IDMedecin, "Vendredi6");
                ?>
            </tr>

            <tr>
                <td>11h</td>
                <?php
                afficherDispoCreneau($calMed['Lundi7'], $IDMedecin, "Lundi7");
                afficherDispoCreneau($calMed['Mardi7'], $IDMedecin, "Mardi7");
                afficherDispoCreneau($calMed['Mercredi7'], $IDMedecin, "Mercredi7");
                afficherDispoCreneau($calMed['Jeudi7'], $IDMedecin, "Jeudi7");
                afficherDispoCreneau($calMed['Vendredi7'], $IDMedecin, "Vendredi7");
                ?>
            </tr>

            <tr>
                <td>11h 20</td>
                <?php
                afficherDispoCreneau($calMed['Lundi8'], $IDMedecin, "Lundi8");
                afficherDispoCreneau($calMed['Mardi8'], $IDMedecin, "Mardi8");
                afficherDispoCreneau($calMed['Mercredi8'], $IDMedecin, "Mercredi8");
                afficherDispoCreneau($calMed['Jeudi8'], $IDMedecin, "Jeudi8");
                afficherDispoCreneau($calMed['Vendredi8'], $IDMedecin, "Vendredi8");
                ?>
            </tr>

            <tr>
                <td>11h 40</td>
                <?php
                afficherDispoCreneau($calMed['Lundi9'], $IDMedecin, "Lundi9");
                afficherDispoCreneau($calMed['Mardi9'], $IDMedecin, "Mardi9");
                afficherDispoCreneau($calMed['Mercredi9'], $IDMedecin, "Mercredi9");
                afficherDispoCreneau($calMed['Jeudi9'], $IDMedecin, "Jeudi9");
                afficherDispoCreneau($calMed['Vendredi9'], $IDMedecin, "Vendredi9");
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
                afficherDispoCreneau($calMed['Lundi10'], $IDMedecin, "Lundi10");
                afficherDispoCreneau($calMed['Mardi10'], $IDMedecin, "Mardi10");
                afficherDispoCreneau($calMed['Mercredi10'], $IDMedecin, "Mercredi10");
                afficherDispoCreneau($calMed['Jeudi10'], $IDMedecin, "Jeudi10");
                afficherDispoCreneau($calMed['Vendredi10'], $IDMedecin, "Vendredi10");
                ?>
            </tr>

            <tr>
                <td>14h 20</td>
                <?php
                afficherDispoCreneau($calMed['Lundi11'], $IDMedecin, "Lundi11");
                afficherDispoCreneau($calMed['Mardi11'], $IDMedecin, "Mardi11");
                afficherDispoCreneau($calMed['Mercredi11'], $IDMedecin, "Mercredi11");
                afficherDispoCreneau($calMed['Jeudi11'], $IDMedecin, "Jeudi11");
                afficherDispoCreneau($calMed['Vendredi11'], $IDMedecin, "Vendredi11");
                ?>
            </tr>

            <tr>
                <td>14h 40</td>
                <?php
                afficherDispoCreneau($calMed['Lundi12'], $IDMedecin, "Lundi12");
                afficherDispoCreneau($calMed['Mardi12'], $IDMedecin, "Mardi12");
                afficherDispoCreneau($calMed['Mercredi12'], $IDMedecin, "Mercredi12");
                afficherDispoCreneau($calMed['Jeudi12'], $IDMedecin, "Jeudi12");
                afficherDispoCreneau($calMed['Vendredi12'], $IDMedecin, "Vendredi12");
                ?>
            </tr>
        </table>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Ce médecin n'a pas encore de calendrier disponible.</p>
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