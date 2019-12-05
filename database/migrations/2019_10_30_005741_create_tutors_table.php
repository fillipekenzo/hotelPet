<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf',45);
            $table->string('nome',100);
            $table->string('endereco',45);
            $table->string('telefone',45);
            $table->string('instagram',45);
            $table->string('facebook',45);
            $table->string('foto',255);
            $table->enum('status',['ativo','inativo'])->default('ativo');
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
        Schema::dropIfExists('tutor');
    }
}
