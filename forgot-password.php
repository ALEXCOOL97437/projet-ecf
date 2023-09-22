<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="connexion-gamesoft.css">
    <title>Forgot password</title>
    <meta charset="utf-8">
  </head>
  <body>
  <header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="gamesoft-page-accueil.php">Accueil</a></li>
            <li><a href="tous-les-jeux.html">JEUX</a></li>
            </ul>
            <div class="connect"><a href="connexion-gamesoft.php"><img src="IMAGES/LOGO SE CONNECTER.png" alt=""></a></div>
        </nav>
    </header>  

    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" id="email" placeholder="Enter Email" name="email" required>
        <button type="submit">Send me a random password</button>
      </div>
    </form>
  </body>
</html>

<?php

if (isset($_POST['email'])) {
  //$password = uniqid();// Générer un mot de passe aléatoire sécurisé
  //echo $password;
    
   $length = 6; // Longueur du mot de passe
   $randomPassword = bin2hex(random_bytes($length));
   echo $randomPassword;

    // Hacher le mot de passe
    //$hashedPassword = sha1($randomPassword);
    $hashedPassword = password_hash($randomPassword, PASSWORD_DEFAULT);

    // Préparer le message de l'e-mail
    $message = "Bonjour, voici votre nouveau mot de passe : $randomPassword";
    $headers = 'Content-type: text/plain; charset="utf-8"';

    // Envoyer l'e-mail
    if (mail($_POST['email'], 'Mot de passe oublié', $message, $headers)) {
        // Mettre à jour le mot de passe dans la base de données
        $sql = 'UPDATE users SET mdp = ? WHERE email = ?';
        $stmt = $bdd->prepare($sql);
        if ($stmt->execute([$hashedPassword, $_POST['email']])){
            echo "Mail envoyé et mot de passe mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du mot de passe dans la base de données.";
        }
    } else {
        echo "Une erreur est survenue lors de l'envoi de l'e-mail.";
    }
}
?>
