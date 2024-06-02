<?php
session_start();

$database = "medicare";

// Connectez-vous à votre base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$validation = '';

if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['type'])){
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $type = $_SESSION['type'];
}

if(!$db_found){
    die("Database not found");
}

if(isset($_POST['delete_id'])){
    $delete_id = $_POST['delete_id'];
    $delete_sql = "DELETE FROM medecin WHERE id = $delete_id";
}

if(isset($_POST['add_medecin'])){
    $nom_medecin = $_POST['nom_medecin'];
    $prenom_medecin = $_POST['prenom_medecin'];
    $email_medecin = $_POST['email_medecin'];
    $tel_medecin = $_POST['tel_medecin'];
    $specialite_medecin = $_POST['specialite_medecin'];
    $adresse_medecin = $_POST['adresse_medecin'];
    $login_medecin = $email_medecin;
    $mdp_medecin = $_POST['mdp_medecin'];
    $type = 'medecin';

    if(!empty($nom_medecin) && !empty($prenom_medecin) && !empty($email_medecin) && !empty($tel_medecin) && !empty($specialite_medecin) && !empty($adresse_medecin) && !empty($login_medecin) && !empty($mdp_medecin)){
        $insert_sql = "INSERT INTO medecin (nom, prenom, email, telephone, specialite, adresse, login, mdp, type) 
                       VALUES ('$nom_medecin', '$prenom_medecin', '$email_medecin', '$tel_medecin', '$specialite_medecin', '$adresse_medecin', '$login_medecin', '$mdp_medecin', '$type')";
        if(mysqli_query($db_handle, $insert_sql)){
            $validation = 'Médecin ajouté avec succès.';
        }

        else{
            $validation = 'Erreur lors de l\'ajout du médecin : ' . mysqli_error($db_handle);
        }
    }
}

$sql = "SELECT * FROM medecin";
$result = mysqli_query($db_handle, $sql);

?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Médecins</title>
        <link rel="stylesheet" href="styleAdmin.css">
        <style>
            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                color: #b30000;
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 170px;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                z-index: 1;
                border-radius: 8px;
                padding-left: 10px;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 8px 12px;
                border: 1px solid #ddd;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            .delete-button {
                background-color: #ff4d4d;
                color: white;
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .delete-button:hover {
                background-color: #ff1a1a;
            }

            .add-button {
                background-color: #4CAF50;
                color: white;
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-bottom: 20px;
            }

            .add-button:hover {
                background-color: #45a049;
            }

            .add-form {
                margin-top: 10px;
            }

            .add-form input {
                padding: 5px;
                margin-right: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
    <header>
        <div class="header-content">
            <img src="logo.png" alt="Medicare Logo" class="logo">
            <nav class="main-nav">
                <ul>
                    <li><a href="index_admin.php">Accueil</a></li>
                    <li><a href="admin_gerer_pro.php" class="active">Gérer les professionnels de santé</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Votre Compte</a>
                        <div class="dropdown-content">
                            <p>Nom: <span id="admin-nom"><?php echo $nom; ?></span></p>
                            <p>Prénom: <span id="admin-prenom"><?php echo $prenom; ?></span></p>
                            <p>Type connexion: <span id="type-connexion"><?php echo $type; ?></span></p>
                        </div>
                    </li>
                    <li><a href="index.html">Se déconnecter</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <h1>Ajouter un médecin</h1>

    <form method="post" action="" class="add-form">
        <input type="text" name="nom_medecin" placeholder="Nom du médecin" required>
        <input type="text" name="prenom_medecin" placeholder="Prénom du médecin" required>
        <input type="text" name="email_medecin" placeholder="Email du médecin" required>
        <input type="text" name="tel_medecin" placeholder="Téléphone du médecin" required>
        <input type="text" name="specialite_medecin" placeholder="Spécialité" required>
        <input type="text" name="adresse_medecin" placeholder="Adresse du médecin" required>
        <input type="text" name="mdp_medecin" placeholder="MDP du médecin" required>
        <button type="submit" name="add_medecin" class="add-button">Ajouter Médecin</button>
    </form>

    <?php
    if($validation != ''){
        echo "<p>$validation</p>";
    }
    ?>
    <h1>Liste des Médecins</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Spécialité</th>
            <th>Adresse</th>
            <th>Login</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['prenom'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['telephone'] . "</td>";
                echo "<td>" . $row['specialite'] . "</td>";
                echo "<td>" . $row['adresse'] . "</td>";
                echo "<td>" . $row['login'] . "</td>";
                echo '<td>
                    <form method="post" action="">
                        <input type="hidden" name="delete_id" value="' . $row['id'] . '">
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                  </td>';
                echo "</tr>";
            }
        }

        else{
            echo "<tr><td colspan='9'>Aucun médecin trouvé.</td></tr>";
        }
        ?>
        </tbody>
    </table>
    </body>
    </html>

<?php
mysqli_close($db_handle);
?>