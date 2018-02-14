<?php
/**
 * Создать форму с элементом textarea.
 * При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте.
 * Реализовать с помощью функции.
 */
$string = @$_POST["textarea"];
/**
 * @param $string
 * @return string
 */
function max3Words ($string) {
    $array = explode(" ", mb_strtolower($string)); //разбиваем строку в массив

    $callback = function ($a, $b) {
        if (mb_strlen($a) == mb_strlen($b)) {
            return 0; //элемент не сдвигается
        }
        //1 - сдвиг $a в конец массива; -1 сдвиг $a в начало массива
        //если длина $a < длина $b - в конец масива, иначе в начало
        return (mb_strlen($a) < mb_strlen($b)) ? 1 : -1;
    };
    //сортируем массив по убыванию длины;
    usort($array, $callback);
    //обрезаем первые три значения; собираем в строку
    return implode(", ", array_slice($array, 0, 3));
}

if (@$_POST["submit"]) {
    echo max3Words($string);
}

?>
<form method="POST">
    <textarea class="textarea" name="textarea" placeholder="Введите текст" minlength="5"><?=$string?></textarea>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>
