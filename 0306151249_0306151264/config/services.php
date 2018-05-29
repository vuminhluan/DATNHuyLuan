<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'google' => [
        'client_id' => '593047338331-b7fn8l5f78pe4084i9hpkes4ou66m0sv.apps.googleusercontent.com',// Your GitHub Client ID
        'client_secret' => 'rmVVfTwCOOaI77wPrRSLg8rw', // Your GitHub Client Secret
        'redirect' => 'http://localhost/DATNHuyLuan/0306151249_0306151264/public/dangnhap/google/callback',
    ],

];
