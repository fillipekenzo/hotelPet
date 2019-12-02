<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutor';
    protected $fillable = ['nome','cpf','endereco','telefone','facebook','instagram','status'];
}
