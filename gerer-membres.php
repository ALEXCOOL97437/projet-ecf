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

    // Préparer une requête SQL pour récupérer les informations du membre correspondant à l'identifiant
    $recupMembre = $bdd->prepare('SELECT * FROM producteurs WHERE id = ?');
    $recupMembre->execute(array($getid));

    // Vérifier si le membre existe dans la base de données
    if ($recupMembre->rowCount() > 0) {
        // Récupérer les informations du membre
        $membreInfos = $recupMembre->fetch();
        $pseudo = $membreInfos['pseudo'];
        $mdp_exist = $membreInfos['mdp'];  //Récupérer le mot de passe existant depuis la base de données

        // Vérifier si le formulaire a été soumis
        if (isset($_POST['valider'])) {
            // Récupérer les données saisies par l'admin et les sécuriser
            $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
            $mdp_saisie = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

            //Si l'admin saisie un nouveau mdp alors encodage du mdp sinon reprend la valeur du mdp d'origine
            $mdp_final = !empty($mdp_saisie) ? ($mdp_saisie) : $mdp_exist;


            // Préparer une requête SQL pour mettre à jour le membre dans la base de données
            $updateMembre = $bdd->prepare('UPDATE producteurs SET pseudo = ?, mdp = ? WHERE id = ?');
            $updateMembre->execute(array($pseudo_saisi, $mdp_saisie, $getid));

            header('Location: membres.php');
        }
    } else {
        echo "Aucun membre trouvé";
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
    <title>Modifier les membres</title>
    <link rel="stylesheet" href="connexion-gamesoft.css">
</head>
<header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </nav>
    </header>
<body>
    <form method="POST" action="">
        <input type="text" name="pseudo" value="<?php echo $pseudo; ?>">
        <br>
        <textarea name="mdp"><?php echo $mdp_exist; ?></textarea>
        <br>
        <input type="submit" name="valider">
    </form>
</body>
</html>
