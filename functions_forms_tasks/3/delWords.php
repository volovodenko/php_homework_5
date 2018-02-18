<?php
include("./common_functions/strToArray.php");
include("./common_functions/strReplace.php");
include("./common_functions/arrayToString.php");
/**
 * @param $string
 * @param $number
 * @return string
 * Ф-ция удаляет из строки $string все слова, длина которых превыщает $number символов
 */
function delWords ($string, $number) {
    //В строке заменяем "." и "," на ""; преобразовываем в массив
    $array = strToArray(strReplace($string));

    foreach ($array as $val) {
        $arrayResult[] = (mb_strlen($val) <= $number) ? $val : Null; //формируем массив слов
    }

    return arrayToString(array_filter($arrayResult)); //фильтруем Null, преобразовываем в строку
}