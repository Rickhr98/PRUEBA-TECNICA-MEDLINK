<?php
function findPoint($strArr) {
    // Separar los elementos de la cadena en arrays y hace limpieza de espacios
    $arr1 = array_map('trim', explode(',', $strArr[0]));
    $arr2 = array_map('trim', explode(',', $strArr[1]));

    // Obtener la intersección de ambos arrays
    $intersection = array_intersect($arr1, $arr2);

    // Ordenar el resultado por si acaso
    sort($intersection, SORT_NUMERIC);

    // Retornar resultado o 'false' si no hay intersección
    return empty($intersection) ? 'false' : implode(',', $intersection);
}

// Ejemplos de prueba
echo findPoint(array("1, 3, 4, 7, 13", "1, 2, 4, 13, 15")); // Output: 1,4,13
echo "\n";
echo findPoint(array("1, 3, 9, 10, 17, 18", "1, 4, 9, 10")); // Output: 1,9,10
echo "\n";
?>