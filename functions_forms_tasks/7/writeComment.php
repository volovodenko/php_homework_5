<?php
/**
 * @param $data
 * @param $file
 * Ф-ция записывает строку $data в файл $file
 */
function writeComment($data, $file) {
    $errors = [];
    $data= str_replace("\r\n", " ", trim($data)); //убираем переводы строки
    $data = htmlspecialchars($data); //преобразовываем спецсимволы
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