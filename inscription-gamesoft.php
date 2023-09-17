<?php 
session_start(); // Pour rester connecter sur toutes les pages
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');


// envoi des données au moment du clique sur enregistrer
if(isset($_POST['registrer'])){
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
        //$_SESSION['id'] = $userInfos['pseudo'];
        
        }//echo '<script>alert("Bonjour, merci de vous êtes inscrit")</script>';
        //header('Location: gamesoft-page-accueil.html');
        echo '<script>alert("Bonjour, merci de vous être inscrit"); window.location.href = "gamesoft-page-accueil.php";</script>';

      
        //echo $_SESSION['id']; // Afficher la session id (a ne pas mettre si projet en ligne, mettre par ex : echo "Inscription réussie)
    }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link rel="stylesheet" href="inscription-gamesoft.css">
    </head>
<body>
<header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="gamesoft-page-accueil.php">Accueil</a></li>
            <li><a href="tous-les-jeux.php">JEUX</a></li>
            </ul>
            <div class="connect"><a href="connexion-gamesoft.php"><img src="IMAGES/LOGO SE CONNECTER.png" alt=""></a></div>
        </nav>
    </header>

    <form method="POST" action=""> <!-- Si fichier externe remplir action"" -->

        <div class="input-group">
            <label for="identifiant">Votre identifiant ou PSEUDO</label>
            <input type="text" id="identifiant" name="pseudo" autocomplete="off" required> <!-- Pour empêcher les autocomplétion des champs -->
        </div>
        <div id="errorIdentifiant" class="error-message"></div>
        <br> 
        <div class="input-group">
            <label for="password">Votre mot de passe</label>
            <input type="password" id="password" name="mdp" required minlength="6">
        </div>
        <div id="errorPassword" class="error-message"></div>
        <br>
        <div class="input-group">
            <label for="password">Confirmation mot de passe</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required minlength="6">
        </div>
        <div id="errorConfirmPassword" class="error-message"></div>
        <br>
        <div class="input-group">
            <label for="email">Votre adresse E-mail</label>
            <input type="email" id="email" name="email" required placeholder="mail@domain.com">
        </div>
        <div id="errorEmail" class="error-message"></div>
        <br>
        <div class="input-group">
            <label for="confirmEmail">Confirmation E-mail</label>
            <input type="email" id="confirmEmail" name="confirmEmail" required>
        </div>
        <div id="errorConfirmEmail" class="error-message"></div>
        <br>
        <div class="input-action">
            <button type="submit" id="buttonInscription" name="registrer">Je m'inscris</button>
        </div>
        <br>
        <!--<input type="submit" name="enregistrer"> -->
    </form>
    <script src="inscription-gamesoft.js"></script>
</body>
</html>