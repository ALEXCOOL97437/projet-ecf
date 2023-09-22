<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

// Pour administrateur
if(isset($_POST['connexion'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
      $pseudo_par_defaut = "admin";
      $mdp_par_defaut = "admin123";

      $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
      $mdp_saisi = htmlspecialchars($_POST['mdp']);

      if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
          $_SESSION['mdp'] = $mdp_saisi;
          header('Location: espace-administrateur.php');
      }else{
        echo '<script>alert("Mot de passe incorrect")</script>';
      }
    }else{
        echo '<script>alert("Identifiant incorrect")</script>'; 
    }
}

//Pour producteurs, manageurs et utilisateurs
if(isset($_POST['connexion'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        //$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $mdp_saisi = $_POST['mdp'];
        //$mdp = sha1($_POST['mdp']);

    
        //Recherche du producteur dans la base de données
        $recupUserProducteur = $bdd->prepare('SELECT * FROM producteurs WHERE pseudo = ?');
        $recupUserProducteur->execute(array($pseudo));

        //Recherche de l'utilisateur dans la base de données
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');//('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo));//, $mdp));

        //Recherche du manager dans la base de données
        $recupManager = $bdd->prepare('SELECT * FROM manager WHERE pseudo = ?');
        $recupManager->execute(array($pseudo));
        
        
        if($recupUserProducteur->rowCount() > 0){
            $userInfos = $recupUserProducteur->fetch();
            $mdp_stocke = $userInfos['mdp']; //Récupérez le hachage stocké

                if(password_verify($mdp_saisi, $mdp_stocke)){
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mdp'] = $mdp_saisi;
                $_SESSION['id'] = $userInfos['id'];
                header('Location: espace-producteur.php');

            }else { 
                echo '<script>alert("Mot de passe incorrect")</script>'; // Pour le producteur
            }
        }elseif ($recupUser->rowCount() > 0) {
            $userInfos = $recupUser->fetch();
            $mdp_stocke = $userInfos['mdp']; //Récupérez le hachage stocké

                if(password_verify($mdp_saisi, $mdp_stocke)){
                 $_SESSION['pseudo'] = $pseudo;
                //$_SESSION['mdp'] = $mdp;
                //$_SESSION['id'] = $recupUser->fetch() ['id'];
                $_SESSION['id'] = $userInfos['id'];
                header('Location: gamesoft-page-accueil.php');

            }else { 
                echo '<script>alert("Mot de passe incorrect")</script>'; // Pour l'utilisateur
        }
    }elseif ($recupManager->rowCount() > 0) {
        $userInfos = $recupManager->fetch();
        $mdp_stocke = $userInfos['mdp'];

                if(password_verify($mdp_saisi, $mdp_stocke)){
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mdp'] = $mdp_saisi;
                $_SESSION['id'] = $userInfos['id'];
                header('Location: espace-manager.php');
                }else {
                    echo '<srcipt>alert("Mot de passe incorrect")</script>'; // Pour le manager
                }
    }
    }else{
        echo '<script>alert("Identifiant incorrect")</script>';
    }

}
    


//Pour utilisateur
//if(isset($_POST['connexion'])){
  //  if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
    //    $pseudo = htmlspecialchars($_POST['pseudo']);
        //$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
      //  $mdp_saisi = $_POST['mdp'];
        //$mdp = sha1($_POST['mdp']);

    
        //Recherche de l'utilisateur dans la base de données
        //$recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');//('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        //$recupUser->execute(array($pseudo));//, $mdp));
        
        //if($recupUser->rowCount() > 0){
          //  $userInfos = $recupUser->fetch();
            //$mdp_stocke = $userInfos['mdp']; //Récupérez le hachage stocké

              //  if(password_verify($mdp_saisi, $mdp_stocke)){
            //$_SESSION['pseudo'] = $pseudo;
            //$_SESSION['mdp'] = $mdp;
            //$_SESSION['id'] = $recupUser->fetch() ['id'];
            //$_SESSION['id'] = $userInfos['id'];
            //header('Location: gamesoft-page-accueil.php');

        //}else { 
          //  echo '<script>alert("Mot de passe incorrect")</script>';
        //}
    //}else{
      //  echo '<script>alert("Identifiant incorrect")</script>';
    //}
    
    //}
          
//}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion-gamesoft.css">
<head>
<body>
<header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="gamesoft-page-accueil.php">Accueil</a></li>
            <li><a href="tous-les-jeux.php">JEUX</a></li>
            </ul>
            <div class="connect"><a href=""><img src="IMAGES/LOGO SE CONNECTER.png" alt=""></a></div>
        </nav>
    </header>
<div class="form-container">

    <form method="POST" action=""> <!-- Si fichier externe remplir action"" -->

        <div class="input-group">
            <label for="identifiant">Votre identifiant ou PSEUDO</label>
            <input type="text" id="identifiant" name="pseudo" autocomplete="off" required> <!-- Pour empêcher les autocomplétion des champs -->
        </div>
        <br>
        <div class="input-group">
            <label for="password">Votre mot de passe</label>
            <input type="password" id="password" name="mdp" autocomplete="off" required>
        </div>
        <br>
        <div class="input-action">
            <button type="submit" id="buttonConnexion" name="connexion">Se connecter</button>
        <br><br>
        <span class="forgot-password"><a href="forgot-password.php">Mot de passe oublié ?</a></span>
      </div>
     </form>
</div>

</body>
</html>
