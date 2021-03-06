<?php

/*
    Must have an access token to use the API
        Other filters have been made for group checking
*/
Route::group(['prefix' => 'api', 'namespace' => 'Api\Controllers'], function()
{

    Route::get('app-config.js', 'MainController@appConfig');
    
    Route::post('projects/store', 'ProjectsController@store');

    Route::resource('projects', 'ProjectsController');
    Route::resource('clients', 'ClientsController');

});

