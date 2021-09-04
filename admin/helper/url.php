<?php

function base_url($url = "")
{
    global $config;
    return $config['base_url'] . $url;
}

function redirect($url)
{
    $path = "$url";
    header("Location: $path");
}
