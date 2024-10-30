<?php 

namespace Uspdev;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class UspdevFakerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create('pt_BR');
            $faker->addProvider(new Provider\ReplicadoFaker($faker));
            /* loading all pt-br providers */
            $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));
            $faker->addProvider(new \Faker\Provider\pt_BR\Company($faker));
            $faker->addProvider(new \Faker\Provider\pt_BR\Address($faker));
            $faker->addProvider(new \Faker\Provider\pt_BR\Internet($faker));
            $faker->addProvider(new \Faker\Provider\pt_BR\Payment($faker));
            $faker->addProvider(new \Faker\Provider\pt_BR\PhoneNumber($faker));
            return $faker;
        });
    }

}
