<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les URI qui sont exclues de la vérification CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Tu peux lister ici des routes à exclure si besoin
    ];
}
