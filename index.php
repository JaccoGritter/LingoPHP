<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <title>Document</title>

</head>

<body>

<?php
    $teststring = "Dit is een test!";

?>
       
<p>Raad het woord:</p> 
<input type="text" name="woord" maxlength="5" id="woord">
<button type="submit" id="mybutton">Raad!</button>

<p>Trouwens, de teststring is <?php echo "$teststring" ?>, dat je het weet!</p>

<script>
$(document).ready(function() {

    $("#mybutton").on("click", function() {
        let woord = $("#woord").val();
        $.ajax({
            url: "raadwoord.php",
            method: "POST",
            dataType: "text",
            data: {
                val: woord
            }
        }).done(function(returnedWoord){
            console.log(returnedWoord)
        })

    })


})

</script>

</body>

</html>