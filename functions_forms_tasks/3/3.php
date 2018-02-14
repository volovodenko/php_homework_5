<?php
/**
 * Есть текстовый файл.
 * Необходимо удалить из него все слова, длина которых превыщает N символов.
 * Значение N задавать через форму.
 * Проверить работу на кириллических строках - найти ошибку, найти решение.
 */

$number = @$_POST["number"];

function delWords ($filename, $number) {
    $string = str_replace([",", "."], "", file_get_contents($filename)); //замена "," и "." на ""
    $array = explode(" ", $string); //разбиваем строку в массив

    foreach ($array as $val) {
        $arrayResult[] = (mb_strlen($val) <= $number) ? $val : Null;
    }
    $arrayResult = array_filter($arrayResult); //фильтруем Null

    if ($arrayResult) {
        return implode(" ", $arrayResult); //собираем в строку
    }
    return "Все слова удалены";
}

echo "Исходный файл 'file.txt: <br>";
echo file_get_contents("./3/file.txt");
echo "<hr>";

if (@$_POST["submit"]) {
    echo "Результат: <br>" . delWords("./3/file.txt", $number);
}


?>
<form method="POST" action="./load.php?task=3&dir=3">
    <input type="number" name="number" placeholder="Введите N" value="<?=$number?>">
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>
