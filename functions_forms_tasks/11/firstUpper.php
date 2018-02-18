<?php
include("./11/mb_ucfirst.php");
/**
 * @param $string
 * @return string
 * Ф-ция возвращает строку с заглавными первыми буквами всех предложений
 */
function firstUpper($string) {
    $string = mb_convert_encoding($string, "UTF-8"); //преобразовали строку в UTF-8
    $array = explode(".", $string); //разбили в массив
    array_walk($array, function(&$val) {
        $val = trim($val); //обрезаем пробелы
        $val = mb_ucfirst($val) . "."; //заглавная перва буква + "." в конце предложения
    });
    return implode(" ", $array);
}