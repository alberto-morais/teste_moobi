<?php

function base_url($url = ''): string
{
    return getenv('BASE_URL'). $url;
}


function redirect($url):void
{
    header("Location: " . base_url($url));
}


function getURI():string
{
    $URI = $_SERVER['REQUEST_URI'];
    $base = getenv('DOMAIN');
    $base = explode('/', $base);
    $base[] = '//';
    $URI = str_replace($base,'', $URI);

    return !empty($URI) ? $URI : '/';
}