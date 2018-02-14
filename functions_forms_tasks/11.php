<?php
/**
 * Написать функцию, которая в качестве аргумента принимает строку,
 * и форматирует ее таким образом, что каждое новое предложение начиняется с большой буквы.
 * Пример:
 * Входная строка: "а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь,
 * все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.
 * а там хоть трава не расти."
 * Строка, возвращенная функцией : "А Васька слушает да ест. А воз и ныне там.
 * А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый.
 * А ларчик просто открывался.А там хоть трава не расти."
 */

$message = @$_POST["text"];

function mb_ucfirst($string) {
    return (mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1));
}

function firstUpper($string) {
    $string = mb_convert_encoding($string, "UTF-8"); //преобразовали строку в UTF-8
    $array = explode(".", $string); //разбили в массив
    array_walk($array, function(&$val) {
        $val = trim($val); //обрезаем пробелы
        $val = mb_ucfirst($val) . ".";
    });
    return implode(" ", $array);
}

if (@$_POST["submit"]) {
    if ($message) {
        echo firstUpper($message);
        echo "<hr><br>";
    }
}
?>
<form method="POST" action="./load.php?task=11">
    <textarea name="text" class="textarea" required placeholder="Введите текст"><?=$message?></textarea>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>