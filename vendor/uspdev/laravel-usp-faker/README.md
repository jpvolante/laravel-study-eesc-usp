# Faker USP

Biblioteca para geração de faker no contexto USP, usados
em seed no laravel.

Instalação:

    composer require uspdev/laravel-usp-faker

Dependência: https://github.com/uspdev/replicado

Também carrega automaticamente tudo no contexto de:
*\Faker\Provider\pt_BR\*.

Fakers disponíveis:

- $faker->docente;
- $faker->servidor;
- $faker->estagiario;
- $faker->graduacao;
- $faker->posgraduacao;
- $faker->bempatrimoniado_informatica;
- $faker->bempatrimoniado;
