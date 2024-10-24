<?php

namespace Fflch\LaravelFflchStepper;

use Illuminate\Support\ServiceProvider;

class LaravelFflchStepperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->loadViews();
        $this->publishAssets();
        $this->publishConfig();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function packagePath($path){
        return __DIR__."/../$path";
    }

    private function loadViews(){
        $viewsPath = $this->packagePath('resources/views');
        $this->loadViewsFrom($viewsPath, 'laravel-fflch-stepper');
        $this->publishes([
            $viewsPath => base_path('resources/views/vendor/laravel-fflch-stepper'),
        ], 'views');
    }

    private function publishAssets(){
        $this->publishes([
            $this->packagePath('resources/assets') => public_path('vendor/laravel-fflch-stepper'),
        ], 'assets');
    }

    private function publishConfig(){
        $this->publishes([
            $this->packagePath('config/laravel-fflch-stepper.php') => config_path('laravel-fflch-stepper.php'),
        ], 'config');
    }

}
