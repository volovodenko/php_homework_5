<?php
/**
 * @param $string
 * @return string
 * Ф-ция возвращает строку с заглавной первой буквой
 */
function mb_ucfirst($string) {
    return (mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1));
}