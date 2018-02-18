<form method="POST">
    <label>Введите название директориии:<input type="text" name="dir" value="<?=$dir?>"></label>
    <br>
    <label>Введите искомое слово:<input type="text" name="filename" value="<?=$filename?>"></label>
    <br>
    <?php include("./common_content/submit.php") ?>
</form>