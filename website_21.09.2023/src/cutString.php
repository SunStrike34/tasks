<?php

function cutString(string $line, int $length = 12, string $appends = '...'): string
{
    if (count(mb_str_split($line, 1)) > $length) {
        $line = mb_substr($line, 0, $length) . $appends;
    }

    return $line;
}
