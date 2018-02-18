<?php

function viewUniqWords($array) {
    echo "Количество уникальных слов: " . count($array) . "<br>";
    array_walk ($array, function($val) {
        echo $val . "<br>";
    });
}