<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePFisicasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p__fisicas', function (Blueprint $table) {
            $table->id('id');
            $table->string('cpf')->unique();
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
        Schema::drop('p__fisicas');
    }
}
