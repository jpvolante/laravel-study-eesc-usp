<?php

use Axn\LaravelStepper\Stepper;

class ArrowsStepper extends Stepper
{
    protected $view = 'stepper::arrows';

    public function register()
    {
        $this->addStep('step 1');

        $this->addStep('step 2');

        $this->addStep('step 3');

        $this->addStep('step 4');

        $this->addStep('step 5');
    }
}
