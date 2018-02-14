<?php
/**
 * Создать форму с двумя элементами textarea.
 * При отправке формы скрипт должен выдавать только те слова,
 * которые есть и в первом и во втором поле ввода.
 * Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b),
 * которая будет возвращать массив с общими словами.
 */

$string1 = @$_POST["textarea1"];
$string2 = @$_POST["textarea2"];

/**
 * @param $a - string
 * @param $b - string
 * @return string
 */
function getCommonWords($a, $b) {
    $array1 = explode(" ", mb_strtolower($a)); //разбиваем строку в массив
    $array2 = explode(" ", mb_strtolower($b));

    foreach ($array1 as $val1) {
        foreach($array2 as $val2) {
            $resultArray[] = ($val1 == $val2) ? $val2 : Null;
        }
    }
    if (array_filter($resultArray)) {//если массив не пустой
        return implode(", ", array_filter($resultArray)); //фильтруем Null, собираем в строку
    }
    return "Нет совпадения";
}

if (@$_POST["submit"]) {
    echo getCommonWords($string1, $string2);
}
?>
<form method="POST">
    <textarea class="textarea" name="textarea1" placeholder="Введите текст" minlength="5"><?=$string1?></textarea>
    <textarea class="textarea" name="textarea2" placeholder="Введите текст" minlength="5"><?=$string2?></textarea>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>