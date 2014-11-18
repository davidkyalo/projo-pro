<?php namespace Api;

use Illuminate\Support\ServiceProvider;


class ApiServiceProvider extends ServiceProvider
{

    public function register()
    {
        include 'filters.php';
        include 'routes.php';
    }

    public function boot()
    {
        
    }
}
