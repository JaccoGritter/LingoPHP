window.onload = function() {
    document.getElementById("raadButton").addEventListener("click", raadWoord);
    buildGrid(5);
    startSpel();
}

function buildGrid(n) {
    for(let i = 0; i < n; i++) {
        let row = document.createElement("div");
        for(let j = 0; j < n; j++) {
            let cell = document.createElement("div");
            row.appendChild(cell);
        }
        document.getElementById("output").appendChild(row);
    }
}

function startSpel() {               // sets a random word, turns = 0
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "bedenkwoord.php", true);
        xmlhttp.send();
}

function raadWoord() {
    var geraden = document.getElementById("woord").value;
    document.getElementById("woord").value = "";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                //console.log(this.responseText); 
                let myObj = JSON.parse(this.responseText);
                updateScreen(myObj.feedback, geraden, myObj.turns, myObj.gameOver, myObj.won);
            }
        };
        xmlhttp.open("GET", "raadwoord.php?q=" + geraden, true);
        xmlhttp.send();
    
}

function updateScreen(feedback, geraden, turns, gameOver, won) {
    let ballrow = document.getElementById("output").childNodes;
    let column = ballrow[turns-1].childNodes;

    for (let i = 0; i < 5; i++) {
        let status = feedback.charAt(i);
        column[i].innerText = geraden.charAt(i);
        if (status == "1" ) column[i].style.backgroundColor = "#ffb50a";
        if (status == "2" ) column[i].style.backgroundColor = "#bdf22e";
    }

    if (won) {
        document.getElementById("resultText").innerHTML = "<h3>Geraden! Gefeliciteerd!</h3>";
        
    }
    if (gameOver & won == false) {
        //console.log(getWoord());
        document.getElementById("resultText").innerHTML = "<h3> Game Over... </h3>";
    }
}
