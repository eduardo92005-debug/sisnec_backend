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
            $table->id();
            $table->timestamps();
            $table->string("cnpj")->unique();
            $table->string("nome_fantasia");
            $table->string("inscricao_estadual")->unique();
            $table->string("razao_social");
            $table->foreignId('pessoa_id')->unique()->constrained("pessoas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p__juridicas', function (Blueprint $table) {
            $table->foreignId('pessoa_id')->constrained("pessoas")->onDelete('cascade');
        });
    }
}
