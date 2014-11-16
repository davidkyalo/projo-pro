<?php 

namespace PRP\Repositories;

use PRP\Entities\Project;
use PRP\Entities\JsAsset;
use PRP\Entities\CssAsset;
use PRP\Entities\AssetFile;


use Illuminate\Support\ServiceProvider as BaseServiceProvider;


class ServiceProvider extends BaseServiceProvider 
{
    public function register()
    {
        $this->app->bind('projectsRepo', function($app)
        {
            return new ProjectsRepository( new Project );
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