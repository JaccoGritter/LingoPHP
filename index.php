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

</style>

</head>

<body>

<div id="main">

    <h1> L I N G O </h1>

    <h3>Raad het woord:</h3>

    <input type="text" name="woord" maxlength="5" id="woord" autocomplete="off">
    <button id="raadButton">Raad!</button>

    <br>
    <br>

    <div id="output"></div>
    <div id="resultText"></div>

</div>

</body>

</html>