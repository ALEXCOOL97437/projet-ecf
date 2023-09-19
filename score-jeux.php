<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

if(!$_SESSION['mdp']){
    header('Location: connexion-gamesoft.php');
}

// Requête SQL pour récupérer les jeux classés par nombre de likes en ordre décroissant
$requete = $bdd->prepare('SELECT id, titre, date_creation, budget, (SELECT COUNT(*) FROM likes WHERE 
id_jeu = games.id) AS likes FROM games ORDER BY likes DESC');
$requete->execute();
$jeux = $requete->fetchAll(PDO::FETCH_ASSOC);

// Variable pour stocker la somme totale des budgets
$sommeBudgets = 0;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score des Jeux</title>
    <link rel="stylesheet" href="score-jeux.css">
</head>
<body>
    <header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </nav>
    </header>
    <h1>SCORE DES JEUX</h1>
    <table>
        <tr>
            <th>Titre du Jeu</th>
            <th>Date de création</th>
            <th>Nombre de Likes</th>
            <th>Budget du jeu</th>
        </tr>
        <?php foreach ($jeux as $jeu) : ?>
            <tr>
                <td style="color: white;"><?php echo $jeu['titre']; ?></td>
                <td style="color: white;"><?php echo $jeu['date_creation']; ?></td>
                <td style="color: white;"><?php echo $jeu['likes']; ?></td>
                <td style="color: white;"><?php echo $jeu['budget']; ?></td>
            </tr>
            <?php
            // Ajouter le budget total
            $sommeBudgets += $jeu['budget'];
            ?>
        <?php endforeach; ?>
        <!-- Afficher la somme totale des budgets -->
        <tr>
            <td style="color: white;" colspan="3"><strong>TOTAL BUDGET</strong></td>
            <td style="color: white;"><?php echo $sommeBudgets; ?></td>
        </tr>
    </table>
</body>
</html>




 