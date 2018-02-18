<?php
/**
 * @param $file
 * @param $uploaddir
 * Загрузка файла $file в директорию $uploaddir
 */
function uploadFile($file, $uploaddir) {
    $errors = []; //массив ошибок

    if ($file["name"]) { //если есть имя файла (файл загружен)
        $filename = $file["name"]; //имя файла
        $uploadfile = $uploaddir . uniqid() . basename($filename);//директория/хеш+название файла

        if (!copy($file["tmp_name"], $uploadfile)) { //если файл не копируется в директорию
            $errors[] = "Ошибка! Не удалось загрузить файл!";
        }
    } else {
        $errors[] = "Файл не выбран";
    }

    if (!empty($errors)) {
        echo array_shift($errors);
    }
}