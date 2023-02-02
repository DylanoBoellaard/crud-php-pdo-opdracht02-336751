<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht02 PDO-CRUD</title>
</head>
<body>
    <h2>Maak je eigen pizza</h2>

    <form action="create.php" method="post">
        <label for="bodemformaat">Bodemformaat</label><br>
            <select name="bodemformaat" id="bodemformaat">
                <option value="default">Maak je keuze</option>
                <option value="20 centimeter">20 Centimeter</option>
                <option value="25 centimeter">25 Centimeter</option>
                <option value="30 centimeter">30 Centimeter</option>
                <option value="35 centimeter">35 Centimeter</option>
                <option value="40 centimeter">40 Centimeter</option>
            </select><br>
            <br>
        <label for="saus">Saus</label><br>
        <select name="saus" id="saus">
                <option value="default">Maak je keuze</option>
                <option value="tomatensaus">Tomatensaus</option>
                <option value="extraTomatensaus">Extra tomatensaus</option>
                <option value="spicyTomatensaus">Spicy tomatensaus</option>
                <option value="bbqSaus">BBQ saus</option>
                <option value="crémeFraiche">Créme fraiche</option>
            </select><br>
            <br>
    </form>
</body>
</html>