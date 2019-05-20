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

    #output div div {
        width: 30px;
        height: 30px;
        line-height: 30px;
        background-color: yellow;
        display: inline-block;
        padding: 3px;
        margin: 3px;
        border-radius: 10px;
        text-align: center;
    }

</style>

</head>

<body>

<h2> L I N G O </h2>

<p>Raad het woord:</p> 

<input type="text" name="woord" maxlength="5" id="woord">
<button id="raadButton">Raad!</button>

<div id="output"></div>


</body>

</html>