<?php
$defaultText="Enter one sentence per line, longer sentences will automatically split on two lines
You need at least 3 sentences for sliding transitions
Fade transition requires only 2 sentences
You can force a sentence break point
_by starting the second line with an uderscore
Take care not to leave an empty line at the end
(Unless you want a longer pause before it loops)";
?>

<style>
    form{
        display:flex;
        width:100%;
        height:100%;
        justify-content:space-around;
        align-items:center;
        flex-direction:column;
        width:90%;
        max-width:1000px;
        margin:auto;
    }
    input, select, textarea{
        width:100%;
    }
    textarea{
        height:20vh;
    }
    p{
        display:flex;
        align-items:center;
    }
</style>

<form action="./">
    <h1>Marquee composer</h1>
    <label for="mode">Mode</label>
    <select id="mode" name="mode">
        <option value="fade">Fade</option>
        <option value="hslide">Horizontal Slide</option>
        <option value="vslide">Vertical Slide</option>
    </select>
    <label for="font">Font family</label>
    <select id="font" name="font">
        <option value="roboto">Roboto</option>
        <option value="kh">Kingdom hearts</option>
    </select>
    <label for="color">Color</label>
    <input type="color" id="color" name="color" value="#ccccff" placeholder="color hex code"/>
    <label for="duration">Duration (in milliseconds) (minimum 100ms to avoid browser lag induced transition fails)</label>
    <!-- min duration at 100 to avoid lag induced instant disapearing-->
    <input type="number" id="duration" name="duration" min="100" step="100" value="3000" placeholder="duration in milliseconds"/>
    <label for="transition">Transition (in milliseconds)</label>
    <input type="number" id="transition" name="transition" min="0" step="100" value="1500" placeholder="transition time in milliseconds"/>
    <label for="pause">Pause between sentences (in milliseconds)</label>
    <input type="number" id="pause" name="pause" min="0" step="100" value="500" placeholder="pause time in milliseconds"/>
    <label for="marquee">Sentences (one per line)</label>
    <textarea id="marquee" name="marquee" placeholder="One sentence per line"><?=$defaultText?></textarea>

    <div style="width:100%;display:flex;align-items:center;justify-content:space-around">
        <label for="widgetWidth">Widget size :</label>
        <input type="number" id="widgetWidth" min="0" step="1" value="1200" style="width:100px"> 
        x 
        <input type="number" id="widgetHeight" min="0" step="1" value="100" style="width:100px">
        <label for="previewBackground">Preview Background :</label>
        <input type="color" id="previewBackground" name="previewBackground" value="#000055" style="width:100px;"/>
        <input type="submit" value="Preview" style="width:100px"/>
    </div>
    <a id="link" readonly href="./">LINK TO WIDGET</a>
    <iframe src="./" width="0" height="0"></iframe>
</form>

<script>
    var link="./";
    
    function preview(){
        link="./";
        link+="?mode="+document.querySelector('#mode').value;
        link+="&font="+document.querySelector('#font').value;
        link+="&color="+document.querySelector('#color').value.substring(1);
        link+="&duration="+document.querySelector('#duration').value;
        link+="&transition="+document.querySelector('#transition').value;
        link+="&pause="+document.querySelector('#pause').value;
        link+="&marquee="+document.querySelector('#marquee').value.replace(/\n/g, "|");

        document.querySelector('#link').href=link;
        document.querySelector('iframe').src=link;

        document.querySelector("iframe").setAttribute("width",document.querySelector("#widgetWidth").value);
        document.querySelector("iframe").setAttribute("height",document.querySelector("#widgetHeight").value);
        document.querySelector("iframe").style.background=document.querySelector("#previewBackground").value;
    }

    document.querySelector("form").addEventListener("submit",(event)=>{
        event.preventDefault();
        preview();        
    })
        
    preview();
</script>