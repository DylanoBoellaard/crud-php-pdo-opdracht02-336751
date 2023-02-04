<?php
/**
 * We gaan een verbinding maken met de MySQL database
 */
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo 'Er is een verbinding gemaakt met de mysqldatabase';
    } else {
        echo 'Interne servererror, neem contact op met de databasebeheerder';
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

$post = var_dump($_POST);

/**
 * We gaan een sql-query maken voor het wegschrijven van de formuliergegevens in de tabel Persoon
 */
// Schrijf de sql-insertquery
$sql = "INSERT INTO pizza (Id
                            ,Bodemformaat
                            ,Saus
                            ,Pizzatoppings
                            ,Peterselie
                            ,Oregano
                            ,Chiliflakes
                            ,ZwartePeper)
        VALUES              (NULL
                            ,:bodemformaat
                            ,:saus
                            ,:pizzatoppings
                            ,:peterselie
                            ,:oregano
                            ,:chiliflakes
                            ,:zwartepeper);";

// Maak de sql-query gereed om te worden afgevuurd op de mysql-database
$statement = $pdo->prepare($sql);

// De bindValue method bind de $_POST waarde aan de placeholder
$statement->bindValue(':bodemformaat', $_POST['bodemformaat'], PDO::PARAM_STR);
$statement->bindValue(':saus', $_POST['saus'], PDO::PARAM_STR);
$statement->bindValue(':pizzatoppings', $_POST['pizzatoppings'], PDO::PARAM_STR);
$statement->bindValue(':peterselie', $_POST['kruiden1'], PDO::PARAM_STR);
$statement->bindValue(':oregano', $_POST['kruiden2'], PDO::PARAM_STR);
$statement->bindValue(':chiliflakes', $_POST['kruiden3'], PDO::PARAM_STR);
$statement->bindValue(':zwartepeper', $_POST['kruiden4'], PDO::PARAM_STR);

// Voer de sql-query uit op de database
$statement->execute();

echo "Het opslaan is gelukt";
// Link door naar read.php voor een overzicht van de gegevens in tabel Persoon
header('Refresh:4; url=read.php');