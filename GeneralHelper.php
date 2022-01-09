<?php

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {

            //if (auth()->user()->can('view backend')) {
                
            if (auth()->user()->hasRole('administrator')) {
                return 'admin.dashboard';
            }

            /*if($user->complete == 0 && $user->hasRole('influencer')){
            
                return redirect()->route('frontend.user.profile.completa');
             
            }

            if($user->complete == 0 && $user->hasRole('brand')){
            
                return redirect()->route('frontend.user.brand.edit');
             
            }*/

             return 'frontend.user.spiderfeed';
        }

        return 'frontend.index';
    }
}
