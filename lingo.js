window.onload = function() {
    init();
}

let turns;

function init() {
    document.getElementById("raadButton").addEventListener("click", checkWoord);
    buildGrid(5);
    turns = 0;    // keep track of number of turns
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

function checkWoord() {
    if (turns>5) return;                  // can't play on when game has ended
    var geraden = document.getElementById("woord").value;
    if (geraden.length != 5) return;     // submitted word must contain 5 letters
    turns++;
    document.getElementById("woord").value = "";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {  
                updateScreen(this.responseText.trim(), geraden);
            }
        };
        xmlhttp.open("GET", "raadwoord.php?q=" + geraden, true);
        xmlhttp.send();
    
}

function updateScreen(feedback, geraden) {
    let ballrow = document.getElementById("output").childNodes;
    let column = ballrow[turns-1].childNodes;
    console.log("Beurten: " + turns);

    for (let i = 0; i < 5; i++) {
        let status = feedback.charAt(i);
        column[i].innerText = geraden.charAt(i);
        if (status == "1" ) column[i].style.backgroundColor = "#ffb50a";
        if (status == "2" ) column[i].style.backgroundColor = "#bdf22e";
    }

    if (feedback=="22222") {
        document.getElementById("resultText").innerHTML = "<h3>Geraden! Gefeliciteerd!</h3>";
        turns = 6;
    }
    if (turns==5) {
        document.getElementById("resultText").innerHTML = "<h3>Game Over....</h3>";
    }
}
