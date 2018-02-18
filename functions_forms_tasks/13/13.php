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
include("./common_functions/getPOST.php");
include("./13/wordsCount.php");
include("./13/viewArray.php");

$message = getPost("text");

if (getPost("submit") && !empty($message)) {
    viewArray(wordsCount($message) );
}
?>
<?php include("./13/content13.php") ?>
