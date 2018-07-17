<?php

namespace App\Http\Middleware;

use Closure;

class TestCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //http://127.0.0.1:8000/middleware?id=4

        // $id = $request->query('id', null);
        $id = $request->get('id', null);
        if (is_null($id)){
        // if (!$request->has('id')){
            dd('Não passou no middleware');
        }
        return $next($request);
    }
}
