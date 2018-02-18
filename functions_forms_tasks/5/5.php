<?php
/**
 * Написать функцию, которая выводит список файлов в заданной директории,
 * которые содержат искомое слово.
 * Директория и искомое слово задаются как параметры функции.
 */
include("./common_functions/getPOST.php");
include("./common_functions/echoResult.php");
include ("./4/listDir.php");

$dir = getPost("dir");
$filename = getPost("filename");

echoResult(listDir($dir, $filename), "submit");
?>
<?php include("./5/content5.php") ?>
