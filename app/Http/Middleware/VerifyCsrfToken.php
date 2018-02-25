<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
     
      '/API/users/login',
      '/API/users/create',
      '/API/orders/create',
      '/API/users/reloaddata',
      '/API/users/usersetting',
      '/API/users/resetpassword'
   
    ];
}
