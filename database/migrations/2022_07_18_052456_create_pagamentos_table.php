<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id('id');
            $table->string('responsavel', 100);
            $table->decimal('montante');
            $table->decimal('juros');
            $table->date('vencimento');
            $table->boolean('esta_vencido');
            $table->date('pagamento_data');
            $table->date('ultima_atualizacao');
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
        Schema::drop('pagamentos');
    }
}
