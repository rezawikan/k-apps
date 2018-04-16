<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmptyParams
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $query = $request->all();
        $querycount = count($query);
        foreach ($query as $key => $value) {
            if ($value == '') {
                unset($query[$key]);
            }
        }

        // if ($querycount > count($query)) {
        //     if (class_basename(url()->current()) == 'impact-tracker') {
        //       $path = url()->current() . (!empty($query) ? '/?' . http_build_query($query) : '');
        //       return redirect()->to($path);
        //     }
        // }

        return $next($request);
    }
}
