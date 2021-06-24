<?php
    //Gestion des valeurs par défaut
    $fontSize=$_GET['size']??"120";
    $color=isset($_GET['color'])?$_GET['color']:"000";
    $marquee=str_replace("|_","<br/>",$_GET['marquee']);
    $marquee=explode("|",$marquee);
    $transition=$_GET['transition']??500;
    $duration = $_GET['duration']??3000;
    $pause = $_GET['pause']??1000;
    $font=$_GET['font']??'Segoe UI';
    $mode=$_GET['mode']??'fade';
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
    <style>
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
        }
        html, body{
            margin:0;
            padding:0;
            min-height:100vh;
            overflow:hidden
        }
        body{
            padding:0;
            <?php
                if ($mode=='vslide'){
                    echo 'mask-image: linear-gradient(to bottom,#fff0, #ffff 5%, #ffff 95%, #fff0);';
                }
                else if($mode=='hslide'){
                    echo 'mask-image: linear-gradient(to right,rgba(0, 0, 0, 0), rgb(0, 0, 0) 5%, rgb(0, 0, 0) 95%, rgba(0, 0, 0, 0));';
                }
            ?>
        }
        @font-face{
            font-family:'kh';
            src:url('./fonts/Kingdom_Hearts_Font.ttf');
        }
        div{
            height:100%;
            width:100%;
            text-align:center;
            font-size:40vh;
            line-height:48vh;
            color:<?="#".$color?>;
            position:absolute;
            top:0;                       
            opacity:0;       
            transition: <?= $transition/1000?>s;
            font-family:'<?= $font ?>', Tahoma, Geneva, Verdana, sans-serif;
            display:flex;
            align-items:center;
            justify-content:center;
            
        }
        div.now{
            top:0;
            left:0;
            opacity:1;  
        }
        div.previous{       
            opacity:0;
            <?= $mode==='vslide'?'top:-100%;':'' ?>
            <?= $mode==='hslide'?'left:-100%;':'' ?>
        }
        div.next{
            opacity:0;
            <?= $mode==='vslide'?'top:100%;':'' ?>
            <?= $mode==='hslide'?'left:100%;':'' ?>
        }
    </style>
</head>
<body>
    <?php foreach ($marquee as $p):?>
        <div class="next"><p><?= $p ?></p></div>
    <?php endforeach;?>
</body>
<foot>
    <script>
            const DURATION = <?= $duration?>;
            const PAUSE = <?= $pause?>;
            const MARQUEE = document.querySelectorAll('div');
            const TRANSITION = <?= $transition?>;
            

            function fadeIn(index){
                //console.log(`${Date.now()}: ${index} fade in`)
                let next;

                if(index!=MARQUEE.length-1) next = index+1;
                else next = 0;

                MARQUEE[index].className='now';
                MARQUEE[next].className='next';

                setTimeout(fadeOut,DURATION+TRANSITION,index);                
            }

            function fadeOut(index){
                //console.log(`${Date.now()}: ${index} fade out`)
                let next;

                if(index!=MARQUEE.length-1) next = index+1;
                else next = 0;

                MARQUEE[index].className='previous';

                setTimeout(fadeIn,PAUSE+TRANSITION,next);
            }

            setTimeout(fadeIn,PAUSE+100,0);
    </script>
</foot>
</html>