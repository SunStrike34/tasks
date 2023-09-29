<?php

function validateUserRequest(array $request) : bool | string
{
    if (empty((string)$request['author']) && !is_null($request['author'])) {
        return false;
    }

    if (empty((string)$request['comment']) && !is_null($request['comment'])) {
        return false;
    }

    return true;
}
