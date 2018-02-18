<?php
/**
 * @param $string
 * @param string $delimiter
 * @return array
 * Преобразование строки $string в массив по разделителю $delimiter
 */
function strToArray($string, $delimiter = " ")
{
    return explode($delimiter, mb_strtolower($string));
}