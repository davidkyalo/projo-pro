<?php 

namespace Models\Repositories;

use Models\Entities\Project;
use Models\Entities\Client;
use Models\Entities\JsAsset;
use Models\Entities\CssAsset;
use Models\Entities\AssetFile;

use Models\Entities\ToDoCategory;
use Models\Entities\ProjectMilestone;
use Models\Entities\ToDoTask;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;


class ServiceProvider extends BaseServiceProvider 
{
    public function register()
    {
        $this->app->bind('ProjectsRepo', function($app)
        {
            return new ProjectsRepository( new Project );
        });

        $this->app->bind('ClientsRepo', function($app)
        {
            return new ClientsRepository( new Client );
        });

        $this->app->bind('JsAssetsRepo', function($app)
        {
            return new JsAssetsRepository( new JsAsset );
        });

        $this->app->bind('CssAssetsRepo', function($app)
        {
            return new CssAssetsRepository( new CssAsset );
        });

        $this->app->bind('AssetFilesRepo', function($app)
        {
            return new AssetFilesRepository( new AssetFile );
        });

        $this->app->bind('ToDoCategoriesRepo', function($app)
        {
            return new ToDoCategoriesRepository( new ToDoCategory );
        });

        $this->app->bind('ProjectMilestonesRepo', function($app)
        {
            return new ProjectMilestonesRepository( new ProjectMilestone );
        });

        $this->app->bind('ToDoTasksRepo', function($app)
        {
            return new ToDoTasksRepository( new ToDoTask );
        });
    }
}