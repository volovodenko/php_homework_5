<?php

/**
 * @param $dirname
 * @return array
 * Ф-ция отображения картинок в директории $dirname
 */
function viewImage($dirname) {
    $errors = [];

    if (is_dir($dirname)) {
        $arrayDir = scandir($dirname);
        $arrayDir = array_diff($arrayDir, [".", ".."]); //убираем "." и ".."
    } else {
        $errors[] =  "Некорректное название директории";
    }

    if (!empty($errors)) {
        echo array_shift($errors);
    } else {
        echo "<div class='images'>";
        foreach ($arrayDir as $val) {
            echo "<img src='" . $dirname . $val ."'>";
        }
        echo "</div><hr><br>";
    }
}