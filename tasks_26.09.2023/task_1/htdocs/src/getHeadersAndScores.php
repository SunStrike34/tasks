<?php

function getHeadersAndScores(array $studens) : array
{
    foreach ($studens as $row) {
        $nameRows[] = $row[FULLNAME_COLUMN_ID];
        $subjectColumns[] = $row[SUBJECT_COLUMN_ID];
    }

    $nameRows = array_unique($nameRows);
    $subjectColumns = array_unique($subjectColumns);
    array_multisort($nameRows, SORT_ASC, SORT_STRING);// фамилии по алфавиту
    array_multisort( $subjectColumns, SORT_ASC, SORT_STRING);// предметы по алфавиту
    $nameRows = array_fill_keys($nameRows, $subjectColumns);// [Иванов]=> Array([0]=> Математика, [1]=> ОБЖ, ...

    foreach ($nameRows as $fullName => &$value) {
        for ($i=0; $i < count($studens); $i++) {
            if ($fullName == $studens[$i][FULLNAME_COLUMN_ID]) { // если имя совпадает
                for ($j=0; $j < count($value); $j++) {
                    if ($value[$j] == $studens[$i][SUBJECT_COLUMN_ID]) { // если предмет совпадает
                        $value[$j] = $studens[$i][GRAD_COLUMN_ID]; // вставляем, вместо названия предмета, оценку
                    } 
                }
            } 
        }
    }

    foreach ($nameRows as &$row) {
        for ($i=0; $i < count($row); $i++) {
            if (is_string($row[$i])) {
                $row[$i] = '';// там где нет оценки, то есть осталось название предмета, вставляем пустую строку
            }
        }
    }

    return ['headers' => $subjectColumns, 'studens' => $nameRows];
}
