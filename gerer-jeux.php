<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

if (!$_SESSION['mdp']) {
    header('Location: connexion-gamesoft.php');
}

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
        
        

        // Vérifier si le formulaire a été soumis
        if (isset($_POST['valider'])) {
            // Récupérer les données saisies par l'admin
            $title_saisie = $_POST['titre'];
            $description_saisie = $_POST['descriptif'];
            $studio_saisie = $_POST['studio'];
            $support_saisie = $_POST['support'];
            $priority_saisie = $_POST['priorite_developpement'];
            $motor_saisie = $_POST['moteur'];
            $creation_saisie = $_POST['date_creation'];
            $update_saisie = $_POST['date_maj'];
            $release_saisie = $_POST['date_sortie'];
            $budget_saisie = $_POST['budget'];
            $status_saisie = $_POST['statut'];
            $genre_saisie = $_POST['genre'];
            $players_saisie = $_POST['nombre_joueurs'];
            $creaters_saisie = $_POST['créateur_du_jeu'];


            // Préparer une requête SQL pour mettre à jour le membre dans la base de données
            $updateGames = $bdd->prepare('UPDATE games SET titre = ?, descriptif = ?, studio = ?,
            support = ?, priorite_developpement = ?, moteur = ?, date_creation = ?, date_maj = ?, date_sortie = ?,
            budget = ?, statut = ?, genre = ?, nombre_joueurs = ?, créateur_du_jeu = ? WHERE id = ?');
            $updateGames->execute(array($title_saisie, $description_saisie, $studio_saisie, $support_saisie,
            $priority_saisie, $motor_saisie, $creation_saisie, $update_saisie, $release_saisie,
            $budget_saisie, $status_saisie, $genre_saisie, $players_saisie, $creaters_saisie, $getid));

            header('Location: jeux.php');
        }
    } else {
        echo "Aucun jeu trouvé";
    }
} else {
    echo "Aucun identifiant trouvé";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le jeu</title>
    <link rel="stylesheet" href="publier.css">
</head>
<body>
    <header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </nav>
    </header>
    <form method="POST" action="" class="form-container">
         <div class="input-group">
            <label for="title">Ajouter un Titre</label>
            <input type="text" id="title" name="titre" value="<?php echo $title; ?>">
         </div>
        <div class="input-group">
            <label for="description">A propos du jeu</label>
            <input type="text" id="description" name="descriptif" value="<?php echo $description; ?>">     
        </div>
        <div class="input-group">
            <label for="studio">Studio de développement</label>
            <input type="text" id="studio" name="studio" value="<?php echo $studio; ?>">
        </div>
        <div class="input-group">
            <label for="support">Console de jeu</label>
            <input type="text" id="support" name="support" value="<?php echo $support; ?>">     
        </div>
        <div class="input-group">
            <label for="priority">Priorité de développement</label>
            <input type="number" id="priority" name="priorite_developpement" value="<?php echo $priority; ?>">
        </div>
        <div class="input-group">
            <label for="motor">Moteur du du jeu</label>
            <input type="text" id="motor" name="moteur" value="<?php echo $motor; ?>">     
        </div>
        <div class="input-group">
            <label for="creation">Date de création</label>
            <input type="date" id="creation" name="date_creation" value="<?php echo $creation; ?>">
        </div>
        <div class="input-group">
            <label for="update">Date dernière mise à jour</label>
            <input type="date" id="update" name="date_maj" value="<?php echo $update; ?>">     
        </div>
        <div class="input-group">
            <label for="release">Date de sortie</label>
            <input type="date" id="release" name="date_sortie" value="<?php echo $release; ?>">
        </div>
        <div class="input-group">
            <label for="budget">Budjet de développement</label>
            <input type="number" id="budget" name="budget" value="<?php echo $budget; ?>">     
        </div>
        <div class="input-group">
            <label for="status">Etat du jeu</label>
            <input type="text" id="status" name="statut" value="<?php echo $status; ?>">     
        </div>
        <div class="input-group">
            <label for="genre">Genre du jeu</label>
            <input type="text" id="genre" name="genre" value="<?php echo $genre; ?>">
        </div>
        <div class="input-group">
            <label for="players">Nombre de joueurs</label>
            <input type="number" id="players" name="nombre_joueurs" value="<?php echo $players; ?>">     
        </div>
        <div class="input-group">
            <label for="creaters">Créateurs du jeu</label>
            <input type="text" id="creaters" name="créateur_du_jeu" value="<?php echo $creaters; ?>">     
        </div>
        <input type="submit" id="buttonAddGames" name="valider">
    </form>
</body>
</html>
