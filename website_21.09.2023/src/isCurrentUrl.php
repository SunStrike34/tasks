<?php

function isCurrentUrl(string $url) : bool
{
    return $url === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}
