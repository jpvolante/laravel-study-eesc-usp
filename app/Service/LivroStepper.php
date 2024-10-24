<?php

namespace App\Service;

use Axn\LaravelStepper\Stepper;
use App\Models\Livro;

class LivroStepper extends Stepper
{
    protected $view = 'laravel-fflch-stepper::main';
    public function register()
    {
        foreach(Livro::status as $status){
            $this->addStep($status);
        }
        
    }
}