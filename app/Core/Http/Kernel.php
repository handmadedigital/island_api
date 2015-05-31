<?php namespace ThreeAccents\Core\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'ThreeAccents\Core\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'ThreeAccents\Core\Http\Middleware\RedirectIfAuthenticated',
		'csrf' => 'ThreeAccents\Core\Http\Middleware\VerifyCsrfToken',
		'jwt.auth' => 'Tymon\JWTAuth\Middleware\GetUserFromToken',
		'jwt.refresh' => 'Tymon\JWTAuth\Middleware\RefreshToken',
	];

}
