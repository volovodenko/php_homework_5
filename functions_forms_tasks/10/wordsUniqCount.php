<?php
/**
 * @param $string
 * @return array
 * Ф-ция возвращает уникальные слова в строке
 */
function wordsUniqCount($string) {
    $string = mb_convert_encoding(trim($string), "UTF-8"); //преобразовали строку в UTF-8
    $array = explode(" ", $string);//разбили в массив по каждому слову
    $array = array_filter($array); // очистили от пустых строк
    $array = array_count_values($array); //посчитали кол-во значений (значение(ключ) => кол-во(значение))
    $arrayResult = [];

    foreach ($array as $key => $val) {
        if ($val == 1) {
            $arrayResult[] = $key;
        }
    }

    return $arrayResult;
}