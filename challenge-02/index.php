<?php
function noIterate($strArr) {
    $N = $strArr[0];
    $K = $strArr[1];

    echo "INPUTS:". "\n";
    echo "N: " . $N . "\n";
    echo "K: " . $K . "\n";

    $nLen = strlen($N);
    $kLen = strlen($K);

    // Conteo de caracteres requeridos en K
    $need = [];
    for ($i = 0; $i < $kLen; $i++) {
        $need[$K[$i]] = ($need[$K[$i]] ?? 0) + 1;
    }
    $missing = count($need);

    // Ventana deslizante
    $have = [];
    $minLen = PHP_INT_MAX;
    $res = "";

    $left = 0;
    for ($right = 0; $right < $nLen; $right++) {
        $c = $N[$right];
        if (isset($need[$c])) {
            $have[$c] = ($have[$c] ?? 0) + 1;
            if ($have[$c] == $need[$c]) {
                $missing--;
            }
        }

        // Cuando todos los caracteres requeridos están en la ventana
        while ($missing == 0) {
            if (($right - $left + 1) < $minLen) {
                $minLen = $right - $left + 1;
                $res = substr($N, $left, $minLen);
            }
            // Reducir ventana desde la izquierda
            $leftChar = $N[$left];
            if (isset($need[$leftChar])) {
                $have[$leftChar]--;
                if ($have[$leftChar] < $need[$leftChar]) {
                    $missing++;
                }
            }
            $left++;
        }
    }
    echo "OUTPUT:". "\n";
    echo "RESULT: " . $res . "\n";
    return $res;
}

// Ejemplos:
echo noIterate(array("aaabaaddae", "aed")); // Salida: dae
echo "------------------------------------\n";
echo noIterate(array("aabdccdbcacd", "aad")); // Salida: aabd
echo "------------------------------------\n";
echo noIterate(array("ahffaksfajeeubsne", "jefaa")); // Salida: aksfaje
echo "------------------------------------\n";
echo noIterate(array("aaffhkksemckelloe", "fhea")); // Salida: affhkkse
echo "------------------------------------\n";
?>