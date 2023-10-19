<?php
echo "1 - ";
date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y', time());
$time = date('h:i', time());
echo "Hoje é $date e agora são $time h";

echo "<br><br> 2 - ";
function test()
{
    $string = "Hello World!";
    $wordCount = str_word_count($string);
    $wordReverse = strrev($string);
    $splitString = str_split($string);
    $joinString = join(".", $splitString);
    echo "A string tem $wordCount palavras <br>";
    echo "Revertida: $wordReverse <br>";
    echo $joinString;
}

test();

echo "<br><br> 3 - ";
session_start();

$counterFile = "counter.txt";

if (!file_exists($counterFile)) {
    $f = fopen($counterFile, "w");
    fwrite($f, "0");
    fclose($f);
}

$f = fopen($counterFile, "r");
$counter = fread($f, filesize($counterFile));
fclose($f);

$counter++;
$f = fopen($counterFile, "w");
fwrite($f, $counter);
fclose($f);

echo "Esse site teve $counter visitas";

echo "<br><br> 4 - ";
$cookieName = "visits";
setcookie($cookieName, $counter, time() + (86400 * 30), "/");
$cookieCounter = $_COOKIE[$cookieName];
echo "Esse site teve $cookieCounter visitas (cookie)";
