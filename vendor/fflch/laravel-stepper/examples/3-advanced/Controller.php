<?php

use App\Http\Controllers\Controller as BaseController;
use AdvancedStepper;

class Controller extends BaseController
{
    public function index(AdvancedStepper $stepper)
    {
        $stepper->setCurrentStepName('step 3');

        return $this->view('example', [
            'stepper' => $stepper->render()
        ]);
    }
}
