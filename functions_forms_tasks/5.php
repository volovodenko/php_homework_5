<?php
/**
 * Написать функцию, которая выводит список файлов в заданной директории,
 * которые содержат искомое слово.
 * Директория и искомое слово задаются как параметры функции.
 */

$dir = trim(@$_POST["dir"]);
$fileName = trim(@$_POST["filename"]);

function showDir ($dir, $fileName) {
    if ($dir) { //если переменная не пустая
        if (@$array = scandir($dir)) { //если верное название директории
            $buffer = []; //массив для искомых файлов
            foreach ($array as $val) {
                if (mb_stristr($val, $fileName)) {
                    $buffer[] = $val;
                }
            }
            if ($buffer) { //если массив не пустой
                array_walk($buffer, function($val) {
                    echo $val. "<br>";
                });
            } else {
                echo "Искомое слово не найдено";
            }
            echo "<hr><br>";
        } else {
            echo "Неверное название директории";
        }
    } else {
        echo "Введите название директории";
    }
}

if (@$_POST["submit"]) {
    showDir($dir, $fileName);
}
?>
<form method="POST">
    <label>Введите название директориии:<input type="text" name="dir" value="<?=$dir?>" required></label>
    <br>
    <label>Введите искомое слово:<input type="text" name="filename" value="<?=$fileName?>" required></label>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>