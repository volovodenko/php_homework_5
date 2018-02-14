<?php
/**
 * Создать гостевую книгу, где любой человек может оставить комментарий
 * в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.
 * Реализовать проверку на наличие в тексте запрещенных слов, матов.
 * При наличии таких слов - выводить сообщение "Некорректный комментарий".
 * Реализовать удаление из комментария всех тегов, кроме тега <b>.
 */

$message = @$_POST["message"];

function writeComment($data, $file) {
    $arrayIncorrect = ["мудак", "пидар", "сука"]; //и т.д.
    $errors = [];
    $data= str_replace("\r\n", " ", $data); //убираем переводы строки

    foreach ($arrayIncorrect as $value) {
        if (mb_stristr($data, $value)) {//если нашли вхождение некорректного слова
            $errors [] = "Некорректный комментарий";
            break;
        }
    }

    if (!empty($errors)) {
        echo array_shift($errors);
        return;
    }

    $data = htmlspecialchars($data); //преобразовываем спецсимволы
    $data= str_replace("&lt;b&gt;", "<b>", $data); //разрешаем теги <b>
    $data= str_replace("&lt;/b&gt;", "</b>", $data); //разрешаем теги </b>

    $countB1 = substr_count($data, "<b>"); //кол-во открывающих теговю b
    $countB2 = substr_count($data, "</b>"); //кол-во закрывающих теговю b
    if ( $countB1 > $countB2 ) { //если открывающих больше, нужно закрыть
        for ($i=1; $i<=($countB1 - $countB2); $i++) {
            $data .= "</b>" ;
        }
    }

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
        writeComment($message, "./8/guestbook.txt");
    }
}

viewPosts("./8/guestbook.txt");
?>
<form method="POST" action="./load.php?task=8&dir=8">
    <textarea name="message" class="textarea" required placeholder="Оставьте комментарий"></textarea>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>