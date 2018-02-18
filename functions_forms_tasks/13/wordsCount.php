<?php

function wordsCount($string) {
    $string = mb_convert_encoding($string, "UTF-8"); //преобразовали строку в UTF-8
    $string= str_replace("\r\n", " ", $string); //убираем переводы строки
    $array = explode(" ", $string);//разбили в массив по каждому слову
    $array = array_filter($array); // очистили от пустых строк
    $array = array_count_values($array); //посчитали кол-во значений (значение(ключ) => кол-во(значение))
    arsort($array); //сортировка в обратном порядке
    return $array;
}
