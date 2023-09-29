<?php
require_once 'src/core.php';

$students = getTotals(getStudents()); // получаем массив студентов с оценками и удаляем повторяющиеся
$rows = getHeadersAndScores($students); // получаем массив строк с заголовками и оценками студентов
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <title>Таблица оценок</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Фамилии\Предметы</th>
                <?php foreach ($rows['headers'] as $header) {?>
                    <th><?=$header?> </th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows['studens'] as $name => $scores) {?>
            <tr>
                <td><?=$name?></td>
                <?php foreach ($scores as $score) {?>
                        <td><?=$score?></td>
                <?php }?>
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>