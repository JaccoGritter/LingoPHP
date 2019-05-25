window.onload = function() {

    function buildGrid(n) {
        for (let i = 0; i < n; i++) {
            let row = document.createElement("div");
            for(let j = 0; j < n; j++) {
                let cell = document.createElement("div");
                row.appendChild(cell).setAttribute("id", "cell" + i + j );
            }
            document.getElementById("output").appendChild(row).setAttribute("id", "row" + i);
        }
    }

    function clearGrid() {
        for (let i = 0; i < 5; i++){
            for (let j = 0; j < 5; j++) {
                document.getElementById("cell" + i + j).innerText = " ";
                document.getElementById("cell" + i + j).style.backgroundColor = "khaki";
            }
            document.getElementById("row" + i).style.marginBottom = "1px";  
        }
    }

    function startSpel() {               // sets a random word, turns = 0
        clearGrid();
        document.getElementById("score").innerHTML = "Raad het woord";
        document.getElementById("playAgain").style.display = "none";
        document.getElementById("resultText").innerHTML = "";
        document.getElementById("woordinput").style.display = "block";
        document.getElementById("woord").focus();
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                // to prevent failed loading of request
            }
        };
            xmlhttp.open("GET", "bedenkwoord.php", true);
            xmlhttp.send();
        var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "setscore.php", true);
            xmlhttp.send();
    }

    function volgendeBeurt() {               // sets a random word, turns = 0
        clearGrid();
        document.getElementById("nextTurn").style.display = "none";
        document.getElementById("resultText").innerHTML = "";
        document.getElementById("woordinput").style.display = "block";
        document.getElementById("woord").focus();
        var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "bedenkwoord.php", true);
            xmlhttp.send();
    }

    function raadWoord() {
        var geradenwoord = document.getElementById("woord").value;
        if (woordokay(geradenwoord)) {
            document.getElementById("woord").value = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) { 
                        let myObj = JSON.parse(this.responseText);
                        updateScreen(myObj, geradenwoord);
                    }
                };
                xmlhttp.open("GET", "raadwoord.php?q=" + geradenwoord, true);
                xmlhttp.send();
            }
    }

    function updateScreen(myObj, geradenwoord) {
        
        let activerow = myObj.turns - 1;
        let activeBall = "";
        let status = "";

        document.getElementById("row" + activerow).style.marginBottom = "6px";  // need to add margin to prevent rows from moving

        for (let i = 0; i < 5; i++) {
            status = myObj.feedback.charAt(i);
            activeBall = "cell" + activerow + i;
            document.getElementById(activeBall).innerText = geradenwoord.charAt(i);
        
            if (status == "1" ) document.getElementById(activeBall).style.backgroundColor = "#ffb50a";
            if (status == "2" ) document.getElementById(activeBall).style.backgroundColor = "#bdf22e";

        }

        document.getElementById("score").innerHTML = "Geraden woorden: " + myObj.score;

        if (myObj.won) {
            document.getElementById("woordinput").style.display = "none";
            document.getElementById("resultText").innerHTML = "<h3>Geraden! Gefeliciteerd!</h3>";
            document.getElementById("nextTurn").style.display = "inline-block";
        }
        if (myObj.gameOver & myObj.won == false) {
            document.getElementById("woordinput").style.display = "none";
            document.getElementById("resultText").innerHTML = "<h3> Game Over... </h3>";
            document.getElementById("playAgain").style.display = "inline-block";
        }
    }

    function woordokay(geradenwoord) {
        // more validation te be added    
        if (geradenwoord.length == 5 && checkIfAllCharactersValid(geradenwoord)) {
                return true;
            } else {
        return false;
            }

        function checkIfAllCharactersValid(geradenwoord) {
            for (let i=0; i<geradenwoord.length; i++) {
                if ( (geradenwoord.charAt(i).match(/[a-z]/i)) == null ) {
                    return false;
                }
            }
            return true;
        }
    }

    document.getElementById("woord").addEventListener('keypress', function (e) {
        if (e.key === 'Enter') raadWoord();
        });

    document.getElementById("nextTurn").addEventListener("click", volgendeBeurt);
    document.getElementById("playAgain").addEventListener("click", startSpel );

    buildGrid(5);
    startSpel();


}