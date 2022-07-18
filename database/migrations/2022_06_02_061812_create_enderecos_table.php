<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id('id');
            $table->string('rua', 50);
            $table->string('complemento', 30);
            $table->string('bairro', 50);
            $table->string('cep', 20);
            $table->string('estado');
            $table->string('cidade');
            $table->foreignId('p__fisicas_id')->unique()->nullable()->constrained("p__fisicas")->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('p__juridicas_id')->unique()->nullable()->constrained("p__juridicas")->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enderecos');
    }
}
