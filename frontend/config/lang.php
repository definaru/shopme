<?php
    $glas = ["a","e","i","y","o","u"];
    $soglas = ["b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","x","w","z"];
    $wordlen = 15;
    for ($i=0; $i <$wordlen/2 ; $i++) { 
        $ng = rand(0, count($glas) - 1);
        $nsg = rand(0, count($soglas) - 1);
        $newWord .= $glas[$ng].$soglas[$nsg];
    }

    $echo = rand(500, 15000);
    $session = $echo.$newWord;
    $default = 'ru'; // по умолчанию
    $allowed = ['en', 'ru']; // допустимые языки
    $current = empty($_COOKIE["lang"]) ? $default : $_COOKIE["lang"];
    $new = empty($_POST["languen"]) ? null : $_POST["languen"];
    if ($new && in_array($new, $allowed) && $new !== $current) {
        $current = $new;
        setcookie("lang", $new, strtotime('+365 days')); // http://php.net/manual/ru/function.setcookie.php
    }
    return $default = $current;