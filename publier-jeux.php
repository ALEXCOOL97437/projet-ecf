<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
if (!$_SESSION['mdp']) {
    header('Location: connexion-gamesoft.php');
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['envoi'])) {
    $title = $_POST['title'];
    $studio = $_POST['studio'];
    $support = $_POST['support'];
    $priority = $_POST['priority'];
    $motor = $_POST['motor'];
    $creation = $_POST['creation'];
    $update = $_POST['update'];
    $release = $_POST['release'];
    $budget = $_POST['budget'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $players = $_POST['players'];
    $description = $_POST['description'];
        
        // Préparer une requête SQL pour insérer un nouveau jeu dans la base de données
        $inserGames = $bdd->prepare('INSERT INTO games(titre, studio, support, priorite_developpement,
        moteur, date_creation, date_maj, date_sortie, budget, statut, genre, nombre_joueurs, descriptif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        // Exécuter la requête SQL en passant les valeurs des champs
        $inserGames->execute(array($title, $studio, $support, $priority, $motor, $creation, $update,
        $release, $budget, $status, $type, $players, $description));

        // Afficher un message de succès si l'insertion a réussi
        echo '<script>alert("Bonjour, nouveau jeu ajouter"); window.location.href = "espace-administrateur.php";</script>';
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
            <input type="text" id="title" name="title" required>
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
        <input type="number" id="priority" name="priority">     
    </div>
    <div class="input-group">
            <label for="motor">Moteur du jeu</label>
            <input type="text" id="motor" name="motor">
        </div>
    <div class="input-group">
        <label for="creation">Date de création</label>
        <input type="date" id="creation" name="creation">     
    </div>
    <div class="input-group">
            <label for="update">Date dernière mise à jour</label>
            <input type="date" id="update" name="update">
        </div>
    <div class="input-group">
        <label for="release">Date de sortie</label>
        <input type="date" id="release" name="release">     
    </div>
    <div class="input-group">
            <label for="budget">Budget de développement</label>
            <input type="number" id="budget" name="budget">
        </div>
    <div class="input-group">
        <label for="status">Etat du jeu</label>
        <input type="text" id="status" name="status">     
    </div>
    <div class="input-group">
            <label for="type">Genre du jeu</label>
            <input type="text" id="type" name="type">
        </div>
    <div class="input-group">
        <label for="players">Nombre de joueurs</label>
        <input type="number" id="players" name="players">     
    </div>
    <div class="input-group">
        <label for="description">A propos du jeu</label>
        <input type="text" id="description" name="description">     
    </div>
    <div class="input-action">
        <button type="submit" id="buttonAddGames" name="envoi">Ajouter un nouveau jeu</button>
    </div>
    </form>

</body>
</html>