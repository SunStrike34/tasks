<?php
include_once 'dataProcessing.php'; // обработка
include_once 'dataOutput.php'; // выдача
function CreateTable() : void {
    $data = [
        ['Иванов', 'Математика', 5],
        ['Иванов', 'Математика', 4],
        ['Иванов', 'Математика', 5],
        ['Петров', 'Математика', 5],
        ['Сидоров', 'Физика', 4],
        ['Иванов', 'Физика', 4],
        ['Петров', 'ОБЖ', 4]
    ];
    $names = BuildTable($data); // получает [Иванов] = [1] Математика...
    $clean_Data_set = CleanData($data); // очищаем от дубликатов
    $grade = GetGrade($names, $clean_Data_set); // получает баллы для каждого студента по каждому предмету, заменяя название предметов на баллы
    $headers = GetHeaders($data); // получает название столбцов
    RenderColumnLabels($headers); // вывод столбцов
    RenderRows($grade); // вывод строк
}
CreateTable();
?>





    
    


