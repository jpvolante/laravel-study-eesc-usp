# Laravel Stepper

Package that let you create a progress visualization tool step by step (stepper).

- **Author:** AXN Informatique
- **Website:** [http://www.axn-informatique.com/](http://www.axn-informatique.com/)
- **License:** MIT license (see the license file)
_____________________________________________________________________________________

* [Installation](#installation)
* [Usage](#usage)
* [Personalize the template](#personalize-the-template)
* [Personalize classes](#personalize-classes)


## Installation

To install Laravel Stepper as a Composer package to be used with Laravel 5, simply run:

```
composer require axn/laravel-stepper
```

Once it's installed, the package is automatically registered via Artisan command `package:discover` (Laravel >=5.5).
If not, you must register the service provider in `config/app.php` by adding this line in `providers` section:

```
'Axn\LaravelStepper\ServiceProvider',
```

## Usage

The stepper is going to be used on several pages. There might be several steppers per application, that's why a stepper has to be defined in a dedicated class:  

```php
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
```

What's important about that class :
  - It extends the abscract class : ``Axn\LaravelStepper\Stepper``
  - It's implementing the ``register()`` method
  - It's in that method, that all the different steps are defined

Then, we can inject this class into controller's methods : 

```php
    //...

    public function index(BasicStepper $stepper)
    {
        $stepper->setCurrentStepName('step 3');

        return $this->view('example-view', [
            'stepper' => $stepper->render()
        ]);
    }

    //...
```

Because the class is injected by the IoC container, it's instanciated and the ``register()`` is automatically called. 
After that it's necessary to precise to the stepper which step is the current one : ``$stepper->setCurrentStepName('step 3')``.
Then the rendering of the stepper will be transmitted to the view in which you can simply put : ``{!! $stepper !!}``.

## Personalize the template

### Change the template

This package provides several templates. By default, the template "default" is used.
To use the template "arrows", you need to add to the stepper class the name of the template to use: 

```php
use Axn\LaravelStepper\Stepper;

class BasicStepper extends Stepper
{
    protected $view = 'stepper::arrows';
    //...
}
```

That's it!

Of course, in a very classical way, you can use any view of the template system. For example, to use the template ``resources/views/partials/steppers/custom.blade.php``, put the following code in your class:

```php
use Axn\LaravelStepper\Stepper;

class BasicStepper extends Stepper
{
    protected $view = 'partials.steppers.custom';
    //...
}
```

### Personalize a template

All provided templates are more examples to understand how to use the package rather than production templates. 
For example, CSS styles are embedded in templates, which is not a good practice.

It's possible to start from one of thoose templates provided with the package and to modify them. For that, you have to publish templates, then edit them.

To publish all templates, use the following command: 

```
php artisan vendor:publish
```

After this step, you'll find all templates in ``resources/views/vendor/stepper/``. It will be very easy to edit them depending on your needs.

### Methods in templates

To personalize your templates, different methods are accessible. Here is the list:

#### Stepper class

``{{ $stepper->getStep($stepName) }}`` return a step, instance of StepInterface, given the name of a step

``{{ $stepper->getCurrentStep($stepName) }}`` return the instance of the current step

``{{ $stepper->getPrevStep($stepName) }}`` return the instance of the previous step

``{{ $stepper->getNextStep($stepName) }}`` return the instance of the next step

``{{ $stepper->stepExists($stepName) }}`` get if a given step with it's name is existing

``{{ $stepper->getNumSteps() }}`` get the total number of steps

``{{ $stepper->getCurrentStepName() }}`` get the name of the current step

The stepper object implements the Iterator's interface, so it's possible to loop easily on it. Every loop is returning an instance of StepInterface implemented by the Step class.

```php
@foreach ($stepper as $step)
    // ...
@endforeach
```

#### Step class (StepInterface implementation and more if you wish)

``{{ $step->getName() }}`` return the name associated to the step

``{{ $step->getUrl() }}`` return the URL associated to the step

``{{ $step->getRoute() }}`` return the route associated to the step

``{{ $step->getPosition() }}`` return step's position

``{{ $step->getTitle() }}`` return the title associated to the step

``{{ $step->getDescription() }}`` return the description associated to the step

``{{ $step->isCurrent() }}`` return if it's current step or no

``{{ $step->isPassed() }}`` return if the step is in the past

``{{ $step->isFirst() }}`` return if it's the first step

``{{ $step->isLast() }}`` return if it's the last step


## Personalize classes

Because the concrete class of our stepper is a child of the abscract stepper class, it's possible to override properties and methods of that stepper class.

It's also possible to override the Step class very easily by implementing the StepInterface interface and putting in the stepper class the name of the Step class to use:


```php
use Axn\LaravelStepper\Stepper;

class BasicStepper extends Stepper
{
    protected $stepClass = 'App\CustomStep';
    //...
}
```
