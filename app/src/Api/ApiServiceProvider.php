<?php namespace Api;

use Illuminate\Support\ServiceProvider;
use Api\Services\Validator;
use Api\Services\Response;


class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind('apiValidator', function($app)
        {
            return new Validator();
        });

        $this->app->bind('apiResponse', function($app)
        {
            return new Response();
        });

        $this->includes();
    }

    public function includes(){
         include 'filters.php';
        include 'routes.php';
    }

}
