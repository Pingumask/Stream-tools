<?php
//Sécurisation des parametres GET via un passage par référence dans la boucle
foreach($_GET as &$get){
    $get=htmlspecialchars($get);
}
//Attribution de valeurs par défaut via le "null coalescing operator"
$bg=$_GET['bgcolor'] ?? '00000000';
$color=$_GET['color'] ?? '0000ffff';
$time=$_GET['t'] ?? 60;
$style=$_GET['style'] ?? 'glass';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Loadbar</title>
        <link rel="stylesheet" href="./progressBar.css">
        <style>
            :root{
                --bgColor:#<?= $bg ?>;
                --color:#<?= $color ?>;
                --time:<?= $time ?>s;
            }
        </style>
    </head>
    <body>
        <div id="progressbar" class="<?= $style?>"></div>
    </body>
</html>