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

    // Récupère les informations de la BDD pour les afficher dans le tableau
    $sql = "SELECT * FROM `subscription`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if (count($_POST) > 0) {
        $sql = "UPDATE subscription SET status = 'Désabonné.e' WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $status =  `Désabonné.e`;
        $stmt->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
        $stmt->execute();
        echo ("aaa");
    }

    // Recharge le SQL pour synchroniser correctement le changement d'état
    $sql = "SELECT * FROM `subscription`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    <h2>Formulaire de désinscription</h2>
    <!-- Action vide => renvoi ver sla page elle-même -->
    <!-- Method = POST ou GET (par défaut) -->
    <form action="" method="POST">
        <div>
            <label for="email">Adresse mail <span style="color: red">*</span></label>
            <input id="email" type="email" name="email" placeholder="adresse@mail.com" required>
        </div>
        <div>
            <button type="submit">Se désabonner</button>
        </div>
    </form>

    <script src="clipboard.js" defer></script>
</body>
</html>