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

    if (isset($_POST["statusToggle"])) {
        $id = $_POST["statusToggle"];
        foreach ($results as $row)  {
            if ($row["id"] == $id)  {
                $updatedStatus = ($row["status"] == "Désabonné.e") ? "Abonné.e" : "Désabonné.e";
                $sql = "UPDATE subscription SET status = :status WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':status', $updatedStatus, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
                break;
            }
        }
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
    <h2>Abonnés</h2>
    <!-- Tableau des adresses mails inscrites -->

    <form action="">
        <div>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" placeholder="password">
        </div>
        <div>
            <button type="submit">Entrer</button>
        </div>
    </form>

    <?php
        if(
            isset($_GET["password"]) &&
            !is_null($_GET["password"]) &&
            !empty($_GET["password"])
        ) :
        if ($_GET["password"] == "beepboop") :
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Adresse mail</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- tableau ici -->
            <?php foreach ($results as $row):
                $button = ($row["status"] == "Désabonné.e") ? "S'abonner" : "Se désabonner";
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td class="email" data-status="<?php echo $row['status']; ?>"><?php echo $row['email']; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['prenom']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="statusToggle" value="<?php echo $row['id']; ?>">
                        <button type="submit" name ="unsubscribe-btn"><?php echo($button)?></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <button onclick="clipboardExport()">Copier dans le presse papier</button>
    </div>

    <?php 
        endif;
        endif; 
    ?>

    <script src="clipboard.js" defer></script>

</body>
</html>