<?php
/**
 * @param $dirname
 * @param string $filename
 * @return array
 * Ф-ция возвращает массив (для перебачи в ф-цию listDir) с названием папок в директории $dirname
 * $filename - ключевое слово для поиска названия папки
 *
 */
function getListDir($dirname, $filename)
{
    $array = scandir($dirname);
    $error = [];
    $error[] = false; //первый элемент - статус ошибки

    if ($filename) {
        $buffer = []; //массив для искомых файлов

        foreach ($array as $val) {
            if (mb_stristr($val, $filename)) { //если в $val есть подстрока $filename
                $buffer[] = $val;
            }
        }

        if (!empty($buffer)) {
            return $buffer;
        } else {
            $error[] = "Нет совпадений";
            return $error;
        }
    } else {
        return scandir($dirname);
    }
}


/**
 * @param $dirname
 * @param string $filename
 * @return array|string
 * Ф-ция возвращает массив с названием папок в директории $dirname
 * $filename - ключевое слово для поиска названия папки
 * также ф-ция обрабатывает ошибки
 */
function listDir($dirname, $filename = "")
{
    $error = [];
    $error[] = false; //первый элемент - статус ошибки
    $dirname = trim($dirname); //обрезаем пробелы спереди и сзади
    $filename = trim($filename);

    switch ($dirname) {
        case false:
            $error[] = "Некорректное название директории"; //второй элемент - название ошибки
            return $error;
        case is_dir($dirname):
            return getListDir($dirname, $filename);
        default:
            $error[] = "Директории \"$dirname\" не существует"; //второй элемент - название ошибки
            return $error;
    }
}