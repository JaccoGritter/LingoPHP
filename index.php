<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <title>Lingo</title>


</head>

<body>

<p>Raad het woord:</p> 

<input type="text" name="woord" maxlength="5" id="woord">
<button id="raadButton">Raad!</button>

<div id="output"></div>


<script>

document.getElementById("raadButton").addEventListener("click", checkWoord);

function checkWoord() {
    var geraden = document.getElementById("woord").value;
    document.getElementById("woord").value = "";
    //document.getElementById("test").innerHTML = geraden;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                updateScreen(this.responseText);
            }
        };
        xmlhttp.open("GET", "raadwoord.php?q=" + geraden, true);
        xmlhttp.send();
    
}

function updateScreen(feedback) {
    //document.getElementById("output").innerHTML = feedback;
    var node = document.createElement("P");                 
    var textnode = document.createTextNode(feedback);        
    node.appendChild(textnode);        
    document.getElementById("output").appendChild(node); 
}

</script>

</body>

</html>