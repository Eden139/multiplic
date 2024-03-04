<?php
    $a = $_GET["a"];
    $b = $_GET["b"];
    $i = $_GET["mod_i"];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Modification table</h1>
        <main>
            <form action="traitement.php" method="get">
                <label for="a">Entrez a:</label>
                <input type="text" name="mod_a" />
                <br />
                <label for="b">Entrez b:</label>
                <input type="text" name="mod_b" />
                <br />
                <input type="submit" value="Calculer">

                <?php echo "<input type=\"hidden\" name=\"mod_i\" value=\"$i\"?>"?>
            </form>
        </main>
    </body>
</html>