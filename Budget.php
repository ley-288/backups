<?php

namespace App\Http\Middleware;

use Closure;
use Auth,View;
use App\Http\Controllers\Frontend\Crediti\CreditiController;
use App\Http\Controllers\Frontend\Crediti\CoinsController;

class Budget {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        
        $budget = '';

        if (Auth::user()) {
            if (auth()->user()->hasRole('influencer')) {
                $crediti = new CreditiController;
                // STAY COMMENTED $budget = $crediti->budget();
                $budget = 10000;
            }
        }

        //View::share('budget', $budget);
        //return $next($request);
        
        $budget2 = '';

        if (Auth::user()) {
            if (auth()->user()->hasRole('influencer')) {
                $coins = new CoinsController;
                $budget2 = $coins->budget();
                //$budget2 = 10000;
            }
        }

        View::share('budget2', $budget2);
        return $next($request);
    }

}
