<?php

/**
 * Laravel IDE Helper - Auth Facade
 * 
 * This file provides type hints for Laravel's Auth facade methods
 * to help IDEs like PHPStorm and Intelephense understand the methods.
 */

namespace Illuminate\Support\Facades {
    /**
     * @method static \App\Models\User|null user()
     * @method static int|null id()
     * @method static bool check()
     * @method static bool guest()
     * @method static \App\Models\User authenticate()
     * @method static bool validate(array $credentials = [])
     * @method static bool attempt(array $credentials = [], bool $remember = false)
     * @method static bool once(array $credentials = [])
     * @method static void login(\App\Models\User $user, bool $remember = false)
     * @method static \App\Models\User loginUsingId(mixed $id, bool $remember = false)
     * @method static bool onceUsingId(mixed $id)
     * @method static bool viaRemember()
     * @method static void logout()
     */
    class Auth extends Facade {}
}

/**
 * Global auth() helper function
 */
if (!function_exists('auth')) {
    /**
     * Get the available auth instance.
     *
     * @param  string|null  $guard
     * @return \Illuminate\Contracts\Auth\Factory|\Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    function auth($guard = null) {}
}
