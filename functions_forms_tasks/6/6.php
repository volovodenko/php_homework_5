<?php
/**
 * Создать страницу, на которой можно загрузить несколько фотографий в галерею.
 * Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.
 */
include("./common_functions/getPOST.php");
include("./common_functions/getFile.php");
include("./6/viewImage.php");
include("./6/uploadFile.php");

$dirGallery = "./6/gallery/";
$fileName = getFile("filename");

if (getPost("submit")) {
   uploadFile($fileName, $dirGallery);
}
viewImage($dirGallery);
?>
<?php include("./6/content6.php") ?>
