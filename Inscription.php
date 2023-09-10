<?php 
session_start(); // Pour rester connecter sur toutes les pages
//$bdd = new PDO('mysql:host=localhost:8889;dbname=espace_membres;charset=utf8;', 'root', 'root');
$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');


// envoi des données au moment du clique sur enregistrer
if(isset($_POST['enregistrer'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['email'])){ // Si les champs pseudo et mdp ne sont pas vide, exécuter le code
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Encodage du mdp 
        //$mdp = sha1($_POST['mdp']);
        $email = $_POST['email'];
        $insertUser = $bdd->prepare('INSERT INTO users(pseudo, mdp, email)VALUES(?, ?, ?)'); // Quand nouvelle user inscription, rempli auto la base de données
        $insertUser->execute(array($pseudo, $mdp, $email)); // Quand nouvelle user inscription, rempli auto la base de données

         //Pour récupérer les données des utilisateurs et créer leur session
       $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ? AND email = ?');
        $recupUser->execute(array($pseudo, $mdp, $email));
        if($recupUser->rowCount() > 0){
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['email'] = $email;
        $userInfos = $recupUser->fetch();
        $_SESSION['id'] = $userInfos['id'];

        }
      
        echo $_SESSION['id']; // Afficher la session id (a ne pas mettre si projet en ligne, mettre par ex : echo "Inscription réussie)
    }
    else{
        echo "Veuillez compléter tous les champs..."; //Si les champs pseudo et mdp ne sont pas vides, exécuter le code
    } 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="utf-8">
    </head>
<body>

    <form method="POST" action=""> <!-- Si fichier externe remplir action"" -->

        <input type="text" name="pseudo" autocomplete="off"><br> <!-- Pour empêcher les autocomplétion des champs -->
        <input type="password" name="mdp"><br>
        <input type="email" name="email">
        <br>
        <br>

        <input type="submit" name="enregistrer">
    </form>

</body>
</html>