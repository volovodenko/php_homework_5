<?php
/**
 * Написать функцию, которая выводит список файлов в заданной директории.
 * Директория задается как параметр функции.
 */
include("./common_functions/getPOST.php");
include("./common_functions/echoResult.php");
include ("./4/listDir.php");

$dir = getPOST("dir");

echoResult(listDir($dir), "submit");
?>
<?php include("./4/content4.php") ?>
