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

    'facebook' => [
    'client_id' => '162648080920566',
    'client_secret' => 'de1e779af4b15211506b657711ae65ab',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],


    'google' => [
    'client_id' => '49120842141-f3umk6curo6i102b70k5kh0a3k7ns01h.apps.googleusercontent.com',
    'client_secret' => 'X0kT9sWModRQVs0q1GgJ5ZCE',
    'redirect' => 'http://localhost:8000/auth/google/callback',
    ],


    'twitter' => [
    'client_id' => 'bI2AGfqroeGuZMFZl4bv0EdI4',
    'client_secret' => '3yohjzjMGm9vrKNbLlRmIW99lnYVOEl2dfh61I86NmwX6UjUtK',
    'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],

];
