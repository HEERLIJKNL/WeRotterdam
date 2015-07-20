<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateAdmin {

	/**
	 * @var
     */
	protected $auth;


	/**
	 * @param Guard $auth
     */
	public function __construct(Guard $auth){
		$this->auth = $auth;
	}
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
			return redirect()->guest('auth/login');

		if($this->auth->user()->role != "admin"){
			$this->auth->logout();
			return redirect()->guest('auth/login');
		}

		return $next($request);
	}

}
