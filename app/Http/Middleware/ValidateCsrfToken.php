<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken as Middleware;

class ValidateCsrfToken extends Middleware
{
    /**
     * URIs that should be excluded from CSRF verification.
     */
    protected $except = [
        'addcart/*',
    ];
}