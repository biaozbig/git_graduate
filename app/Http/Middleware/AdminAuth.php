<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Request;

class AdminAuth
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeParts = explode('.', Request::route()->getName());

        if (Auth::check()) {

            if (empty($routeParts[0])  || empty($routeParts[1]) || $routeParts[1] != 'admin') {
                return abort(403, 'Not a  admin route');
            }

            $controller = !empty($routeParts[2]) ? $routeParts[2] : null;
            $action = !empty($routeParts[3]) ? $routeParts[3] : null;
            $parameters = $request->route()->parameters();

            if (Auth::actionRoute($controller, $action, $parameters)) {
                return $next($request);
            } elseif (Auth::admin()) {
                return abort(403, 'Action not permitted');
            }
        }

        return \redirect()->route('admin.login')->withCookie(cookie('login_path', $request->getRequestUri()));
    }

}

