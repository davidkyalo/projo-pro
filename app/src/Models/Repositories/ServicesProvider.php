<?php 

namespace Models\Repositories;

use Models\Entities\Project;
use Models\Entities\Client;
use Models\Entities\JsAsset;
use Models\Entities\CssAsset;
use Models\Entities\AssetFile;


use Illuminate\Support\ServiceProvider as BaseServiceProvider;


class ServiceProvider extends BaseServiceProvider 
{
    public function register()
    {
        $this->app->bind('projectsRepo', function($app)
        {
            return new ProjectsRepository( new Project );
        });

        $this->app->bind('clientsRepo', function($app)
        {
            return new ClientsRepository( new Client );
        });

        $this->app->bind('jsAssetsRepo', function($app)
        {
            return new JsAssetsRepository( new JsAsset );
        });

        $this->app->bind('cssAssetsRepo', function($app)
        {
            return new CssAssetsRepository( new CssAsset );
        });

        $this->app->bind('assetFilesRepo', function($app)
        {
            return new AssetFilesRepository( new AssetFile );
        });
    }
}