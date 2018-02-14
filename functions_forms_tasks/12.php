<?php
/**
 * Написать функцию, которая в качестве аргумента принимает строку,
 * и форматирует ее таким образом, что предложения идут в обратном порядке.
 * Пример:
 * Входная строка: "А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь,
 * все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался.
 * А там хоть трава не расти."
 * Строка, возвращенная функцией : "А там хоть трава не расти. А ларчик просто открывался.
 * А король-то — голый. А вы друзья как ни садитесь, все в музыканты не годитесь.
 * А воз и ныне там. А Васька слушает да ест."
 *
 */

$message = @$_POST["text"];

function stringRev($string) {
    $string = mb_convert_encoding($string, "UTF-8"); //преобразовали строку в UTF-8
    $array = explode(".", $string); //разбили в массив по каждому слову
    array_walk($array, function(&$val) {
        $val = trim($val); //обрезаем пробелы
        $val .= ".";
    });
    $array = array_reverse($array); //обернули массив
    return implode(" ", $array);
}

if (@$_POST["submit"]) {
    if ($message) {
        echo stringRev($message);
        echo "<hr><br>";
    }
}
?>
<form method="POST" action="./load.php?task=12">
    <textarea name="text" class="textarea" required placeholder="Введите текст"><?=$message?></textarea>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>