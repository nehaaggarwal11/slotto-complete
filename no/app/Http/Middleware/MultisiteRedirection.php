<?php

namespace App\Http\Middleware;

use Closure;

class MultisiteRedirection
{
    public function handle($request, Closure $next)
    {
        //nj_set_current_country_site();
       // return $next($request);
    }
}
