<?php

namespace RamiAwadallah\Helpers;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (class_exists(\App\Setting::class)
           && class_exists(\App\Language::class)
           && class_exists(\App\Lang::class)
           && class_exists(\App\Image::class)) 
        {
            $this->allFilesInPath(__DIR__.'/../helpers/src');
        }
        $this->loadViewsFrom(__DIR__.'/../Views','Helper');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
        __DIR__.'/../publish/Controllers/' => app_path('Http/Controllers')
        ], 'controller');

        $this->publishes([
        __DIR__.'/../publish/Template/' => app_path('Template')
        ], 'template');

        $this->publishes([
        __DIR__.'/../publish/Presenters/' => app_path('Presenters')
        ], 'presenters');


        $this->publishes([
        __DIR__.'/../publish/View/' => app_path('View')
        ], 'view');

        $this->publishes([
        __DIR__.'/../publish/Helpers/' => app_path('Helpers')
        ], 'helpers');

        $this->publishes([
        __DIR__.'/../publish/config/cms.php' => base_path('config/cms.php')
        ], 'cms');


        $this->publishes([
        __DIR__.'/../publish/Model.php' => base_path('vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php')
        ], 'model');

        $this->publishes([
        __DIR__.'/../publish/RamiAwadallahHelpers.php' => app_path('Http/Variables/shareVariables.php')
        ], 'variables');
        
        
        $this->publishes([
        __DIR__.'/../publish/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
        __DIR__.'/../publish/Models/' => app_path()
        ], 'models');

        $this->publishes([
        __DIR__.'/../publish/Seeder/' => database_path('seeds')
        ], 'seeds');

        $this->publishes([
        __DIR__.'/../publish/middleware/' => app_path('Http/Middleware')
        ], 'middlewares');

        $this->publishes([
        __DIR__.'/../publish/console/' => app_path('Console')
        ], 'console');

        $this->publishes([
        __DIR__.'/../publish/lang/' => base_path('resources/lang')
        ], 'lang');

        $this->publishes([
        __DIR__.'/../publish/public/' => public_path()
        ], 'public');

        $this->publishes([
        __DIR__.'/../publish/views/' => base_path('resources/views')
        ], 'views');
        
        $this->publishes([
        __DIR__.'/../publish/bootstrap3.blade.php' => base_path('vendor/davejamesmiller/laravel-breadcrumbs/views/bootstrap3.blade.php')
        ], 'bootstrap3');



    }
    public function allFilesInPath($path)
    {
        $dir = scandir($path);
            for ($i=2; $i <count($dir); $i++) 
            {
                $data =  $path.'/'.$dir[$i];
                if (is_dir($data)) 
                {
                    $this->allFilesInPath($data);
                }elseif(is_file($data))
                {
                     include_once $data;
                }
            }
    }
}
