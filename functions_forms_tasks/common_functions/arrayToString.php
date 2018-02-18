<?php
/**
 * @param $array
 * @param string $glue
 * @return string
 * Преобразование массива $array в строку с помощью соединителя $glue
 */
function arrayToString($array, $glue = " ")
{
    return implode($glue, array_filter($array)); //фильтруем Null, собираем в строку
}