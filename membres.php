<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

// Verification si la session contient une valeur pour "mdp"
if(!$_SESSION['mdp']){
    // Si pas de "mdp", rediriger vers la page connexion
    header('Location: connexion-gamesoft.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Afficher les membres</title>
    <meta charset="utf-8">
</head>
<body>

<!-- Afficher tous les membres -->
<?php
   $recupUsers = $bdd->query('SELECT * FROM users');
   while($user = $recupUsers->fetch()){ // Boucle pour récupérer les membres de la table
    ?>
    <p><?php echo $user['pseudo']; ?> <a href="bannir.php?id=<?= $user['id']; ?>" style="color:red;">Bannir le membre</a></p> <!-- ce code affiche le pseudo de l'utilisateur dans un paragraphe HTML et fournit également un lien hypertexte vers un script de bannissement en utilisant l'ID de l'utilisateur comme paramètre dans l'URL. -->
    <?php
   }
?>
</body>
</html>