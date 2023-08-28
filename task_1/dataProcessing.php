<?php

const STUDENT_NAME_COLUMN_ID = 0;

function BuildTable(array $data) : array {
    foreach ($data as $value) {
        $rows[] = $value[0];
        $columns[] = $value[1];
    }
    $rows = array_values(array_unique($rows));
    $columns = array_values(array_unique($columns));
    array_multisort($columns, SORT_ASC, SORT_STRING, $rows, SORT_ASC, SORT_STRING);
    return array_fill_keys($rows, $columns);
}

function CleanData(array $data) : array {
    $cleanData = $data;
    foreach ($cleanData as $key => &$value) {
        for ($i=1; $i < count($data); $i++) { 
            if (($value[0] == $data[$i][0]) && ($value[1] == $data[$i][1]) && ($key != $data[$key])) {
                $value[2] =  $value[2] + $data[$i][2];
                unset($cleanData[$i]);
            }else {
                break;
            }
        }
    }
    return array_values($cleanData);
}

function GetGrade(array $names, array $clean_Data_set) : array {
    foreach ($names as $key => &$value) {
        for ($i=0; $i < count($clean_Data_set); $i++) { 
            if ($key != $clean_Data_set[$i][0]) { 
                continue;
            } 
            for ($j=0; $j < count($value); $j++) { 
                if ($value[$j] != $clean_Data_set[$i][1]) {
                    continue;
                } else {
                    $value[$j] = $clean_Data_set[$i][2];
                }
            }
        }
    }
    ksort($names, SORT_STRING);
    return $names;
}

function GetHeaders(array $data) : array {  
    foreach ($data as $value) {
        $columns[] = $value[STUDENT_NAME_COLUMN_ID];
    }
    $columns = array_values(array_unique($columns));
    array_multisort($columns, SORT_ASC, SORT_STRING);
    return $columns;
}