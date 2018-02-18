<?php
/**
 * Написать функцию, которая переворачивает строку.
 * Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
 */
include("./common_functions/getPOST.php");
include("./common_functions/echoResult.php");
include("./9/mb_strrev.php");

$message = getPost("text");

if (!empty($message)) {
    echoResult(mb_strrev($message), "submit");
}
?>
<?php include("./9/content9.php") ?>
