<?php

include("./common_functions/strToArray.php");
include("./common_functions/arrayToString.php");

/**
 * @param $string
 * @return string
 * Ищет в строке $string топ 3 длинных слова и возвращает
 */
function max3Words($string)
{
    $array = strToArray($string); //преобразуем строку в массив

    $callback = function ($a, $b) {
        if (mb_strlen($a) == mb_strlen($b)) {
            return 0; //элемент не сдвигается
        }
    //1 - сдвиг $a в конец массива; -1 сдвиг $a в начало массива
    //если длина $a < длина $b - в конец масива, иначе в начало
        return (mb_strlen($a) < mb_strlen($b)) ? 1 : -1;
    };

    //сортируем массив по убыванию длины слов;
    usort($array, $callback);

    //обрезаем первые три значения; собираем в строку
    return arrayToString(array_slice($array, 0, 3), ", ");
}