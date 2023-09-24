<?php

function arraySort(array $array, string $key = 'sort', int $sort = SORT_ASC): array
{
    usort($array, (function ($sectionFirst, $sectionSecond) use ($key, $sort) {
        $result = ($sectionFirst[$key] == $sectionSecond[$key]) ? 0 : (($sectionFirst[$key] > $sectionSecond[$key]) ? 1 : -1);

        if ($sort == SORT_ASC) {
            return -$result;
        } else {
            return $result;
        }
    }));
    return $array;
}
