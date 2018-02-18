<form method="POST">
    <textarea class="textarea" name="textarea1" placeholder="Введите текст"><?= $string1 ?></textarea>
    <textarea class="textarea" name="textarea2" placeholder="Введите текст"><?= $string2 ?></textarea>
    <br>
    <?php include("./common_content/submit.php") ?>
</form>