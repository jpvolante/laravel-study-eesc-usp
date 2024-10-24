<?php

use Axn\LaravelStepper\Stepper;

class AdvancedStepper extends Stepper
{
    protected $view = 'stepper::advanced';

    public function register()
    {
        $step1 = $this->addStep('step-1');
        $step1->setUrl('/step-1');
        $step1->settitle('Étape 1');
        $step1->setDescription('Description de l’étape 1.');

        $this->addStep('step-2')
            ->setUrl('/step-2')
            ->settitle('Étape 2')
            ->setDescription('Description de l’étape 2.')
        ;

        $this->addStep('step-3')
            ->setUrl('/step-3')
            ->settitle('Étape 3')
            ->setDescription('Description de l’étape 3.')
        ;

        $this->addStep('step-4')
            ->setUrl('/step-4')
            ->settitle('Étape 4')
            ->setDescription('Description de l’étape 4.')
        ;

        $this->addStep('step-5')
            ->setUrl('/step-5')
            ->settitle('Étape 5')
            ->setDescription('Description de l’étape 5.')
        ;
    }
}
