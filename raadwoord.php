
<?php 

    session_start();

    $myObj = new stdClass();

    $myObj->gameOver = false;
    $myObj->won = false;
    $myObj->turns = 0;
    $myObj->feedback = "00000";
    $myObj->score = $_SESSION["score"];
    $myObj->teRadenWoord = "";   // will only be defined if turns == 5 && won == false


    // put the teRadenWoord in an array for easier comparison with geraden woord
    $teRadenWoordArray = str_split($_SESSION["teradenwoord"]);
    
    // feedback will be the string to be sent back and represents check results
    // 0 = character not in word
    // 1 = character in word but not on right place
    // 2 = character in word and on right place
    $feedback = "00000";
    $feedbackArray = str_split($feedback);

    // get $q from calling page (= geraden woord)
    $q = $_REQUEST["q"];

    // make sure all letters are lowercase
    $q = strtolower($q);

    //put letters of $q in an array named $qarray
    $qarray = str_split($q);

    // increase turns
    $_SESSION["beurt"] += 1;

    // check if teradenwoord contains letters from guessed word on right position
    for ($i = 0; $i < 5; $i++) { 
        if ($qarray[$i] == $teRadenWoordArray[$i]) {
            $feedbackArray[$i] = "2";
            $teRadenWoordArray[$i] = "*";
        }
    }

    // check if teradenwoord contains letters from guessed word on other position
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            if ($qarray[$i] == $teRadenWoordArray[$j] && $feedbackArray[$i] != "2") {
                $feedbackArray[$i] = "1"; 
                $teRadenWoordArray[$j] = "*";
            }
        }
    }
    
    // put the feedback array in a string
    $feedback = join($feedbackArray); 
    
    if ($feedback == "22222") {
        $_SESSION["score"] += 1;
        $myObj->gameOver = true;
        $myObj->won = true;
        $myObj->score = $_SESSION["score"];
    }

    if ($_SESSION["beurt"] >= 5) {
        $myObj->gameOver = true;
        $myObj->teRadenWoord = $_SESSION["teradenwoord"];
    }

    $myObj->feedback = $feedback;
    $myObj->turns = $_SESSION["beurt"];
    $myJSON = json_encode($myObj) ;

    echo $myJSON;

?>


 