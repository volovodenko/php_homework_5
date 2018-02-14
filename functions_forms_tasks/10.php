<?php
/**
 * Написать функцию, которая считает количество уникальных слов в тексте.
 * Слова разделяются пробелами. Текст должен вводиться с формы.
 */

$message = trim(@$_POST["text"]);

function wordsCount($string) {
    $string = mb_convert_encoding($string, "UTF-8"); //преобразовали строку в UTF-8
    $array = explode(" ", $string);//разбили в массив по каждому слову
    $array = array_filter($array); // очистили от пустых строк
    $array = array_count_values($array); //посчитали кол-во значений (значение(ключ) => кол-во(значение))
    array_walk($array, function($val, $key) {
        echo $key . " - " . $val . " слов<br>";
    });
}

if (@$_POST["submit"]) {
    if ($message) {
        wordsCount($message);
        echo "<hr><br>";
    }
}
?>
<form method="POST" action="./load.php?task=10">
    <input type="text" name="text" size="100" required placeholder="Введите строку" value="<?=$message?>">
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>