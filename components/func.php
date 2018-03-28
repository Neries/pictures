<?php

function session($key, $value = null) {
    if (!is_null($value)) $_SESSION[$key] = $value;

    return $_SESSION[$key] ?? null;


}