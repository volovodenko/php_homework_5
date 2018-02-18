<?php
/**
 * Создать форму с двумя элементами textarea.
 * При отправке формы скрипт должен выдавать только те слова,
 * которые есть и в первом и во втором поле ввода.
 * Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b),
 * которая будет возвращать массив с общими словами.
 */
include("./common_functions/getPOST.php");
include("./common_functions/echoResult.php");
include("./common_functions/arrayToString.php");
include("./1/getCommonWords.php");

$string1 = getPOST("textarea1");
$string2 = getPOST("textarea2");
$result =
    getCommonWords($string1, $string2)
        ? arrayToString(getCommonWords($string1, $string2), ", ")
        : "Нет совпадения";

echoResult($result, "submit");
?>
<?php include("./1/content1.php") ?>

