<?php

namespace Fflch\LaravelFflchStepper;

use Axn\LaravelStepper\Stepper as LaravelStepper;

class Stepper extends LaravelStepper
{
    protected $view = 'laravel-fflch-stepper::main';

    public function register()
    {
        $steps = config('laravel-fflch-stepper.steps');
        foreach($steps as $key=>$value){
            $this->addStep($key);
        }
    }
}