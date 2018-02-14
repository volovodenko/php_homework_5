<?php
/**
 * Создать страницу, на которой можно загрузить несколько фотографий в галерею.
 * Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.
 */

function viewImage() {
    $arrayDir = scandir("./6/gallery");
    $arrayFile = array_diff($arrayDir, [".", ".."]);

    echo "<div class='images'>";
    array_walk($arrayFile, function($val) {
        echo "<img src='./6/gallery/". $val ."'>";
    });
    echo "</div><hr><br>";
}

function uploadFile() {
    if ($_FILES["filename"]) {
        $filename = $_FILES["filename"]["name"];
        $uploaddir = "./6/gallery/";
        $uploadfile = $uploaddir.uniqid().basename($filename);//директория/хеш+название файла

        if (!copy($_FILES["filename"]["tmp_name"], $uploadfile)) {
            echo "Ошибка! Не удалось загрузить файл!";
        }
    }
}

if (@$_POST["submit"]) {
   uploadFile();
}
viewImage();
?>
<form method="POST" enctype="multipart/form-data" action="./load.php?task=6&dir=6">
    <label>Выберите файл<input type="file" name="filename" required></label>
    <br>
    <input type="submit" name="submit" value="Отправить">
</form>