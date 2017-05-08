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

            if (empty($routeParts[0])  || empty($routeParts[1]) || $routeParts[0] != 'admin') {
                return abort(403, 'Not a  admin route');
            }

            $controller = !empty($routeParts[1]) ? $routeParts[1] : null;
            $action = !empty($routeParts[2]) ? $routeParts[2] : null;
            $parameters = $request->route()->parameters();
            return $next($request);
            /*if (Auth::actionRoute($controller, $action, $parameters)) {
                return $next($request);
            } elseif (Auth::admin()) {
                return abort(403, 'Action not permitted');
            }*/
        }
        $request_uri = $request->getRequestUri();

        return \redirect()->route('admin.login')->withCookie(cookie('login_path', $request->getRequestUri()));
    }

}

