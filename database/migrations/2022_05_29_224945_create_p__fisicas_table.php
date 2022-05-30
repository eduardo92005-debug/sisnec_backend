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
            $table->id();
            $table->timestamps();
            $table->string("cpf");
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

        Schema::table('p__fisicas', function (Blueprint $table) {
            $table->foreignId('pessoa_id')->constrained("pessoas")->onDelete('cascade');
        });
    }
}
