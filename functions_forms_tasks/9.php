<?php
/**
 * Написать функцию, которая переворачивает строку.
 * Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
 */

$message = @$_POST["text"];

function mb_strrev($string) { //преобразование строки в UTF-8 и переворачивает строку
    $strrev = "";
    for($i = mb_strlen($string, "UTF-8"); $i >= 0; $i--) {
        $strrev .= mb_substr($string, $i, 1, "UTF-8");
    }
    return $strrev;
}

if (@$_POST["submit"]) {
    if ($message) {
        echo mb_strrev($message);
        echo "<hr><br>";
    }
}
?>
<form method="POST" action="./load.php?task=9">
    <input type="text" name="text" required placeholder="Введите строку" value="<?=$message?>">
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>