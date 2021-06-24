<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ProgressBar Composer</title>
    </head>
    <body>
        <form>
            <label>Progress Bar</label><br/>
            Color:<input type="color" name="color" value="#0000ff"/>
            Opacity:<input type="range" name="coloropacity" min="0" max="255" value="255" step="1"/><br/>
            <label>Background</label><br/>
            Color:<input type="color" name="bgcolor" value="#0000aa"/>
            Opacity:<input type="range" name="bgopacity" min="0" max="255" value="125" step="1"/><br/>
            Duration in seconds:<input type="number" name="time" min="0" value="60" step="1" placeholder="duration in seconds"/><br/>
            Style:
            <select name="style">
                <option value="glass">glass</option>
                <option value="flat">flat</option>
            </select>
        </form>
        <a href="">Lien à copier pour l'intégration en tant que source web</a>
        <hr/>
        <h2>Prévisualisation</h2>
        <iframe src='./' width="100%" height="80px"></iframe>
        <script>
            function generateLink(){
                const BGCOLOR=document.querySelector("[name=bgcolor]").value.substring(1);
                const BGOPACITY=Number(document.querySelector("[name=bgopacity]").value).toString(16);
                const COLOR=document.querySelector("[name=color]").value.substring(1);
                const COLOROPACITY=Number(document.querySelector("[name=coloropacity]").value).toString(16);
                const TIME=Number(document.querySelector("[name=time]").value);
                const STYLE=document.querySelector("[name=style]").value;
                const SRC=`./?bgcolor=${BGCOLOR}${BGOPACITY}&color=${COLOR}${COLOROPACITY}&t=${TIME}&style=${STYLE}`;
                document.querySelector("iframe").setAttribute("src",SRC);
                document.querySelector("a").setAttribute("href",SRC);
            }
            document.querySelector("form").addEventListener("input",generateLink);
            generateLink();
        </script>   
    </body>
</html>


