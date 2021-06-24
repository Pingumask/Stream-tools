<?php
foreach($_GET as &$get){
    $get=htmlspecialchars($get);
}
$bg=isset($_GET['bgcolor'])?'#'.$_GET['bgcolor'] : 'none';
$color=$_GET['color'] ?? '0000ff';
$time=$_GET['t'] ?? 60;
$flat=(isset($_GET['style']) && $_GET['style']=='flat');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadbar</title>
    <style>
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
        }
        body{
            min-height:100vh;
        }
        #loadbar{
            height:100vh;
            width:100%;
            background-color:<?= $bg ?>;
            position:relative;
        }
        #progressbar{
            background-color:#<?= $color ?>;
            height:100%;
            animation-timing-function: linear;
            animation-duration: <?= $time ?>s;
            animation-name: load;
        }
        #reflet{
            position:absolute;
            top:0;
            width:100%;
            height:100%;
            background: linear-gradient(180deg, rgba(255,255,255,0) 5%, rgba(255,255,255,0.5) 15%, rgba(255,255,255,0) 35%, rgba(0,0,0,0) 60%, rgba(0,0,0,0.7) 100%);
            <?php if($flat) echo 'display:none;'?>
        }
        @keyframes load {
            0% { width:0; }
            100% { width: 100%; }
        }
    </style>
</head>
<body>
    <div id="loadbar"><div id="progressbar"></div><div id="reflet"></div></div>
</body>
</html>