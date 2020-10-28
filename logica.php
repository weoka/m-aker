<?php

$numero = $_POST['Numero'];
$multiplicaciones = tablaMultiplicacionDe($numero);
$factorial = factorialDe(1, $numero);
construirTablaHtml(12, 2, array_merge($multiplicaciones, $factorial));

function tablaMultiplicacionDe($numero) : array{
    $multiplicaciones = Array();
    for ($i = 0; $i <= 10; $i++){
        array_push($multiplicaciones, "$numero * $i");
        array_push($multiplicaciones, $numero * $i);
    }
    return $multiplicaciones;
}

function factorialDe($factorial, $numero) : array{
    for ($f = $numero; $f >= 1; $f--) {
        $factorial *= $f;
    }
    return ["$numero!", "$factorial"];
}

function construirTablaHtml($rows, $columns, $content){
    $content = array_reverse($content);
    $requiredCells = $rows*$columns;
    //construir tablas
    echo "<table border='1'>";
    for($filledRows = 0; $filledRows < $rows; $filledRows++){
        echo "<tr>";
        for($filledColumns = 0; $filledColumns < $columns; $filledColumns++){
            echo "<td>{$content[$requiredCells-$filledColumns-1]}</td>";
        }
        echo "</tr>";
        $requiredCells -= $columns;
    }   
    echo "</table>";
}




     