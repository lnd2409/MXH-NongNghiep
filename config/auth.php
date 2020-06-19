<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
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
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],

        //Xác thực dành cho nông dân
        'nongdan' => [
            'driver' => 'session',
            'provider' => 'nongdan',
        ],
        'nongdan-api' => [
            'driver' => 'token',
            'provider' => 'nongdan',
        ],
        //Xác thực dành cho thương lái
        'thuonglai' => [
            'driver' => 'session',
            'provider' => 'thuonglai',
        ],
        'thuonglai-api' => [
            'driver' => 'token',
            'provider' => 'thuonglai',
        ],

        //Xác thực dành cho chuyên gia
        'chuyengia' => [
            'driver' => 'session',
            'provider' => 'chuyengia',
        ],
        'chuyengia-api' => [
            'driver' => 'token',
            'provider' => 'chuyengia',
        ],
        //Xác thực dành cho chuyên gia
        'nccvt' => [
            'driver' => 'session',
            'provider' => 'nccvt',
        ],
        'nccvt-api' => [
            'driver' => 'token',
            'provider' => 'nccvt',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
        'nongdan' => [
            'driver' => 'eloquent',
            'model' => App\NongDan::class,
        ],
        'thuonglai' => [
            'driver' => 'eloquent',
            'model' => App\ThuongLai::class,
        ],
        'chuyengia' => [
            'driver' => 'eloquent',
            'model' => App\ChuyenGia::class,
        ],
        'nccvt' => [
            'driver' => 'eloquent',
            'model' => App\NCCVT::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'nongdan' => [
            'provider' => 'nongdan',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'thuonglai' => [
            'provider' => 'thuonglai',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'chuyengia' => [
            'provider' => 'chuyengia',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'nccvt' => [
            'provider' => 'nccvt',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
