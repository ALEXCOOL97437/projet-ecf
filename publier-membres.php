<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
if (!$_SESSION['mdp']) {
    header('Location: connexion-gamesoft.php');
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['envoi'])) {
    // Vérifier que les champs "pseudo" et "mdp" ne sont pas vides
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        // Récupérer les données du formulaire et les sécuriser
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        
        // Préparer une requête SQL pour insérer un nouveau membre dans la base de données
        $inserMembre = $bdd->prepare('INSERT INTO users(pseudo, mdp) VALUES (?, ?)');
        
        // Exécuter la requête SQL en passant les valeurs des champs "pseudo" et "mdp"
        $inserMembre->execute(array($pseudo, $mdp));

        // Afficher un message de succès si l'insertion a réussi
        echo '<script>alert("Bonjour, nouveau membre ajouter"); window.location.href = "publier-membres.php";</script>';
    } else {
        // Afficher un message d'erreur si les champs sont vides
        echo "Veuillez compléter tous les champs...";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Publier un membre</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
    <div class="input-group">
            <label for="identifiant">Ajouter un identifiant ou PSEUDO</label>
            <input type="text" id="identifiant" name="pseudo" autocomplete="off" required>
        </div>
    <div class="input-group">
        <label for="password">Votre mot de passe</label>
        <input type="password" id="password" name="mdp" required minlength="6">     
    </div>
    <div class="input-action">
        <button type="submit" id="buttonInscription" name="envoi">Inscrire nouveau membre</button>
    </div>
    </form>

</body>
</html>