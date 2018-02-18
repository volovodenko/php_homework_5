<?php
/**
 * @param $result
 * @param $submitName
 * Ф-ция печатает $result если нажата кнпока $submit
 */
function echoResult($result, $submitName)
{
    if (getPost($submitName)) {
        switch ($result) {
            case is_string($result):
            case is_numeric($result):
                echo $result;
                break;

            case is_array($result):
                if ($result[0] !== false) {
                    array_walk($result, function($val) {
                        echo $val. "<br>";
                    });
                } else {
                    echo $result[1] . "<br>";
                }
        }
        echo "<hr><br>";
    }


}