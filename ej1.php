<?php

$arreglo = [
    "keyStr1" => "lado",
    0 => "ledo",
    "keyStr2" => "lido",
    1 => "lodo",
    2 => "ludo"
];

echo ('<pre>');
//var_dump($arreglo);

foreach ($arreglo as $value) {
    echo $value. ", ";
}

echo "<br><br>";

$arreglo = array_reverse($arreglo);
foreach ($arreglo as  $value) {
    echo $value. ", ";
}

echo ('</pre>');
?>