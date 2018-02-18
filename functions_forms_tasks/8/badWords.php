<?php
/**
 * @param $string
 * @return mixed|string
 * Ф-ция поиска некорректных слов
 */
function badWords($string) {
    $arrayIncorrect = ["мудак", "пидар", "сука"]; //и т.д.

    foreach ($arrayIncorrect as $value) {
        if (mb_stristr($string, $value)) {//если нашли вхождение некорректного слова
            $errors = "Некорректный комментарий";
            break;
        }
    }

    return !empty($errors)
        ? $errors
        : "";
}