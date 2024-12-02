<?php

function isProduction(): bool
{
    return env('APP_ENV') != 'local';
}