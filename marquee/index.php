<?php
    //Sécurisation des parametres GET
    foreach($_GET as &$get){
        $get=htmlspecialchars($get);
    }
    //Gestion des valeurs par défaut
    $fontSize=$_GET['size'] ?? "120";
    $color=$_GET['color'] ?? "000";
    $marquee=str_replace("|_","<br/>",$_GET['marquee'] ?? '');
    $marquee=explode("|",$marquee);
    $transition=$_GET['transition'] ?? 500;
    $duration = $_GET['duration'] ?? 3000;
    $pause = $_GET['pause'] ?? 1000;
    $font=$_GET['font'] ?? 'Segoe UI';
    $mode=$_GET['mode'] ?? 'fade';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
        <title>Marquee</title>
        <link rel="stylesheet" href="./marquee.css"/>
        <style>
        :root{
            --color:#<?= $color?>;
            --transition:<?= $transition/1000?>s;
            --font:'<?= $font ?>';
        }
        </style>
        <script>
            const DURATION = <?= $duration?>;
            const PAUSE = <?= $pause?>;
            const TRANSITION = <?= $transition?>;          
        </script>
        <script src="./marquee.js" defer></script>
    </head>
    <body class="<?= $mode?>">
        <?php foreach ($marquee as $p):?>
            <div class="next"><p><?= $p ?></p></div>
        <?php endforeach;?>
    </body>
</html>