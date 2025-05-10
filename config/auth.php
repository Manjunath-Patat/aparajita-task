<?php

use App\Models\User;
use App\Models\Admin; // Make sure this line is present

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset "broker" for your application's users. You may change these
    | defaults as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Each authentication guard defines how users are authenticated for your
    | application. This array should contain each of the guards you have
    | configured, as well as the driver they should use.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins', // Ensure this is 'admins'
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => 'sha256',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],


        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, // Ensure this is App\Models\Admin::class
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model. Each reset configuration has a name
    | and the related user provider that should be used.
    |
    | The support for password resets is built on top of Laravel's existing
    | user providers / models. You should define users as if they were one
    | single model while supporting multiple user tables with the same
    | UI.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password.
    |
    */

    'password_timeout' => 10800,

];