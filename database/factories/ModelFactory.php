<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pessoa::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'nome' => $faker->sentence,
        'telefone_1' => $faker->sentence,
        'telefone_2' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Endereco::class, static function (Faker\Generator $faker) {
    return [
        'bairro' => $faker->sentence,
        'cep' => $faker->sentence,
        'cidade' => $faker->sentence,
        'complemento' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'estado' => $faker->sentence,
        'p__fisicas_id' => $faker->sentence,
        'p__juridicas_id' => $faker->sentence,
        'rua' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PFisica::class, static function (Faker\Generator $faker) {
    return [
        'cpf' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'pessoa_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PFisica::class, static function (Faker\Generator $faker) {
    return [
        'cpf' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        'pessoa_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PJuridica::class, static function (Faker\Generator $faker) {
    return [
        'cnpj' => $faker->sentence,
        'nome_fantasia' => $faker->sentence,
        'inscricao_estadual' => $faker->sentence,
        'razao_social' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        'pessoa_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Veiculo::class, static function (Faker\Generator $faker) {
    return [
        'p__fisicas_id' => $faker->sentence,
        'p__juridicas_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Plano::class, static function (Faker\Generator $faker) {
    return [
        'p__fisicas_id' => $faker->sentence,
        'p__juridicas_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
