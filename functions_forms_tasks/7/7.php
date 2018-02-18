<?php
/**
 * Создать гостевую книгу, где любой человек может оставить комментарий
 * в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.
 */

include("./common_functions/getPOST.php");
include("./7/writeComment.php");
include("./7/viewPosts.php");

$message = getPOST("message");
$file = "./7/guestbook.txt";

if (getPost("submit") && !empty($message)) {
    writeComment($message, $file);
}

viewPosts($file);
?>
<?php include("./7/content7.php") ?>
