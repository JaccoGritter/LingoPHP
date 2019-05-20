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
    turns++;
    var geraden = document.getElementById("woord").value;
    document.getElementById("woord").value = "";
    //document.getElementById("test").innerHTML = geraden;
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
    //console.log("lengte: " + feedback.length);

    for (let i = 0; i < 5; i++) {
        let status = feedback.charAt(i);
        column[i].innerText = geraden.charAt(i);
        if (status == "1" ) column[i].style.backgroundColor = "#ffb50a";
        if (status == "2" ) column[i].style.backgroundColor = "#bdf22e";
    }
}
