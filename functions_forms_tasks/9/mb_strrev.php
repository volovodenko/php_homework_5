<?php
/**
 * @param $string
 * @return string
 * Ф-ция преобразования строки в UTF-8 и переворачивает строку
 */
function mb_strrev($string) {
    $strrev = ""; //перевернутая строка
    for($i = mb_strlen($string, "UTF-8"); $i >= 0; $i--) {
        $strrev .= mb_substr($string, $i, 1, "UTF-8"); //считываем посимвольно сзади
    }
    return $strrev;
}
