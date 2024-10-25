<?php

namespace App\Providers;

use App\Models\Center;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        // View::composer('layouts.navbar',function ($view){
        //     $centers = Center::all();
        //     $view->with('centers',$centers);
        // });

        
    }
}
