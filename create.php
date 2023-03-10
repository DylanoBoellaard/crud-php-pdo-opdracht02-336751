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

// Zorgt ervoor dat de default values '' wordt als er niets ingevuld is
// Bij de kruiden wordt er ipv een empty string, 'nee' als default value meegegeven als de checkboxes niet aangeklikt zijn
$bodemformaat = (isset($_POST['bodemformaat'])) ? $_POST['bodemformaat'] : '';
$saus = (isset($_POST['saus'])) ? $_POST['saus'] : '';
$pizzatoppings = (isset($_POST['pizzatoppings'])) ? $_POST['pizzatoppings'] : '';
$kruiden1 = (isset($_POST['kruiden1'])) ? $_POST['kruiden1'] : "nee";
$kruiden2 = (isset($_POST['kruiden2'])) ? $_POST['kruiden2'] : "nee";
$kruiden3 = (isset($_POST['kruiden3'])) ? $_POST['kruiden3'] : "nee";
$kruiden4 = (isset($_POST['kruiden4'])) ? $_POST['kruiden4'] : "nee";

// Maak de sql-query gereed om te worden afgevuurd op de mysql-database
$statement = $pdo->prepare($sql);

// De bindValue method bind de $_POST waarde aan de placeholder
$statement->bindValue(':bodemformaat', $bodemformaat, PDO::PARAM_STR);
$statement->bindValue(':saus', $saus, PDO::PARAM_STR);
$statement->bindValue(':pizzatoppings', $pizzatoppings, PDO::PARAM_STR);
$statement->bindValue(':peterselie', $kruiden1, PDO::PARAM_STR);
$statement->bindValue(':oregano', $kruiden2, PDO::PARAM_STR);
$statement->bindValue(':chiliflakes', $kruiden3, PDO::PARAM_STR);
$statement->bindValue(':zwartepeper', $kruiden4, PDO::PARAM_STR);

// Voer de sql-query uit op de database
$statement->execute();

echo "Het opslaan is gelukt";
// Link door naar read.php voor een overzicht van de gegevens in tabel Persoon
header('Refresh:4; url=read.php');