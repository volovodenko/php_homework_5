<?php
/**
 * Есть текстовый файл.
 * Необходимо удалить из него все слова, длина которых превыщает N символов.
 * Значение N задавать через форму.
 * Проверить работу на кириллических строках - найти ошибку, найти решение.
 */
include("./common_functions/getPOST.php");
include("./common_functions/echoResult.php");
include("./3/delWords.php");

$file = "./3/file.txt";
$number = getPOST("number");
$string = file_get_contents($file);
$result =
    delWords($string, $number)
        ? "Результат: <br>" . delWords($string, $number)
        : "Все слова удалены";

echo "Исходный файл 'file.txt: <br>" . $string . "<hr>";

echoResult($result, "submit");
?>
<?php include("./3/content3.php") ?>

