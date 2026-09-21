<?php

$nota1 = $_POST["nota1"];
$nota2 = $_POST["nota2"];
$nota3 = $_POST["nota3"];
$nota4 = $_POST["nota4"];
$nota5 = $_POST["nota5"];

$media = (
    ($nota1 * 2) +
    ($nota2 * 3) +
    ($nota3 * 1) +
    ($nota4 * 1) +
    ($nota5 * 3)
) / 10;

echo "Nota 1: " . $nota1 . "<br>";
echo "Nota 2: " . $nota2 . "<br>";
echo "Nota 3: " . $nota3 . "<br>";
echo "Nota 4: " . $nota4 . "<br>";
echo "Nota 5: " . $nota5 . "<br>";

echo "Média: " . $media;

?>
