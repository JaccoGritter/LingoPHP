<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <title>Lingo</title>

    <script>

    // $(function(){

    //     $("form").submit(function(){
    //         $("#test").html("JS triggered");
    //         alert("js");
    //     })

    // });

    </script>

</head>

<body>

<?php
    $teRadenWoord = "hotel";
    $tussenwoord = "pp";
?>

<p>Raad het woord:</p> 

<form method="POST" action="">
    <input type="text" name="woord" maxlength="5" id="woord">
    <input type="submit" id="raadButton" value="Raad!">
</form>

<p id="test">Hallo</p>

<p>Klik 'Raad!' of druk op 'enter'</p>

<?php 

    $geradenWoord = $_POST["woord"];
    $tussenwoord = $tussenWoord.$geradenWoord;


?>

<p>Trouwens, de teststring is <?php echo "$teRadenWoord" ?>, dat je het weet!</p><br>
<p>Geraden woord: <?php echo "$geradenWoord" ?> </p>
<p>Tussenwoord is: <?php echo "$tussenwoord" ?>




</body>

</html>