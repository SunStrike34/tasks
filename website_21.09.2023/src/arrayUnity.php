<?php

function arrayUnity(array $arrayUser, array $arrayData): array
{
    $arrayUnity = [];

    foreach ($arrayData as $index => $item) {
        foreach ($arrayUser as $key => $value) {
            if (($item['value'] == $key)) {
                $arrayUnity[$item['title']] = $value;
            }
        }
    }

    return $arrayUnity;
}
