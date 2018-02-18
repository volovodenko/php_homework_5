<?php
/**
 * Написать функцию, которая считает количество уникальных слов в тексте.
 * Слова разделяются пробелами. Текст должен вводиться с формы.
 */
include("./common_functions/getPOST.php");
include("./10/wordsUniqCount.php");
include("./10/viewUniqWords.php");

$message = getPost("text");

if (getPost("submit") && !empty($message)) {
    viewUniqWords(wordsUniqCount($message));
}
?>
<?php include("./10/content10.php") ?>
