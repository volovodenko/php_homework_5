<?php
/**
 * @param $string
 * @param array $search
 * @param string $replace
 * @return mixed
 * Производит замену символов в строке
 */
function strReplace($string, $search=[",", "."], $replace="" ) {
    return str_replace($search, $replace, $string); //замена "," и "." на ""
}