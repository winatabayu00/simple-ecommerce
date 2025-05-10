<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Preloads
    |--------------------------------------------------------------------------
    | String of class name that instance of \Dentro\Yalr\Contracts\Bindable
    | Preloads will always been called even when laravel routes has been cached.
    | It is the best place to put Rate Limiter and route binding related code.
    */

    'preloads' => [
        App\Http\Routes\RouteModelBinding::class,
        App\Http\Routes\RouteRateLimiter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Router group settings
    |--------------------------------------------------------------------------
    | Groups are used to organize and group your routes. Basically the same
    | group that used in common laravel route.
    |
    | 'group_name' => [
    |     // laravel group route options can contains 'middleware', 'prefix',
    |     // 'as', 'domain', 'namespace', 'where'
    | ]
    */

    'groups' => [
        'web' => [
            'middleware' => 'web',
            'prefix' => '',
        ],
        'admin' => [
            'middleware' => ['web', 'auth'],
            'prefix' => 'admin',
            'as' => 'admin.',
        ],
        'app' => [
            'middleware' => ['web', 'auth'],
            'prefix' => '',
        ],
        'api' => [
            'middleware' => 'api',
            'prefix' => 'api',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    | Below is where our route is loaded, it read `groups` section above.
    | keys in this array are the name of route group and values are string
    | class name either instance of \Dentro\Yalr\Contracts\Bindable or
    | controller that use attribute that inherit \Dentro\Yalr\RouteAttribute
    */

    'web' => [
        /** @inject web * */
        App\Http\Routes\DefaultRoute::class,
        \App\Http\Controllers\Authentication\LoginController::class,
        \App\Http\Controllers\App\HomeController::class,
        \App\Http\Controllers\App\AboutUsController::class,
        \App\Http\Controllers\App\ProductController::class,
    ],
    'api' => [
        /** @inject api **/
    ],
    'admin' => [
        \App\Http\Controllers\Admin\DashboardController::class,
        \App\Http\Controllers\Admin\ProductController::class,
        \App\Http\Controllers\Admin\UserController::class,
        \App\Http\Controllers\Admin\OrderController::class,
        /** @inject admin **/
    ],
    'app' => [
        \App\Http\Controllers\App\CartController::class,
        \App\Http\Controllers\App\CheckoutController::class,
        \App\Http\Controllers\App\OrderController::class,
        \App\Http\Controllers\App\RatingController::class,
        /** @inject app **/
    ],
];
