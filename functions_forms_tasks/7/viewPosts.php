<?php
/**
 * @param $file
 * Ф-ция считывает посты с файла
 */

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