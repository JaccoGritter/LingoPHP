<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="lingo.js"></script>

    <title>Lingo</title>

<style>

    body {
        font-family: arial, sans-serif;
        font-size: 1.3rem;
        background-color: mediumaquamarine;
    }

    h1 {
        color: oldlace;
        text-shadow: 3px 3px #0e326d;
    }

    #output div div {
        width: 50px;
        height: 50px;
        line-height: 50px;
        background-color:khaki;
        display: inline-block;
        padding: 3px;
        margin: 3px;
        border-radius: 12px;
       // text-align: center;
    }

    #main {
        text-align: center;
    }

    input[type=text] {
        
        color: white;
        font-size: 1.6rem;
        letter-spacing: 0.7rem;
        text-align: center;
        width: 260px;
        padding: 12px 20px;
        margin: 8px 0;
        /* display: inline-block; */
        border: 2px solid white;
        border-radius: 6px;
        box-sizing: border-box;
        background-color: mediumaquamarine;
    }

    input:focus{
    outline: none;
}

    #nextTurn, #playAgain {
        /* display: inline-block; */
        color: black;
        display: none;
        width: 200px;
        height: 35px;
        line-height: 35px;
        border-radius: 12px;
        background-color: khaki;
    }

    #nextTurn:hover, #playAgain:hover {
        color: white;
    }

</style>

</head>

<body>

<div id="main">

    <h1> L I N G O </h1>

    <h3 id="score">Raad het woord:</h3>

    
    <!-- <button id="raadButton">Raad!</button> -->

    <div id="output"></div>
    <input type="text" name="woord" maxlength="5" id="woord" autocomplete="off">
    <div id="resultText"></div>
    <div id="nextTurn">volgende beurt</div>
    <div id="playAgain">Start nieuw spel!</div>

</div>

</body>

</html>