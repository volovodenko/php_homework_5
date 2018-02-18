<?php
/**
 * Создать гостевую книгу, где любой человек может оставить комментарий
 * в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.
 * Реализовать проверку на наличие в тексте запрещенных слов, матов.
 * При наличии таких слов - выводить сообщение "Некорректный комментарий".
 * Реализовать удаление из комментария всех тегов, кроме тега <b>.
 */
include("./common_functions/getPOST.php");
include("./8/writeComment2.php");
include("./7/viewPosts.php");

$file = "./8/guestbook.txt";
$message = getPost("message");

if (getPost("submit") && !empty($message)) {
    writeComment2($message, $file);
}

viewPosts($file);
?>
<?php include("./8/content8.php") ?>
