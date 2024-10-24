<?php

use App\Http\Controllers\Controller as BaseController;
use BasicStepper;

class Controller extends BaseController
{
    public function index(BasicStepper $stepper)
    {
        $stepper->setCurrentStepName('step 3');

        return $this->view('example', [
            'stepper' => $stepper->render()
        ]);
    }
}
