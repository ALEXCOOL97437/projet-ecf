<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupérer l'identifiant (id) depuis l'URL
    $getid = $_GET['id'];

    // Récupère l'id de l'utilisateur   
    if (isset($_SESSION['id'])) {
        $sessionid = $_SESSION['id'];
        $sessionPseudo = $_SESSION['pseudo'];
    } else {
        echo "Veuillez vous connecté pour pursuivre votre requête";
        exit;
    }
    // Vérifier si le formulaire a été soumis
if (isset($_POST['envoi'])) {
    $avis = $_POST['games_avis'];
        
        // Préparer une requête SQL pour insérer un nouveau jeu dans la base de données
        $inserAvis = $bdd->prepare('INSERT INTO avis(id_jeu, pseudo, games_avis, date) VALUES (?, ?, ?,NOW())');
        
        // Exécuter la requête SQL en passant les valeurs des champs
        $inserAvis->execute(array($getid, $sessionPseudo, $avis));

        // Afficher un message de succès si l'insertion a réussi
        echo '<script>alert("Bonjour, nouveau avis ajouter"); window.location.href = "tous-les-jeux.php";</script>';
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un Avis</title>
    <link rel="stylesheet" href="avis.css">
</head>
<body>
<header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="gamesoft-page-accueil.php">Accueil</a></li>
            <li><a href="tous-les-jeux.php">JEUX</a></li>
            </ul>
        </nav>
    </header>
    <form method="POST" action="" class="forme-container">
    <div class="input-group">
            <label style="color: white;" for="avis">Ajouter un avis</label>
            <input type="text" id="games_avis" name="games_avis">
        </div>
    <div class="input-action">
        <button type="submit" id="buttonAddAvis" name="envoi">Ajouter un avis</button>
    </div>
    </form>

</body>
</html>