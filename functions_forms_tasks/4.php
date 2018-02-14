<?php
/**
 * Написать функцию, которая выводит список файлов в заданной директории.
 * Директория задается как параметр функции.
 */

$dir = trim(@$_POST["dir"]);

function showDir ($dir) {
    if ($dir) { //если переменная не пустая
        if (@$array = scandir($dir)) { //если верное название директории
            array_walk($array, function($val) {
                echo $val. "<br>";
            });
        } else {
            echo "Неверное название директории";
        }
    } else {
        echo "Введите название директории";
    }
    echo "<hr><br>";
}

if (@$_POST["submit"]) {
    showDir($dir);
}
?>
<form method="POST">
    <label>Введите название директориии:<input type="text" name="dir" value="<?=$dir?>" required></label>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>