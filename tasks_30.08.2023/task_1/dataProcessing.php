<?php

const GRAD_COLUMN_ID = 2;
const SUBJECT_COLUMN_ID = 1;
const FULLNAME_COLUMN_ID = 0;

function cleanData(array $data) : array {
    $cleanData = $data;
    foreach ($cleanData as $fullName => &$value) {
        for ($i=1; $i < count($data); $i++) { 
            if (($value[FULLNAME_COLUMN_ID] == $data[$i][FULLNAME_COLUMN_ID]) && ($value[SUBJECT_COLUMN_ID] == $data[$i][SUBJECT_COLUMN_ID]) && ($fullName != $data[$fullName])) { // Если фамилия студента и название предмета сопадают,то
                $value[GRAD_COLUMN_ID] =  $value[GRAD_COLUMN_ID] + $data[$i][GRAD_COLUMN_ID]; // складываем значения
                unset($cleanData[$i]); // и удаляем строку с которой сложили
            }else {
                break;
            }
        }
        
    }
    return array_values($cleanData);// переиндексируем массив еще раз
}

function getHeaders(array $cleanData) : array {
    $columns = [];

    foreach ($cleanData as $subjectInData) { // Из массива вытаскивает колонку с предметами и добавлем теги
        $columns[] = "<th>".$subjectInData[SUBJECT_COLUMN_ID]."</th> ";
    }
    $columns = array_unique($columns, SORT_STRING);// очищаем от дубликатов
    array_multisort($columns, SORT_ASC, SORT_STRING);// сортируем по алфавиту

    array_unshift($columns, "<thead><tr><th>Фамилии\Предметы</th>");// добавляем тег в начало
    array_push($columns, "</tr></thead>");// добавляем тег в конец

    return $columns;
}

function getRows(array $cleanDataSet) :string {
    foreach ($cleanDataSet as $column) {
        $rows[] = $column[FULLNAME_COLUMN_ID];
        $columns[] = $column[SUBJECT_COLUMN_ID];
    }
    $rows = array_unique($rows);
    $columns = array_unique($columns);
    array_multisort($rows, SORT_ASC, SORT_STRING);// фамилии по алфавиту
    array_multisort( $columns, SORT_ASC, SORT_STRING);// предметы по алфавиту
    $rows = array_fill_keys($rows, $columns);// [Иванов]=> Array([0]=> Математика, [1]=> ОБЖ, ...

    foreach ($rows as $fullName => &$value) {
        for ($i=0; $i < count($cleanDataSet); $i++) { 
            if ($fullName != $cleanDataSet[$i][FULLNAME_COLUMN_ID]) { // если имя не совпадает
                continue;
            } else{
                for ($j=0; $j < count($value); $j++) { 
                    if ($value[$j] != $cleanDataSet[$i][SUBJECT_COLUMN_ID]) { // если предмет не совпадает
                        continue;
                    } else {
                        $value[$j] = $cleanDataSet[$i][GRAD_COLUMN_ID];// вставляем, вместо названия предмета, оценку
                    }
                }
            }
        }
    }
    
    foreach ($rows as &$row) {
        for ($i=0; $i < count($row); $i++) { 
            if (is_string($row[$i])) {
                $row[$i] = '';// там где нет оценки, то есть осталось название предмета, вставляем пустую строку
            }
        }
    }
    
    $finalRow = "<tbody>"; //Выводим все строки через склейку строк
    foreach ($rows as $fullName => &$subjects) {
        $finalRow.= " <tr><td>$fullName</td>";//вставляем имя
        $sumRow = '';
        foreach ($subjects as $subject) {
            $sumRow .= " <td>$subject</td>";// вставляем предметы
        }
        $finalRow .=$sumRow." </tr>";
    }
    $finalRow .= " <tbody>";
    return $finalRow;
}