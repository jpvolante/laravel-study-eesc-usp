<?php

use App\Http\Controllers\Controller as BaseController;
use ArrowsStepper;

class Controller extends BaseController
{
    public function index(ArrowsStepper $stepper)
    {
        $stepper->setCurrentStepName('step 3');

        return $this->view('example', [
            'stepper' => $stepper->render()
        ]);
    }
}
