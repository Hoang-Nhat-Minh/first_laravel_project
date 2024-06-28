<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1488467188393226',
        'client_secret' => '728a37fac8172e28d34c9bb9dc771452',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '871681832087-gclhanrk2gifh3kv3q2ka1pdshdrqk3m.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
