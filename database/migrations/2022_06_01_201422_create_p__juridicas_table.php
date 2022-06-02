<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePJuridicasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p__juridicas', function (Blueprint $table) {
            $table->id('id');
            $table->string('cnpj', 25)->unique();
            $table->string('nome_fantasia');
            $table->string('inscricao_estadual')->unique();
            $table->string('razao_social');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('pessoa_id')->unique()->constrained("pessoas")->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('p__juridicas');
    }
}
