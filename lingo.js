window.onload = function() {
        //document.getElementById("raadButton").addEventListener("click", raadWoord);

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
        var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "bedenkwoord.php", true);
            xmlhttp.send();
            xmlhttp.open("GET", "setscore.php", true);
            xmlhttp.send();
    }

    function volgendeBeurt() {               // sets a random word, turns = 0
        var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "bedenkwoord.php", true);
            xmlhttp.send();
            xmlhttp.open("GET", "setscore.php", true);
            xmlhttp.send();
          
    }

    function raadWoord() {
        var geradenwoord = document.getElementById("woord").value;
        document.getElementById("woord").value = "";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) { 
                    //console.log(this.responseText); 
                    let myObj = JSON.parse(this.responseText);
                    updateScreen(myObj, geradenwoord);
                }
            };
            xmlhttp.open("GET", "raadwoord.php?q=" + geradenwoord, true);
            xmlhttp.send();
        
    }

    function updateScreen(myObj, geradenwoord) {
        //myObj.feedback myObj.turns, myObj.gameOver, myObj.won
        // let ballrow = document.getElementById("output").childNodes;
        // let column = ballrow[myObj.turns-1].childNodes;
        //let ballrow = document.getElementById("output");
        let activerow = myObj.turns - 1;
        let activeBall = "";
        let status = "";

        document.getElementById("row" + activerow).style.marginBottom = "6px";  // need to add margin to prevent rows from moving

        for (let i = 0; i < 5; i++) {
            status = myObj.feedback.charAt(i);
            activeBall = "cell" + activerow + i;
            document.getElementById(activeBall).innerText = geradenwoord.charAt(i);
            //column[i].innerText = geradenwoord.charAt(i);
            // if (status == "1" ) column[i].style.backgroundColor = "#ffb50a";
            // if (status == "2" ) column[i].style.backgroundColor = "#bdf22e";
            if (status == "1" ) document.getElementById(activeBall).style.backgroundColor = "#ffb50a";
            if (status == "2" ) document.getElementById(activeBall).style.backgroundColor = "#bdf22e";

        }

        if (myObj.won) {
            document.getElementById("resultText").innerHTML = "<h3>Geraden! Gefeliciteerd!</h3>";
            //document.getElementById("woord").setAttribute("placeholder", "lekker!");
            console.log(myObj.score);
        }
        if (myObj.gameOver & myObj.won == false) {
            document.getElementById("resultText").innerHTML = "<h3> Game Over... </h3>";
            clearGrid();
        }
    }

    document.getElementById("woord").addEventListener('keypress', function (e) {
        if (e.key === 'Enter') raadWoord();
        });

    document.getElementById("nextTurn").addEventListener("click", volgendeBeurt);

    document.getElementById("woord").focus();

    buildGrid(5);
    startSpel();


}