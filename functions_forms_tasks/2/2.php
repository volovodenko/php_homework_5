<?php
/**
 * Создать форму с элементом textarea.
 * При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте.
 * Реализовать с помощью функции.
 */
include("./common_functions/getPOST.php");
include("./common_functions/echoResult.php");
include("./2/max3Words.php");

$string = getPOST("textarea");
$result = max3Words($string);

echoResult($string, "submit");
?>
<?php include("./2/content2.php") ?>

