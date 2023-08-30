<?php
include_once 'dataProcessing.php'; // обработка
include_once 'dataOutput.php'; // выдача
function createTable() : void {
    $data = [
        ['Иванов', 'Математика', 5],
        ['Иванов', 'Математика', 4],
        ['Иванов', 'Математика', 5],
        ['Петров', 'Математика', 5],
        ['Сидоров', 'Физика', 4],
        ['Иванов', 'Физика', 4],
        ['Петров', 'ОБЖ', 4]
    ];
    $cleanDataSet = cleanData($data); // очищаем от дубликатов
    $headers = getHeaders($cleanDataSet); // получает название столбцов
    renderColumnLabels($headers); // вывод столбцов
    $rows = getRows($cleanDataSet); // получает строки
    renderRows($rows); // вывод строк
}
?>





    
    


