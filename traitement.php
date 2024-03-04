<?php
    if ($_GET["a"] != '' && $_GET["b"] != '') {
        $a = $_GET["a"];
        $b = $_GET["b"];
        session_start();
        $_SESSION["a"] = $a;
        $_SESSION["b"] = $b;       
    }
    else {
        session_start();
        $a = $_SESSION["a"];
        $b = $_SESSION["b"];
    }

    
    $del_i = $_GET['del_i'];
    $mod_i = $_GET['mod_i'];

    $mod_a = $_GET['mod_a'];
    $mod_b = $_GET['mod_b'];
    
    if ($del_i != '') {
        session_start();
                    
        $Ta = $_SESSION['Ta'][0];
        $Tb = $_SESSION['Tb'][0];

        array_splice($Ta, $del_i, 1);
        array_splice($Tb, $del_i, 1);

        $b = $_SESSION['b'];
        $b = $b - 1;
        
        $_SESSION['b'] = $b;
        
        $_SESSION['Ta'] = array($Ta);
        $_SESSION['Tb'] = array($Tb);

    }
    else if ($mod_i != '') {
        session_start();
                    
        $Ta = $_SESSION['Ta'][0];
        $Tb = $_SESSION['Tb'][0];
        
        $Ta[$mod_i] = $mod_a;
        $Tb[$mod_i] = $mod_b;

        $_SESSION['Ta'] = array($Ta);
        $_SESSION['Tb'] = array($Tb);
    }
    else {
        for($i = 0; $i <= $b; $i++){
            $Ta[$i] = $a;
            $Tb[$i] = $i;
        }
        session_start();

        $_SESSION['Ta'] = array($Ta);
        $_SESSION['Tb'] = array($Tb);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Table <?php echo "$a";?></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Table de multiplication <?php echo "$a";?></h1>
        <table>
            <thead>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>A * B</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for( $i = 0; $i <= $b; $i++) {
                        $r = $Ta[$i] * $Tb[$i];
                        $color = $i % 2 == 0 ? "#0f05" : "#00f5";
                        echo  "<tr style=\"background: $color\">
                                <th>$Ta[$i]</th>
                                <th>$Tb[$i]</th>
                                <th>$r</th>
                                <th class=\"options\">
                                    <button ><a href=\"http://php.mg/modifier.php?mod_i=$i&a=$Ta[$i]&b=$Tb[$i]\">Modifier</a></button>
                                    <a href=\"http://php.mg/traitement.php?del_i=$i\"><img src=\"delete.png\"></a>
                                </th>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>

    </body>
</html>