<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
if (!$_SESSION['mdp']) {
    header('Location: connexion-gamesoft.php');
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['envoi'])) {
    $title = $_POST['titre'];
    $studio = $_POST['studio'];
    $support = $_POST['support'];
    $priority = $_POST['priorite_developpement'];
    $motor = $_POST['moteur'];
    $creation = $_POST['date_creation'];
    $update = $_POST['date_maj'];
    $release = $_POST['date_sortie'];
    $budget = $_POST['budget'];
    $status = $_POST['statut'];
    $type = $_POST['genre'];
    $players = $_POST['nombre_joueurs'];
    $description = $_POST['descriptif'];
    $creaters = $_POST['créateur_du_jeu'];
        
        // Préparer une requête SQL pour insérer un nouveau jeu dans la base de données
        $inserGames = $bdd->prepare('INSERT INTO games(titre, studio, support, priorite_developpement,
        moteur, date_creation, date_maj, date_sortie, budget, statut, genre, nombre_joueurs, descriptif,
        créateur_du_jeu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        // Exécuter la requête SQL en passant les valeurs des champs
        $inserGames->execute(array($title, $studio, $support, $priority, $motor, $creation, $update,
        $release, $budget, $status, $type, $players, $description, $creaters));

        // Afficher un message de succès si l'insertion a réussi
        echo '<script>alert("Bonjour, nouveau jeu ajouter"); window.location.href = "fiche-jeu1.php";</script>';
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Publier un jeu</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
    <div class="input-group">
            <label for="title">Ajouter un Titre</label>
            <input type="text" id="title" name="titre" required>
        </div>
    <div class="input-group">
        <label for="studio">Studio de développement</label>
        <input type="text" id="studio" name="studio">     
    </div>
    <div class="input-group">
            <label for="support">Consoles de jeux</label>
            <input type="text" id="support" name="support">
        </div>
    <div class="input-group">
        <label for="priority">Priorité de développement</label>
        <input type="number" id="priority" name="priorite_developpement">     
    </div>
    <div class="input-group">
            <label for="motor">Moteur du jeu</label>
            <input type="text" id="motor" name="moteur">
        </div>
    <div class="input-group">
        <label for="creation">Date de création</label>
        <input type="date" id="creation" name="date_creation">     
    </div>
    <div class="input-group">
            <label for="update">Date dernière mise à jour</label>
            <input type="date" id="update" name="date_maj">
        </div>
    <div class="input-group">
        <label for="release">Date de sortie</label>
        <input type="date" id="release" name="date_sortie">     
    </div>
    <div class="input-group">
            <label for="budget">Budget de développement</label>
            <input type="number" id="budget" name="budget">
        </div>
    <div class="input-group">
        <label for="status">Etat du jeu</label>
        <input type="text" id="status" name="statut">     
    </div>
    <div class="input-group">
            <label for="genre">Genre du jeu</label>
            <input type="text" id="genre" name="genre">
        </div>
    <div class="input-group">
        <label for="players">Nombre de joueurs</label>
        <input type="number" id="players" name="nombre_joueurs">     
    </div>
    <div class="input-group">
        <label for="description">A propos du jeu</label>
        <input type="text" id="description" name="descriptif">     
    </div>
    <div class="input-group">
            <label for="creaters">Créateurs du jeu</label>
            <input type="text" id="creaters" name="créateur_du_jeu">     
        </div>
    <div class="input-action">
        <button type="submit" id="buttonAddGames" name="envoi">Ajouter un nouveau jeu</button>
    </div>
    </form>

</body>
</html>