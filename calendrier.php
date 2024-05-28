<?php
session_start(); // Démarrer la session

// Identifier le nom de la base de données
$database = "medicare";

// Connectez-vous à votre base de données
// Rappel: votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($db_found){
    $cal = "SELECT * FROM calendrier WHERE Ntelephone = 0612345678 ";
    $nom = "SELECT nom FROM medecin WHERE Ntelephone = 0612345678 ";
    $prenom = "SELECT prenom FROM medecin WHERE Ntelephone = 0612345678 ";
    $specialite = "SELECT specialite FROM medecin WHERE Ntelephone = 0612345678 ";
    $result = mysqli_query($db_handle, $cal);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['L1'] = $row['Lundi1'];
    $_SESSION['L2'] = $row['Lundi2'];
    $_SESSION['L3'] = $row['Lundi3'];
    $_SESSION['L4'] = $row['Lundi4'];
    $_SESSION['L5'] = $row['Lundi5'];
    $_SESSION['L6'] = $row['Lundi6'];
    $_SESSION['L7'] = $row['Lundi7'];
    $_SESSION['L8'] = $row['Lundi8'];
    $_SESSION['L9'] = $row['Lundi9'];
    $_SESSION['L10'] = $row['Lundi10'];
    $_SESSION['L11'] = $row['Lundi11'];
    $_SESSION['L12'] = $row['Lundi12'];
    $_SESSION['M1'] = $row['Mardi1'];
    $_SESSION['M2'] = $row['Mardi2'];
    $_SESSION['M3'] = $row['Mardi3'];
    $_SESSION['M4'] = $row['Mardi4'];
    $_SESSION['M5'] = $row['Mardi5'];
    $_SESSION['M6'] = $row['Mardi6'];
    $_SESSION['M7'] = $row['Mardi7'];
    $_SESSION['M8'] = $row['Mardi8'];
    $_SESSION['M9'] = $row['Mardi9'];
    $_SESSION['M10'] = $row['Mardi10'];
    $_SESSION['M11'] = $row['Mardi11'];
    $_SESSION['M12'] = $row['Mardi12'];
    $_SESSION['Me1'] = $row['Mercredi1'];
    $_SESSION['Me2'] = $row['Mercredi2'];
    $_SESSION['Me3'] = $row['Mercredi3'];
    $_SESSION['Me4'] = $row['Mercredi4'];
    $_SESSION['Me5'] = $row['Mercredi5'];
    $_SESSION['Me6'] = $row['Mercredi6'];
    $_SESSION['Me7'] = $row['Mercredi7'];
    $_SESSION['Me8'] = $row['Mercredi8'];
    $_SESSION['Me9'] = $row['Mercredi9'];
    $_SESSION['Me10'] = $row['Mercredi10'];
    $_SESSION['Me11'] = $row['Mercredi11'];
    $_SESSION['Me12'] = $row['Mercredi12'];
    $_SESSION['J1'] = $row['Jeudi1'];
    $_SESSION['J2'] = $row['Jeudi2'];
    $_SESSION['J3'] = $row['Jeudi3'];
    $_SESSION['J4'] = $row['Jeudi4'];
    $_SESSION['J5'] = $row['Jeudi5'];
    $_SESSION['J6'] = $row['Jeudi6'];
    $_SESSION['J7'] = $row['Jeudi7'];
    $_SESSION['J8'] = $row['Jeudi8'];
    $_SESSION['J9'] = $row['Jeudi9'];
    $_SESSION['J10'] = $row['Jeudi10'];
    $_SESSION['J11'] = $row['Jeudi11'];
    $_SESSION['J12'] = $row['Jeudi12'];
    $_SESSION['V1'] = $row['Vendredi1'];
    $_SESSION['V2'] = $row['Vendredi2'];
    $_SESSION['V3'] = $row['Vendredi3'];
    $_SESSION['V4'] = $row['Vendredi4'];
    $_SESSION['V5'] = $row['Vendredi5'];
    $_SESSION['V6'] = $row['Vendredi6'];
    $_SESSION['V7'] = $row['Vendredi7'];
    $_SESSION['V8'] = $row['Vendredi8'];
    $_SESSION['V9'] = $row['Vendredi9'];
    $_SESSION['V10'] = $row['Vendredi10'];
    $_SESSION['V11'] = $row['Vendredi11'];
    $_SESSION['V12'] = $row['Vendredi12'];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Planning</title>
</head>
<body>
    <p>
        <h2> Medecin</h2>
        <h1>specialité</h1>
    </p>
    <table border="3">
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
            <td><?php if ($_SESSION['L1'] == 0){
                    echo "Disponible";}
                    else echo "Complet"?></td>
            <td><?php if ($_SESSION['M1'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me1'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J1'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V1'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>

        <tr>
            <td>9h 20</td>
            <td><?php if ($_SESSION['L2'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M2'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me2'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J2'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V2'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>

        <tr>
            <td>9h40</td>
            <td><?php if ($_SESSION['L3'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M3'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me3'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J3'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V3'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>

        <tr>
            <td>10h</td>
            <td><?php if ($_SESSION['L4'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M4'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me4'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J4'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V4'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
        <tr>
            <td>10h 20</td>
            <td><?php if ($_SESSION['L5'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M5'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me5'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J5'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V5'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
        <tr>
            <td>10h 40</td>
            <td><?php if ($_SESSION['L6'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M6'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me6'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J6'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V6'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
        <tr>
            <td>11h</td>
            <td><?php if ($_SESSION['L7'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M7'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me7'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J7'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V7'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
        <tr>
            <td>11h 20</td>
            <td><?php if ($_SESSION['L8'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M8'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me8'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J8'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V8'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
        <tr>
            <td>11h 40</td>
            <td><?php if ($_SESSION['L9'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M9'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me9'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J9'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V9'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
        <tr>
            <td>14h</td>
            <td><?php if ($_SESSION['L10'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M10'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me10'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J10'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V10'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
        <tr>
            <td>14h 20</td>
            <td><?php if ($_SESSION['L11'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M11'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me11'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J11'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V11'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
        <tr>
            <td>14h 40</td>
            <td><?php if ($_SESSION['L12'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['M12'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['Me12'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['J12'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
            <td><?php if ($_SESSION['V12'] == 0){
                    echo "Disponible";}
                else echo "Complet"?></td>
        </tr>
    </table>

</body>
</html>