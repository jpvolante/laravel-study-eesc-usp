# Estilo fflch para laravel-stepper

https://github.com/AXN-Informatique/laravel-stepper

Instalação

    composer require fflch/laravel-fflch-stepper

Publicação do arquivo de configuração:

    php artisan vendor:publish --provider="Fflch\LaravelFflchStepper\LaravelFflchStepperServiceProvider" --tag="config"

Edite o arquivo config/laravel-fflch-stepper.php conforme suas necessidades.

Injete no controller:

    use Fflch\LaravelFflchStepper\Stepper;

    public function show(Pedido $pedido, Stepper $stepper)
    {
        $stepper->setCurrentStepName($pedido->status);
        return view('pedidos.show',[
            'pedido' => $pedido,
            'stepper' => $stepper->render()
        ]);
    }


No blade posicione onde deseja mostrar o stepper:

    {!! $stepper !!}