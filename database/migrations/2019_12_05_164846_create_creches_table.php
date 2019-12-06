<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creche', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->string('observacoes',255);
            $table->enum('status',['ativo','inativo'])->default('ativo');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pacote_creche_id');
            $table->foreign('pacote_creche_id')->references('id')->on('pacote_creche')->onDelete('cascade');
            $table->foreign('pet_id')->references('id')->on('pet')->onDelete('cascade');
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
        Schema::dropIfExists('creche');
    }
}
