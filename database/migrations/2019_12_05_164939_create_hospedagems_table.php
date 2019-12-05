<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospedagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedagem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTimeTz('data_entrada');
            $table->dateTimeTz('data_saida')->nullable();
            $table->decimal('valor_diaria');
            $table->decimal('valor_total')->nullable();
            $table->string('observacoes',255);
            $table->enum('status',['ativo','inativo'])->default('ativo');
            $table->unsignedBigInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pet')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospedagem');
    }
}
