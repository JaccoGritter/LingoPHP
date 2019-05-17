
<?php 
    if(isset($_POST['val'])) {
        $val = ($_POST['val']);
        
    } else {
        echo $val = "Geen waarde";
    }

    $val = "Geraden woord: ".$val;
    echo "$val";

?>


 