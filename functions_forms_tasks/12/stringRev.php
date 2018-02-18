<?php
/**
 * @param $string
 * @return string
 * Функция возвращает обернутую по предложениям строку
 */
function stringRev($string) {
    $string = mb_convert_encoding($string, "UTF-8"); //преобразовали строку в UTF-8
    $array = explode(".", $string); //разбили в массив по каждому слову
    $array = array_filter($array); //фильтруем пустые строки

    array_walk($array, function(&$val) {
        $val = trim($val); //обрезаем пробелы
        $val .= ".";
    });

    $array = array_reverse($array); //обернули массив

    return implode(" ", $array);
}
