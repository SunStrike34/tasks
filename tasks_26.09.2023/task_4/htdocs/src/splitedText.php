<?php

function splitedText(string $text) : array
{
    return mb_str_split($text, 1);
}
