<?php
/**
 * Есть строка $string = "яблоко черешня вишня вишня черешня груша яблоко черешня вишня
 * яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня
 * вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня
 * груша яблоко черешня вишня"
 * Подсчитайте, сколько раз каждый фрукт встречается в этой строке.
 * Выведите в виде списка в порядке уменьшения количества:
 * Пример вывода:
 * яблоко – 12
 * черешня – 8
 * груша – 5
 * слива - 3
 */

$message = trim(@$_POST["text"]);

function wordsCount($string) {
    $string = mb_convert_encoding($string, "UTF-8"); //преобразовали строку в UTF-8
    $string= str_replace("\r\n", " ", $string); //убираем переводы строки
    $array = explode(" ", $string);//разбили в массив по каждому слову
    $array = array_filter($array); // очистили от пустых строк
    $array = array_count_values($array); //посчитали кол-во значений (значение(ключ) => кол-во(значение))
    arsort($array); //сортировка в обратном порядке
    array_walk($array, function($val , $key) {
        echo $key . " - " . $val . "<br>";
    });
}

if (@$_POST["submit"]) {
    if ($message) {
        wordsCount($message);
        echo "<hr><br>";
    }
}
?>
<form method="POST" action="./load.php?task=13">
    <textarea name="text" class="textarea" required><?=$message?></textarea>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>