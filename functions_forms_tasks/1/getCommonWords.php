<?php
include("./common_functions/strToArray.php");
/**
 * @param $a - string
 * @param $b - string
 * @return string
 * Возвращает массив с общими словами
 */
function getCommonWords(string $a, string $b)
{
    $array1 = strToArray($a); //разбивае первую строку в массив
    $array2 = strToArray($b); //разбивае вторую строку в массив
    //возвращаем отфильтрованный от пустых строк массив с одинаковыми вхождениями
    return array_filter(array_intersect($array1, $array2));
}