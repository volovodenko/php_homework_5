<?php
/**
 * @param $array
 * Ф-ция отображения массива
 */
function viewArray($array) {
    array_walk($array, function($val , $key) {
        echo $key . " - " . $val . "<br>";
    });
    echo "<hr><br>";
}