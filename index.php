<?php
    // Etablit de la connexion avec la BDD
    $host = 'localhost';
    $db   = 'btsphpnewsletter2324';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO('mysql:host='.$host.'; port=3306; dbname='.$db,$user,$pass);

    // Enregistre en BDD le formulaire
    if(count($_POST) > 0) {
        // le formulaire est soumis
        // echo "soumis";

        // insert des données
        $sql = "INSERT INTO `subscription` (`email`, `nom`, `prenom`) VALUES (:email, :nom, :prenom)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->execute();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL PHP - Newsletter</title>
    <style>
        div {padding: 10px 0;}
        td, th {padding: 5px 10px;}
    </style>
</head>
<body>
    <h1>Newsletter</h1>
    <h2>ESPL - BTS SIO 1 SLAM - 2023/2024</h2>
    <br>
    <h2>Formulaire d'inscription</h2>
    <!-- Action vide => renvoi ver sla page elle-même -->
    <!-- Method = POST ou GET (par défaut) -->
    <form action="" method="POST">
        <div>
            <label for="email">Adresse mail <span style="color: red">*</span></label>
            <input id="email" type="email" name="email" placeholder="adresse@mail.com" required>
        </div>
        <div>
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" placeholder="Nom">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input id="prenom" type="text" name="prenom" placeholder="Prénom">
        </div>
        <div>
            <button type="submit">S'abonner</button>
        </div>
    </form>

    <a href="admin.php" target="_blank">Admin</a>
    <br>
    <a href="unsubscribe.php" target="_blank">Se désabonner</a>

    <script src="clipboard.js" defer></script>
</body>
</html>