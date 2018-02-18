<?php
include ("./8/badWords.php");

/**
 * @param $data
 * @param $file
 * Ф-ция записывает строку $data в файл $file
 */
function writeComment2($data, $file) {
    $errors = [];
    $data= str_replace("\r\n", " ", $data); //убираем переводы строки

    if (badWords($data)) {
        echo badWords($data);
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
        $write = fwrite($content, $data);
        if (!$write) {
            $errors[] = "Ошибка! не удалось записать комментарий!";
        }
        fclose($content);
    } else {
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    }

    if (!empty($errors)) {
        echo array_shift($errors);
    }
}