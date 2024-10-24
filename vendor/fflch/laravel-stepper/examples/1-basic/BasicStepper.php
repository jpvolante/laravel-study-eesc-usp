<?php

use Axn\LaravelStepper\Stepper;

class BasicStepper extends Stepper
{
    public function register()
    {
        $this->addStep('step 1');

        $this->addStep('step 2');

        $this->addStep('step 3');

        $this->addStep('step 4');

        $this->addStep('step 5');
    }
}
