<?php
require_once 'src/core.php';

$text = [];
$textInTheFormOfArray = [];

$textInTheFormOfArray = splitedText(getString()); // получаем текст и разбиваем на массив символов
$text = implodedText(truncateText($textInTheFormOfArray)); // обрезаем массив символов до 29 слов и объединяем в одну строку
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обрезанный текст</title>
</head>
<body>
    <div>
        <?=$text // (Родина-мать одно слово, числа за слова не считаются, исключение: "2-е", так же считаются "в", "по" и "г.")?>
    </div>
</body>
</html>