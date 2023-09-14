<?php
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

// Vérifier si un identifiant (id) est présent dans l'URL et s'il n'est pas vide
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupérer l'identifiant (id) depuis l'URL
    $getid = $_GET['id'];

    // Préparer une requête SQL pour récupérer les informations du jeu correspondant à l'identifiant
    $recupGames = $bdd->prepare('SELECT * FROM games WHERE id = ?');
    $recupGames->execute(array($getid));

    // Vérifier si le jeu existe dans la base de données
    if ($recupGames->rowCount() > 0) {
        // Récupérer les informations du jeu
        $gamesInfos = $recupGames->fetch();
        $title = $gamesInfos['titre'];
        $description = $gamesInfos['descriptif']; 
        $studio = $gamesInfos['studio'];
        $support = $gamesInfos['support'];
        $priority = $gamesInfos['priorite_developpement'];
        $motor = $gamesInfos['moteur'];
        $creation = $gamesInfos['date_creation'];
        $update = $gamesInfos['date_maj'];
        $release = $gamesInfos['date_sortie'];
        $budget = $gamesInfos['budget'];
        $status = $gamesInfos['statut'];
        $genre = $gamesInfos['genre'];
        $players = $gamesInfos['nombre_joueurs'];
        $creaters = $gamesInfos['créateur_du_jeu'];
        }
    } else {
        echo "Aucun jeu trouvé";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Informations du jeu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="game-info">
        <h1><?php echo $title; ?></h1>
        <p>Studio de développement : <?php echo $studio; ?></p>
        <p>Console de jeu : <?php echo $support; ?></p>
        <p>Priorité de développement : <?php echo $priority; ?></p>
        <p>Moteur du jeu : <?php echo $motor; ?></p>
        <p>Date de création : <?php echo $creation; ?></p>
        <p>Date dernière mise à jour : <?php echo $update; ?></p>
        <p>Date de sortie : <?php echo $release; ?></p>
        <p>Budget de développement : <?php echo $budget; ?></p>
        <p>État du jeu : <?php echo $status; ?></p>
        <p>Genre du jeu : <?php echo $genre; ?></p>
        <p>Nombre de joueurs : <?php echo $players; ?></p>
        <p>Créateurs du jeu : <?php echo $creaters; ?></p>
        <p>A propos du jeu : <?php echo $description; ?></p>
    </div>
</body>
</html>
