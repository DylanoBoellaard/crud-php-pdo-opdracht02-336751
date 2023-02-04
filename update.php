<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding";
    } else {
        // echo "Interne error";
    }
} catch(PDOException $e) {
    $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Er is op het formulier knopje gedrukt";
    var_dump($_POST);
    try {
        $sql = "UPDATE pizza
                SET Bodemformaat = :Bodemformaat,
                    Saus = :Saus,
                    Pizzatoppings = :Pizzatoppings,
                    Peterselie = :Peterselie
                    Oregano = :Oregano
                    Chiliflakes = :Chiliflakes
                    ZwartePeper = :ZwartePeper

                WHERE Id = :Id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':Id', $_POST['id'], PDO::PARAM_INT);
        $statement->bindValue(':Bodemformaat', $_POST['bodemformaat'], PDO::PARAM_STR);
        $statement->bindValue(':Saus', $_POST['saus'], PDO::PARAM_STR);
        $statement->bindValue(':Pizzatoppings', $_POST['pizzatoppings'], PDO::PARAM_STR);
        $statement->bindValue(':Peterselie', $_POST['kruiden1'], PDO::PARAM_STR);
        $statement->bindValue(':Oregano', $_POST['kruiden2'], PDO::PARAM_STR);
        $statement->bindValue(':Chiliflakes', $_POST['kruiden3'], PDO::PARAM_STR);
        $statement->bindValue(':ZwartePeper', $_POST['kruiden4'], PDO::PARAM_STR);

        $statement->execute();

        header('Refresh:3; url=read.php');
    } catch(PDOException $e) {
        echo 'Het record is niet geupdate, probeer het opnieuw.'; 
        header('Refresh:3; url=read.php');
    }
    exit();
} 

$sql = "SELECT Id
              ,Bodemformaat as BF
              ,Saus as SA
              ,Pizzatoppings as PT
              ,Peterselie as PS
              ,Oregano as OG
              ,Chiliflakes as CF
              ,ZwartePeper as ZP
        FROM Persoon
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

var_dump($result);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Opdracht02 PDO-CRUD</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h3>Wijzig het record</h3>

    <a href="read.php">Pizza bestellijst</a>
    <form action="create.php" method="post">
        <label for="bodemformaat" class="bold">Bodemformaat</label><br>
            <select name="bodemformaat" id="bodemformaat">
                <option value="default">Maak je keuze</option>
                <option value="20 centimeter">20 Centimeter</option>
                <option value="25 centimeter">25 Centimeter</option>
                <option value="30 centimeter">30 Centimeter</option>
                <option value="35 centimeter">35 Centimeter</option>
                <option value="40 centimeter">40 Centimeter</option>
            </select><br>
        <br>
        <label for="saus" class="bold">Saus</label><br>
            <select name="saus" id="saus">
                <option value="default">Maak je keuze</option>
                <option value="tomatensaus">Tomatensaus</option>
                <option value="extraTomatensaus">Extra tomatensaus</option>
                <option value="spicyTomatensaus">Spicy tomatensaus</option>
                <option value="bbqsaus">BBQ saus</option>
                <option value="crémeFraiche">Créme fraiche</option>
            </select><br>
        <br>
        <label for="pizzatoppings" class="bold">Pizzatoppings</label><br>
            <input type="radio" id="vegan" name="pizzatoppings" value="vegan">
                <label for="vegan">Vegan</label><br>
            <input type="radio" id="vegatarisch" name="pizzatoppings" value="vegatarisch">
                <label for="vegatarisch">Vegatarisch</label><br>
            <input type="radio" id="vlees" name="pizzatoppings" value="vlees">
                <label for="vlees">Vlees</label><br>
        <br>
        <label for="kruiden" class="bold">Kruiden</label><br>
            <input type="checkbox" name="kruiden1" id="peterselie" value="ja">
                <label for="peterselie">Peterselie</label><br>
            <input type="checkbox" name="kruiden2" id="oregano" value="ja">
                <label for="oregano">Oregano</label><br>
            <input type="checkbox" name="kruiden3" id="chiliflakes" value="ja">
                <label for="chiliflakes">Chili Flakes</label><br>
            <input type="checkbox" name="kruiden4" id="zwartepeper" value="ja">
                <label for="zwartepeper">Zwarte peper</label><br>
        <br>
        <input type="submit" value="Bestel">
    </form>
</body>
</html>