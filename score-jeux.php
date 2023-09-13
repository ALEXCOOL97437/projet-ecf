<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
if(!$_SESSION['mdp']){
    header('Location: connexion-gamesoft.php');
}

// Requête SQL pour récupérer les jeux classés par nombre de likes en ordre décroissant
$requete = $bdd->prepare('SELECT id, titre, date_creation, (SELECT COUNT(*) FROM likes WHERE id_jeu = games.id) AS likes FROM games ORDER BY likes DESC');
$requete->execute();
$jeux = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement des Jeux</title>
</head>
<body>
    <h1>SCORE DES JEUX</h1>
    <table>
        <tr>
            <th>Titre du Jeu</th>
            <th>Date de création</th>
            <th>Nombre de Likes</th>
        </tr>
        <?php foreach ($jeux as $jeu) : ?>
            <tr>
                <td><?php echo $jeu['titre']; ?></td>
                <td><?php echo $jeu['date_creation']; ?></td>
                <td><?php echo $jeu['likes']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>




 