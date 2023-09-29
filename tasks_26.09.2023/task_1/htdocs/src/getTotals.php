<?php

function getTotals(array $totals) : array
{
    $cleanTotals = $totals;

    foreach ($cleanTotals as $index => &$value) {
        for ($i=1; $i < count($totals); $i++) { 
            if (($value[FULLNAME_COLUMN_ID] == $totals[$i][FULLNAME_COLUMN_ID]) && ($value[SUBJECT_COLUMN_ID] == $totals[$i][SUBJECT_COLUMN_ID]) && ($index != $totals[$index])) { // Если фамилия студента и название предмета сопадают,то
                $value[GRAD_COLUMN_ID] += $totals[$i][GRAD_COLUMN_ID]; // складываем значения
                unset($cleanTotals[$i]); // и удаляем строку с которой сложили
            }else {
                break;
            }
        }
    }

    return array_values($cleanTotals);// переиндексируем массив еще раз
}
