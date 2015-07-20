<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_LD_CONNECTION', 'landesk')

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_ARTISAN_HOST', 'localhost'),
            'port'      => env('DB_ARTISAN_PORT', 3306),
            'database'  => env('DB_ARTISAN_DATABASE'),
            'username'  => env('DB_ARTISAN_USERNAME'),
            'password'  => env('DB_ARTISAN_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => env('DB_ARTISAN_PREFIX'),
            'timezone'  => env('DB_ARTISAN_TIMEZONE','+00:00'),
            'strict'    => false,
        ],

        'webnav' => [
            'driver'    => 'mysql',
            'host'      => env('DB_WN_HOST', 'localhost'),
            'port'      => env('DB_WN_PORT', 3306),
            'database'  => env('DB_WN_DATABASE'),
            'username'  => env('DB_WN_USERNAME'),
            'password'  => env('DB_WN_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => env('DB_WN_PREFIX'),
            'timezone'  => env('DB_WN_TIMEZONE','+00:00'),
            'strict'    => false,
        ],

        'landesk' => [
            'driver'   => 'sqlsrv',
            'host'     => env('DB_LD_HOST'),
            'database' => env('DB_LD_DATABASE'),
            'username' => env('DB_LD_USERNAME'),
            'password' => env('DB_LD_PASSWORD'),
            'prefix'   => env('DB_LD_PREFIX'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

];
