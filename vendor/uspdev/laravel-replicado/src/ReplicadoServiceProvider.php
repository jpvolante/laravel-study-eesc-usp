<?php

namespace Uspdev\LaravelReplicado;

use Illuminate\Support\ServiceProvider;
use Uspdev\Replicado\Replicado;

class ReplicadoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'replicado');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('replicado.php'),
            ], 'config');
        }

        // aplica a configuração do replicado
        Replicado::setConfig(config('replicado'));

    }
}
