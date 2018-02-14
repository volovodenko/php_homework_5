<?php
/**
 * Создать гостевую книгу, где любой человек может оставить комментарий
 * в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.
 */

$message = @$_POST["message"];

function writeComment($data, $file) {
    $data= str_replace("\r\n", " ", $data); //убираем переводы строки
    $data = htmlspecialchars($data); //преобразовываем спецсимволы
    $data .= "\r\n";

    if (!file_exists($file)) {
        $content = fopen($file, "w");
        $write = @fwrite($content, $data);
        if (!$write) {
            echo "Ошибка! не удалось записать комментарий!";
        }
        fclose($content);
    } else {
        file_put_contents($file, $data, FILE_APPEND);
    }
}

function viewPosts($file) {
    if (file_exists($file)) {
        $content = fopen($file, "r");

        while(!feof($content)) {
            $buffer = fgets($content);
            if ($buffer) {
                echo "<div class='comment'>" . $buffer . "</div>";
            }
        }
    }
}

if (@$_POST["submit"]) {
    if ($message) {
        writeComment($message, "./7/guestbook.txt");
    }
}

viewPosts("./7/guestbook.txt");
?>
<form method="POST" action="./load.php?task=7&dir=7">
    <textarea name="message" class="textarea" required placeholder="Оставьте комментарий"></textarea>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>