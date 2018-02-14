<?php
/*
 * Файл загрузки заданий
 */
$taskNumber = $_GET['task'];
$fileName = $taskNumber . ".php";

if (@$_GET["dir"]) {
    $dirName = "./" . $_GET["dir"] . "/";
} else {
    $dirName = "./";
}

$fileName = $dirName . $fileName;

$Data = file_get_contents("$fileName");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Задание №<?=$taskNumber?></title>
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <header>
        <h2>Задание №<?=$taskNumber?></h2>
        <a href="/">&lt;&lt; На главную</a>
        <section class="code">
        <?php
            echo highlight_string($Data, true);
        ?>
        </section>
    </header>
    <br>
    <main>
        <p><b>Результат выполнения:</b></p>
        <section class="code">
            <?php
                include "$fileName";
            ?>
        </section>
    </main>
</body>
</html>

